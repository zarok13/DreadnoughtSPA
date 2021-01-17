import constants from "@/helpers/constants";
import Repository from "./Repository";

const resource = 'gallery';
export default {
  [constants.GET_GALLERY]() {
    return Repository.get(`${resource}`);
  },
};
