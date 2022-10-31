var scriptSet = PropertiesService.getScriptProperties();

// menghubungkan dengan telegram dan google sheet
var token = "";
var sheetID = "";
var sheetName = "";
var webAppURL = "";

// Setting data apa saja yang akan diinput
var dataInput =
   /\/DATA1: (.*)\n\nDATA2: (.*)\n\nDATA3: (.*)\n\nDATA4: (.*)\n\nDATA5: (.*)\n\nDATA6: (.*)\n\nDATA7: (.*)\n\nDATA8: (.*)\n\nDATA9: (.*)\n\nDATA10: (.*)/gim;

// Pesan jika format data yang dikirim salah
var errorMessage = "Format Salah";

function tulis(dataInput) {
   var sheet = SpreadsheetApp.openById(sheetID).getSheetByName(sheetName);
   sheet.appendRow(dataInput);
   Logger.log(lRow);
}

function breakData(update) {
   var ret = errorMessage;
   var msg = update.message;
   var str = msg.text;
   var match = str.match(validasiData);

   // Setting format data yang akan diinput
   if (match.length == 10) {
      for (var i = 0; i < match.length; i++) {
         match[i] = match[i].replace(":", "").trim();
      }
      ret = "DATA1" + match[0] + "\n\n";
      ret += "DATA2" + match[1] + "\n\n";
      ret += "DATA3" + match[2] + "\n\n";
      ret += "DATA4" + match[3] + "\n\n";
      ret += "DATA5" + match[4] + "\n\n";
      ret += "DATA6" + match[5] + "\n\n";
      ret += "DATA7" + match[6] + "\n\n";
      ret += "DATA8" + match[7] + "\n\n";
      ret += "DATA9" + match[8] + "\n\n";
      ret += "DATA10" + match[9] + "\n\n";
      ret = "Data (<b>" + match[0] + "</b>) Berhasil disimpan";

      var simpan = match;

      var nama = msg.from.first_name;
      if (msg.from.last_name) {
         nama += " " + msg.from.last_name;
      }

      simpan.unshift(nama);

      var waktu = jamConverter(msg.date);
      simpan.unshift(waktu);

      var tanggal = tanggalConverter(msg.date);
      simpan.unshift(tanggal);

      tulis(simpan);
   }
   return ret;
}

function tanggalConverter(UNIX_timestamp) {
   var a = new Date(UNIX_timestamp * 1000);
   var months = [
      "01",
      "02",
      "03",
      "04",
      "05",
      "06",
      "07",
      "08",
      "09",
      "10",
      "11",
      "12",
   ];
   var year = a.getFullYear();
   var month = months[a.getMonth()];
   var date = a.getDate();
   var tanggal = date + "/" + month + "/" + year;
   return tanggal;
}

function jamConverter(UNIX_timestamp) {
   var a = new Date(UNIX_timestamp * 1000);
   var hour = a.getHours();
   var min = a.getMinutes();
   var sec = a.getSeconds();
   var jam = hour + " : " + min + " : " + sec;
   return jam;
}

function escapeHtml(text) {
   var map = {
      "&": "&amp;",
      "<": "&lt;",
      ">": "&gt;",
      '"': "&quot;",
      "'": "&#039;",
   };

   return text.replace(/[&<>"']/g, function (m) {
      return map[m];
   });
}

function goGet(e) {
   return HtmlService.createHtmlOutput("Hey there! Send POST request instead!");
}

function doPost(e) {
   if (e.postData.type == "application/json") {
      var update = JSON.parse(e.postData.contents);
      var bot = new Bot(token, update);
      var bus = new CommandBus();
      bus.on(/\start/i, function () {
         this.replyToSender("<b>Selamat Datang</b>");
      });
      bus.on(/^[\/!]test/i, function () {
         this.replyToSender("<b>Aman</b>");
      });
      bus.on(/^[\/!]format/i, function () {
         this.replyToSender(
            "<b>/Data1 :</b>\
            \n<b>/Data2 :</b>\
            \n<b>/Data3 :</b>\
            \n<b>/Data4 :</b>\
            \n<b>/Data5 :</b>\
            \n<b>/Data6 :</b>\
            \n<b>/Data7 :</b>\
            \n<b>/Data8 :</b>\
            \n<b>/Data9 :</b>\
            \n<b>/Data10 :</b>"
         );
      });
      bus.on(/^[\/!]format/i, function () {
         this.replyToSender("<b>Semoga harimu menyenangkan</b>");
      });
      bus.on(validasiData, function () {
         var rtext = breakData(update);
         this.replyToSender(rtext);
      });
      bot.register(bus);
      if (update) {
         bot.process();
      }
   }
}

function setWebhook() {
   var bot = new Bot(token, {});
   var result = bot.request("setWebhook", {
      url: webAppURL,
   });
   Logger.log(ScriptApp.getService().getUrl());
   Logger.log(result);
}

function Bot(token, update) {
   this.token = token;
   this.update = update;
   this.handlers = [];
}

Bot.prototype.register = function (handler) {
   this.handlers.push(handler);
};

Bot.prototype.process = function () {
   for (var i in this.handlers) {
      var event = this.handlers[i];
      var result = event.condition(this);
      if (result) {
         return event.handle(this);
      }
   }
};

Bot.prototype.request = function () {
   var options = {
      method: "post",
      contentType: "application/json",
      payload: JSON.stringify(data),
   };

   var response = UrlFetchApp.fetch(
      "https://api.telegram.org/bot" + this.token + "/" + method,
      options
   );

   if (response.getResponseCode() == 200) {
      return JSON.parse(response.getContentText());
   }

   return false;
};

Bot.prototype.replyToSender = function (text) {
   return this.request("sendMessage", {
      chat_id: this.update.message.chat.id,
      parse_mode: "HTML",
      reply_to_message_id: this.update.message.message_id,
      text: text,
   });
};

function CommandBus() {
   this.commands = [];
}

CommandBus.prototype.on = function (regexp, callback) {
   this.commands.push({ regexp: regexp, callback: callback });
};

CommandBus.prototype.condition = function (bot) {
   return bot.update.message.text.charAt(0) === "/";
};

CommandBus.prototype.handle = function (bot) {
   for (var i in this.commands) {
      var cmd = this.commands[i];
      var tokens = cmd.regexp.exec(bot.update.message.text);
      if (tokens != null) {
         return cmd.callback.apply(bot, token.splice(1));
      }
   }
   return bot.replyToSender(errorMessage);
};
