import constants from "@/helpers/constants";
import Repository from "./Repository";

const resource = 'contact/';
export default {
  [constants.GET_MAPBOX_DATA]() {
    return Repository.get(`${resource}mapbox`);
  },
  [constants.SEND_CONTACT_MAIL](type, dataForm) {
    return Repository.post(`${resource}send_message_` + type, dataForm);
  },
};
