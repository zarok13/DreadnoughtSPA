import Axios from "axios"
import { getDataFromLocalStorage } from "@/helpers/init_local_storage"
import { getExpireDate } from "@/helpers/expire_date"
import vuex_constants from "@/helpers/constants"
import { RepositoryFactory } from '@/api/RepositoryFactory'
const ContactsRepository = RepositoryFactory.get("contacts");

// global api url
const BASE_DOMAIN = 'http://localhost:8000'
export const BASE_URL = `${BASE_DOMAIN}/api/`
// export const BASE_URL = 'https://dreadnought-project.herokuapp.com/api/'

var request = Axios.create({
    baseURL: BASE_URL,
    timeout: 10000,
    headers: {'Content-Type': 'application/json',}
  });


// init app state
const state = {
    configs: {
        menu: [],
        translate: [],
        params: []
    },
    home: {
        sliders: [],
        intro: [],
        blogs: [],
    },
    staticContent: [],
    products: [],
    gallery: [],
    mapboxData: [],
    loader: false,
}

// init app getters
const getters = {
    getConfigs(state) {
        return state.configs;
    },
    getHome(state) {
        return state.home;
    },
    getStaticContent(state) {
        return state.staticContent;
    },
    getProducts(state) {
        return state.products;
    },
    getGallery(state) {
        return state.gallery;
    },
    getMapbox(state) {
        return state.mapboxData;
    },
    getLoader(state) {
        return state.loader;
    },
}

// app store actions
const actions = {
    [vuex_constants.GET_CONFIGS](state) {
        if (getDataFromLocalStorage(state, vuex_constants.GET_CONFIGS, vuex_constants.SET_CONFIGS)) {
            console.log('configs parsed from local storage');
        } else {
            request.get('configs')
                .then(data => {
                    let configs = data.data
                    configs.expire_date = getExpireDate(2);
                    localStorage.setItem(vuex_constants.GET_CONFIGS, JSON.stringify(configs));
                    state.commit(vuex_constants.SET_CONFIGS, configs)
                })
                .catch(error => {
                    console.log(error);
                })
        }
    },

    [vuex_constants.GET_HOME](state) {
        if (getDataFromLocalStorage(state, vuex_constants.GET_HOME, vuex_constants.SET_HOME)) {
            console.log('home parsed from local storage');
        } else {
            request.get('home')
                .then(data => {
                    let home = data.data;
                    home.expire_date = getExpireDate(2);
                    localStorage.setItem(vuex_constants.GET_HOME, JSON.stringify(home));
                    state.commit(vuex_constants.SET_HOME, home);
                })
                .catch(error => {
                    console.log(error);
                })
        }
    },

    [vuex_constants.GET_STATIC_CONTENT](state, slug) {
        if (getDataFromLocalStorage(state, vuex_constants.GET_STATIC_CONTENT+ '.' + slug, vuex_constants.SET_STATIC_CONTENT)) {
            console.log('static content parsed from local storage');
        } else {
            request.get('static_content', { params: { slug: slug } })
                .then(data => {
                    let content = data.data;
                    content.expire_date = getExpireDate(2);
                    localStorage.setItem(vuex_constants.GET_STATIC_CONTENT + '.' + slug, JSON.stringify(content));
                    state.commit(vuex_constants.SET_STATIC_CONTENT, content);
                })
                .catch(error => {
                    console.log(error);
                })
        }
    },

    [vuex_constants.GET_PRODUCTS](state) {
        if (getDataFromLocalStorage(state, vuex_constants.GET_PRODUCTS, vuex_constants.SET_PRODUCTS)) {
            console.log('products parsed from local storage');
        } else {
            request.get('products')
                .then(data => {
                    let products = data.data;
                    products.expire_date = getExpireDate(2);
                    localStorage.setItem(vuex_constants.GET_PRODUCTS, JSON.stringify(products));
                    state.commit(vuex_constants.SET_PRODUCTS, products);
                })
                .catch(error => {
                    console.log(error);
                })
        }
    },

    [vuex_constants.GET_GALLERY](state) {
        if (getDataFromLocalStorage(state, vuex_constants.GET_GALLERY, vuex_constants.SET_GALLERY)) {
            console.log('gallary parsed from local storage');
        } else {
            request.get('gallery')
                .then(data => {
                    let gallery = data.data;
                    gallery.expire_date = getExpireDate(2);
                    localStorage.setItem(vuex_constants.GET_GALLERY, JSON.stringify(gallery));
                    state.commit(vuex_constants.SET_GALLERY, gallery);
                })
                .catch(error => {
                    console.log(error);
                })
        }
    },

   
    [vuex_constants.GET_MAPBOX_DATA](state) {
        if (getDataFromLocalStorage(state, vuex_constants.GET_MAPBOX_DATA, vuex_constants.SET_MAPBOX_DATA)) {
            console.log('mapbox parsed from local storage');
        } else {
            ContactsRepository[vuex_constants.GET_MAPBOX_DATA]()
                .then(data => {
                    let mapbox = data.data;
                    mapbox.expire_date = getExpireDate(2);
                    // localStorage.setItem(vuex_constants.GET_MAPBOX_DATA, JSON.stringify(mapbox));
                    state.commit(vuex_constants.SET_MAPBOX_DATA, mapbox);
                })
                .catch(error => {
                    console.log(error);
                })
        }
    },
}

// app store mutations
const mutations = {
    [vuex_constants.SET_CONFIGS](state, configs) {
        state.configs = configs;
    },
    [vuex_constants.SET_HOME](state, home) {
        state.home = home;
    },
    [vuex_constants.SET_STATIC_CONTENT](state, content) {
        state.staticContent = content;
    },
    [vuex_constants.SET_PRODUCTS](state, products) {
        state.products = products;
    },
    [vuex_constants.SET_GALLERY](state, gallery) {
        state.gallery = gallery;
    },
    [vuex_constants.SET_MAPBOX_DATA](state, mapbox) {
        state.mapboxData = mapbox;
    },
    [vuex_constants.SET_LOADER](state, value) {
        state.loader = value;
    }
}

export default {
    state,
    getters,
    actions,
    mutations
}
