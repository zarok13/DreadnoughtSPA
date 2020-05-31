// check expire date
export function checkExpireDate(parsedData) {
    // convert to date format with Date constructor
    var parts = parsedData.expire_date.split("-");
    var expireDate = new Date(parts[2], parts[1] - 1, parts[0]);
    parts = getTodayDate().split("-");
    var todayDate = new Date(parts[2], parts[1] - 1, parts[0]);

    if (expireDate > todayDate) {
        return true;
    }
    return false;
}

// standart expire date format
export function getExpireDate(dayCount = 2) {
    let today = new Date();
    today.setDate(today.getDate() + dayCount);
    let dd = today.getDate();
    let mm = today.getMonth() + 1;
    let yyyy = today.getFullYear();
    if (dd < 10) {
        dd = '0' + dd;
    }
    if (mm < 10) {
        mm = '0' + mm;
    }
    let formattedDate = dd + '-' + mm + '-' + yyyy;
    return formattedDate;
}

// standart today date format
function getTodayDate() {
    let today = new Date();
    today.getDate();
    let dd = today.getDate();
    let mm = today.getMonth() + 1;
    let yyyy = today.getFullYear();
    if (dd < 10) {
        dd = '0' + dd;
    }
    if (mm < 10) {
        mm = '0' + mm;
    }
    let formattedDate = dd + '-' + mm + '-' + yyyy;
    return formattedDate;
}



