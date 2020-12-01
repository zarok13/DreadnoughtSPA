import { checkExpireDate } from "./expire_date";

// get data from local storage
export function getDataFromLocalStorage(state, name, mutation) {
    if (localStorage[name] && localStorage[name] !== 'undefined') {
        let parsedData = JSON.parse(localStorage[name]);
        if (checkExpireDate(parsedData)) {
            state.commit(mutation, parsedData);
            return true;
        }
    }
    return false;
}