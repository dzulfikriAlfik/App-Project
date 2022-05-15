var UGChart;
function getUsersStatistic() {
   var url = "/api/user/get/statistic";
   commonJS.loading(true);
   commonAPI.getAPI(url, (response) => {
      // console.log(response)
      if (response.status == 200) {
         // refine structure
         var data = response.data;
         $("#total_users").text(
            commonJS.numberFormat(data.all_time) + " (Total)"
         );
         $("#total_users_today").text(
            commonJS.numberFormat(data.today) + " (Hari Ini)"
         );
         $("#total_users_domisili").text(
            commonJS.numberFormat(data.domisili) + " (Domisili)"
         );
         $("#total_users_birthyear").text(
            commonJS.numberFormat(data.birthyear) + " (Tahun Lahir)"
         );
         commonJS.loading(false);
      } else if (response.status == 401) {
         commonJS.swalError(response.message, function () {
            window.location = "/logout";
         });
      }
   });
}

function getUserGrowthStatistic(days) {
   var url = "/api/stat/chart?days=" + days;
   commonJS.loading(true);
   commonAPI.getAPI(url, (response) => {
      // console.log(response)
      if (response.status == 200) {
         // refine structure
         var resp = response.data;
         var labels = [],
            data = [];
         for (var i = 0; i < resp.data.length; i++) {
            labels.push(resp.data[i].stat_date);
            data.push(resp.data[i].stat_val);
         }
         labels.reverse();
         data.reverse();
         drawUserChart(labels, data);
         commonJS.loading(false);
      } else if (response.status == 401) {
         commonJS.swalError(response.message, function () {
            window.location = "/logout";
         });
      }
   });
}

function drawUserChart(labels, data) {
   $("#usersChart").remove(); // this is my <canvas> element
   $("#usersChartArea").append('<canvas id="usersChart"><canvas>');
   const ctx = document.getElementById("usersChart").getContext("2d");
   UGChart = new Chart(ctx, {
      type: "line",
      data: {
         labels: labels,
         datasets: [
            {
               label: "New Users",
               data: data,
               fill: true,
               borderColor: "#df1b1b",
               tension: 0.1,
            },
         ],
      },
      options: {
         scales: {
            y: {
               beginAtZero: true,
            },
         },
      },
   });
}

function drawMenfessChart() {
   const ctx = document.getElementById("menfessChart").getContext("2d");
   const myChart = new Chart(ctx, {
      type: "line",
      data: {
         labels: ["a", "b", "c", "d", "e", "f", "g"],
         datasets: [
            {
               label: "New Users",
               data: [65, 59, 80, 81, 56, 55, 40],
               fill: false,
               borderColor: "rgb(75, 192, 75)",
               tension: 0.1,
            },
         ],
      },
      options: {
         scales: {
            y: {
               beginAtZero: true,
            },
         },
      },
   });
}

function changeToWeekUsers() {
   getUserGrowthStatistic(7);
   $("#btnUGWeek").removeClass("btn-outline-primary");
   $("#btnUGWeek").addClass("btn-primary");

   $("#btnUGMonth").removeClass("btn-primary");
   $("#btnUGMonth").addClass("btn-outline-primary");
}

function changeToMonthUsers() {
   getUserGrowthStatistic(30);
   $("#btnUGMonth").removeClass("btn-outline-primary");
   $("#btnUGMonth").addClass("btn-primary");

   $("#btnUGWeek").removeClass("btn-primary");
   $("#btnUGWeek").addClass("btn-outline-primary");
}

async function recalculateUsersGrowth(days) {
   commonJS.loading(true);
   var today = new Date();
   for (var i = 1; i <= days; i++) {
      var priorDate = new Date(new Date().setDate(today.getDate() - i));
      var year = priorDate.getFullYear();
      var month = priorDate.getMonth() + 1;
      var date = priorDate.getDate();

      if (month < 10) month = "0" + month;
      if (date < 10) date = "0" + date;
      var stat_date = year + "-" + month + "-" + date;

      await commonAPI.postAPIAsync(
         "/api/stat/create",
         function () {},
         function () {},
         {
            stat_date: stat_date,
            stat_code: "user_growth",
         }
      );
   }
   commonJS.loading(false);
}

$(function () {
   // on document ready
   getUsersStatistic();
   getUserGrowthStatistic(7); // default 7 days
   drawMenfessChart();
});
