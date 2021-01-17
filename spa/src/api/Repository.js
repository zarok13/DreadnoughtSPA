import Axios from 'axios';

import production from "@/helpers/production/env";
import development from "@/helpers/development/env";

let env = '';
if (process.env.NODE_ENV === "production") {
    env = Object.freeze(production);
} else {
    env = Object.freeze(development);
}


export default Axios.create({
  baseURL: env.baseUrl,
  timeout: 10000,
  headers: {'Content-Type': 'application/json',}
});
