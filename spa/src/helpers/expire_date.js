
// check expire date
export function checkExpireDate(parsedData) {
    let expireDate = parsedData.expire_date;
    let minutes = new Date();
    minutes = minutes.getMinutes();

    if (expireDate > minutes) {
        return true;
    }
    return false;
}

// standart expire date format
export function getExpireDate(minuteCount = 2) {
    let minutes = new Date();
    minutes.setMinutes(minutes.getMinutes() + minuteCount);
    minutes = minutes.getMinutes();

    if (minutes < 10) {
        minutes = '0' + minutes;
    }
    return minutes;
}

