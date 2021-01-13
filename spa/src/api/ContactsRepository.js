import vuex_constants from "@/helpers/constants";
import Repository from "./Repository";

const resource = 'contact/';
export default {
  [vuex_constants.GET_MAPBOX_DATA]() {
    return Repository.get(`${resource}mapbox`);
  },
  [vuex_constants.SEND_CONTACT_MAIL](type, dataForm) {
    return Repository.post(`${resource}send_message_` + type, dataForm);
  },
};
