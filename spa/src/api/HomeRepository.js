import constants from "@/helpers/constants";
import Repository from "./Repository";

const resource = 'home';
export default {
  [constants.GET_HOME]() {
    return Repository.get(`${resource}`);
  },
};
