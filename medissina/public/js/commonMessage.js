class CommonMessage {
    constructor() {
        this.MSG_REQUIRED = "<b>[0]</b> should not be empty.";
        this.MSG_NUMBER = "<b>[0]</b> should be a number.";
        this.MSG_MIN_8_CHAR = "<b>[0]</b> should be min 8 char.";
        this.MSG_EMAIL_NOT_VALID = "<b>[0]</b> is not valid.";
        this.MSG_ONLY_PDF = "<b>[0]</b> type must be (.pdf).";
        this.MSG_ONLY_IMG = "<b>[0]</b> type must be image.";
        this.MSG_MORE_THAN_10MB = "<b>[0]</b> size cannot more than 10MB.";
        this.MSG_MORE_THAN_1MB = "<b>[0]</b> size cannot more than 1MB.";
    }

    getMessage(array, message){
        for (var index in array){
            message = message.replace("[" + index + "]", array[index])
        }
        return message
    }
}


const commonMsg = new CommonMessage()