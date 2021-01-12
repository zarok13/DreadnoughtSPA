// PROJECT: API
import Vue from 'vue'
import Contacts from './contacts';


export default () => {
  // Initialize API repositories
  
  const repositories = {
    contacts: Contacts(context.$axios),
  };
  
  // inject("api", repositories);
  Vue.prototype.$api = repositories;
};