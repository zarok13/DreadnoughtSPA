import vuex_constants from "@/helpers/constants";
import Repository from './Repository';

export default{
  [vuex_constants.GET_MAPBOX_DATA]() {
      return Repository.get("mapbox");
  },
};
