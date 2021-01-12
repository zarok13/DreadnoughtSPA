import Axios from 'axios';

const BASE_DOMAIN = 'http://localhost:8000';
const BASE_URL = `${BASE_DOMAIN}/api/`;

export default Axios.create({
  baseURL: BASE_URL,
  timeout: 10000,
  headers: {'Content-Type': 'application/json',}
});
