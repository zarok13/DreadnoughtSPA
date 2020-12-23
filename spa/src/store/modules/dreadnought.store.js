import Axios from "axios"

// global api url
export const BASE_URL = 'http://localhost:8000/api'
// export const BASE_URL = 'https://dreadnought-project.herokuapp.com/api'

// define app store actions names
export const GET_CONFIGS = 'configs'
export const GET_HOME = 'home'
export const GET_STATIC_CONTENT = 'getStaticContent'
export const GET_PRODUCTS = 'getProducts'
export const GET_GALLERY = 'getGallery'
export const GET_MAPBOX_DATA = 'getMapboxData'
export const SEND_MAIL = 'sendMail'
export const SEND_CONTACT = 'sendContact'

// define app store mutations names
const SET_CONFIGS = 'setConfigs'
const SET_HOME = 'setHome'
export const SET_STATIC_CONTENT = 'setStaticContent'
const SET_PRODUCTS = 'setProducts'
const SET_GALLERY = 'setGallery'
const SET_MAPBOX_DATA = 'setMapboxDate'
export const SET_LOADER = 'setLoader'


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
    [GET_CONFIGS](state) {
        Axios.get(BASE_URL + '/configs')
            .then(data => {
                let configs = data.data
                state.commit(SET_CONFIGS, configs)
            })
            .catch(error => {
                console.log(error);
            })
    },

    [GET_HOME](state) {
        Axios.get(BASE_URL + '/home')
            .then(data => {
                let home = data.data;
                state.commit(SET_HOME, home);
            })
            .catch(error => {
                console.log(error);
            })
    },

    [GET_STATIC_CONTENT](state, slug) {
        Axios.get(BASE_URL + '/static_content', {params: {slug: slug}})
            .then(data => {
                let content = data.data;
                state.commit(SET_STATIC_CONTENT, content);
            })
            .catch(error => {
                console.log(error);
            })
    },

    [GET_PRODUCTS](state) {
        Axios.get(BASE_URL + '/products')
            .then(data => {
                let products = data.data;
                state.commit(SET_PRODUCTS, products);
            })
            .catch(error => {
                console.log(error);
            })
    },

    [GET_GALLERY](state) {
        Axios.get(BASE_URL + '/gallery')
            .then(data => {
                let gallery = data.data;
                state.commit(SET_GALLERY, gallery);
            })
            .catch(error => {
                console.log(error);
            })
    },

    [GET_MAPBOX_DATA](state) {
        Axios.get(BASE_URL + '/mapbox')
            .then(data => {
                let mapbox = data.data;
                state.commit(SET_MAPBOX_DATA, mapbox);
            })
            .catch(error => {
                console.log(error);
            })
    },

    async [SEND_MAIL](state, messageData) {
        await Axios.post(BASE_URL + '/send_message', messageData)
            .then(data => {
                console.log(data.data);
            })
            .catch(error => {
                console.log(error);
            })
    },

    async [SEND_CONTACT](state, contactData) {
        await Axios.post(BASE_URL + '/send_contact', contactData)
            .then(data => {
                console.log(data.data);
            })
            .catch(error => {
                console.log(error);
            })
    },
}

// app store mutations
const mutations = {
    [SET_CONFIGS](state, configs) {
        state.configs = configs;
    },
    [SET_HOME](state, home) {
        state.home = home;
    },
    [SET_STATIC_CONTENT](state, content) {
        state.staticContent = content;
    },
    [SET_PRODUCTS](state, products) {
        state.products = products;
    },
    [SET_GALLERY](state, gallery) {
        state.gallery = gallery;
    },
    [SET_MAPBOX_DATA](state, mapbox) {
        state.mapboxData = mapbox;
    },
    [SET_LOADER](state, value) {
        state.loader = value;
    }
}

export default {
    state,
    getters,
    actions,
    mutations
}
