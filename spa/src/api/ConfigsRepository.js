import constants from "@/helpers/constants";
import Repository from "./Repository";

const resource = 'configs';
export default {
  [constants.GET_CONFIGS]() {
    return Repository.get(`${resource}`);
  },
};
