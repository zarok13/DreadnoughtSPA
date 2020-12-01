import Axios from "axios"
import {getDataFromLocalStorage} from "@/helpers/init_local_storage"
import {getExpireDate} from "@/helpers/expire_date"

// global api url
export const BASE_URL = 'http://localhost:8000/api'

// define app store actions names
export const GET_CONFIGS = 'configs'
export const GET_HOME = 'home'
export const GET_STATIC_CONTENT = 'getStaticContent'
export const GET_GALLERY = 'getGallery'
export const GET_MAPBOX_DATA = 'getMapboxData'
export const SEND_MAIL = 'sendMail'
export const SEND_CONTACT = 'sendContact'

// define app store mutations names
const SET_CONFIGS = 'setConfigs'
const SET_HOME = 'setHome'
const SET_STATIC_CONTENT = 'setStaticContent'
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
        if (getDataFromLocalStorage(state, GET_CONFIGS, SET_CONFIGS)) {
            console.log('configs parsed from local storage');
        } else {
            Axios.get(BASE_URL + '/configs')
                .then(data => {
                    let configs = data.data
                    state.commit(SET_CONFIGS, configs)
                    configs.expire_date = getExpireDate(2);
                    localStorage.setItem(GET_CONFIGS, JSON.stringify(configs));
                })
                .catch(error => {
                    console.log(error);
                })
        }
    },

    [GET_HOME](state) {
        // if (getDataFromLocalStorage(state, GET_HOME, SET_HOME)) {
        //     console.log('home parsed from local storage');
        // } else {
            Axios.get(BASE_URL + '/home')
                .then(data => {
                    let home = data.data;
                    state.commit(SET_HOME, home);
                    home.expire_date = getExpireDate(2);
                    localStorage.setItem(GET_HOME, JSON.stringify(home));
                })
                .catch(error => {
                    console.log(error);
                })
        // }
    },

    [GET_STATIC_CONTENT](state, slug) {
        if (getDataFromLocalStorage(state, GET_STATIC_CONTENT + '_' + slug, SET_STATIC_CONTENT)) {
            console.log('static content parsed from local storage');
        } else {
            Axios.get(BASE_URL + '/static_content', {params: {slug: slug}})
                .then(data => {
                    let content = data.data;
                    state.commit(SET_STATIC_CONTENT, content);
                    content.expire_date = getExpireDate(2);
                    localStorage.setItem(GET_STATIC_CONTENT + '_' + slug, JSON.stringify(content));
                })
                .catch(error => {
                    console.log(error);
                })
        }
    },

    [GET_GALLERY](state) {
        if (getDataFromLocalStorage(state, GET_GALLERY, SET_GALLERY)) {
            console.log('gallery parsed from local storage');
        } else {
            Axios.get(BASE_URL + '/gallery')
                .then(data => {
                    let gallery = data.data;
                    state.commit(SET_GALLERY, gallery);
                    gallery.expire_date = getExpireDate(2);
                    localStorage.setItem(GET_HOME, JSON.stringify(gallery));
                })
                .catch(error => {
                    console.log(error);
                })
        }
    },

    [GET_MAPBOX_DATA](state) {
        if (getDataFromLocalStorage(state, GET_MAPBOX_DATA, SET_MAPBOX_DATA)) {
            console.log('mapbox parsed from local storage');
        } else {
            Axios.get(BASE_URL + '/mapbox')
                .then(data => {
                    let mapbox = data.data;
                    state.commit(SET_MAPBOX_DATA, mapbox);
                    mapbox.expire_date = getExpireDate(2);
                    localStorage.setItem(GET_MAPBOX_DATA, JSON.stringify(mapbox));
                })
                .catch(error => {
                    console.log(error);
                })
        }
    },

    [SEND_MAIL](state, messageData) {
        Axios.post(BASE_URL + '/send_message', messageData)
            .then(data => {
                console.log(data.data);
            })
            .catch(error => {
                console.log(error);
            })
    },

    [SEND_CONTACT](state, contactData) {
        Axios.post(BASE_URL + '/send_contact', contactData)
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
