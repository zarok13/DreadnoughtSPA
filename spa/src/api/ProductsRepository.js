import constants from "@/helpers/constants";
import Repository from "./Repository";

const resource = 'products';
export default {
  [constants.GET_PRODUCTS]() {
    return Repository.get(`${resource}`);
  },
};
