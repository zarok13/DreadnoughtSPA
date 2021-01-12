import vuex_constants from "@/helpers/constants"
import { getDataFromLocalStorage } from "@/helpers/init_local_storage"
import { getExpireDate } from "@/helpers/expire_date"
import Axios from 'axios'

const BASE_URL = 'http://localhost:8000/api/'

var request = Axios.create({
  baseURL: BASE_URL,
  timeout: 10000,
  headers: {'Content-Type': 'application/json',}
});

export default{
  [vuex_constants.GET_MAPBOX_DATA](state) {
    if (getDataFromLocalStorage(state, vuex_constants.GET_MAPBOX_DATA, vuex_constants.SET_MAPBOX_DATA)) {
      console.log("mapbox parsed from local storage");
    } else {
      request
        .get("mapbox")
        .then((data) => {
          let mapbox = data.data;
          mapbox.expire_date = getExpireDate(2);
          localStorage.setItem(vuex_constants.GET_MAPBOX_DATA, JSON.stringify(mapbox));
          state.commit(vuex_constants.SET_MAPBOX_DATA, mapbox);
        })
        .catch((error) => {
          console.log(error);
        });
    }
  },
};
