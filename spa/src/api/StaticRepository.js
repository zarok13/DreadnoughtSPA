import constants from "@/helpers/constants";
import Repository from "./Repository";

const resource = 'static_content';
export default {
  [constants.GET_STATIC_CONTENT](params) {
    return Repository.get(`${resource}`, { params: { slug: params[0] } });
  },
};
