
// check expire date
export function checkExpireDate(parsedData) {
    let expireDate = parsedData.expire_date;
    let today = new Date();
    today.getDate();
    let dd = today.getDate();
    let mm = today.getMonth() + 1;
    let yyyy = today.getFullYear();
    let minutes = today.getMinutes();
    if (dd < 10) {
        dd = '0' + dd;
    }
    if (mm < 10) {
        mm = '0' + mm;
    }
    today = yyyy + '-' + mm + '-' + dd + '-' + minutes;
console.log(expireDate , today)
    if (expireDate > today) {
        return true;
    }
    return false;
}

// standart expire date format
export function getExpireDate(minuteCount = 2) {
    let today = new Date();
    today.getDate();
    let dd = today.getDate();
    let mm = today.getMonth();
    let yyyy = today.getFullYear();
    if (dd < 10) {
        dd = '0' + dd;
    }
    if (mm < 10) {
        mm = '0' + mm;
    }
    today.setMinutes(today.getMinutes() + minuteCount);
    today = today.getMinutes();

    if (today < 10) {
        today = '0' + today;
    }
    return yyyy + '-' + mm + '-' + dd + '-' + today;
}

