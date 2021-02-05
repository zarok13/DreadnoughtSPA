// import { getDataFromLocalStorage } from "@/helpers/init_local_storage"
// import { getExpireDate } from "@/helpers/expire_date"
import constants from "@/helpers/constants"

import { RepositoryFactory} from '@/api/RepositoryFactory'
const ContactsRepository = RepositoryFactory.get("contacts");
const GalleryRepository = RepositoryFactory.get("gallery");
const ProductsRepository = RepositoryFactory.get("products");
const StaticRepository = RepositoryFactory.get('static');
const HomeRepository = RepositoryFactory.get("home");
const ConfigsRepository = RepositoryFactory.get("configs");


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
    [constants.GET_CONFIGS](state) {
        actionDataInit(
            state,
            constants.GET_CONFIGS,
            constants.SET_CONFIGS,
            ConfigsRepository
        );
       
    },

    [constants.GET_HOME](state) {
        actionDataInit(
            state,
            constants.GET_HOME,
            constants.SET_HOME,
            HomeRepository
        );
    },

    [constants.GET_STATIC_CONTENT](state, slug) {
        actionDataInit(
            state,
            constants.GET_STATIC_CONTENT,
            constants.SET_STATIC_CONTENT,
            StaticRepository,
            [slug]
        );
    },

    [constants.GET_PRODUCTS](state) {
        actionDataInit(
            state,
            constants.GET_PRODUCTS,
            constants.SET_PRODUCTS,
            ProductsRepository
        );
    },

    [constants.GET_GALLERY](state) {
        actionDataInit(
            state,
            constants.GET_GALLERY,
            constants.SET_GALLERY,
            GalleryRepository
        );
    },

    [constants.GET_MAPBOX_DATA](state) {
        actionDataInit(
            state,
            constants.GET_MAPBOX_DATA,
            constants.SET_MAPBOX_DATA,
            ContactsRepository
        );
    },
}


function actionDataInit(state, getter, setter, repository, params = null) {
    // let localStor = params !== null ? getter + '.' + params[0] : getter;
    // if (getDataFromLocalStorage(state, localStor, setter)) {
    //     console.log(localStor + ' parsed from local storage');
    // } else {
        repository[getter](params)
            .then(data => {
                let init = data.data;
                // init.expire_date = getExpireDate(2);
                // localStorage.setItem(localStor, JSON.stringify(init));
                state.commit(setter, init);
            })
            .catch(error => {
                console.log(error);
            })
    // }
}

// app store mutations
const mutations = {
    [constants.SET_CONFIGS](state, configs) {
        state.configs = configs;
    },
    [constants.SET_HOME](state, home) {
        state.home = home;
    },
    [constants.SET_STATIC_CONTENT](state, content) {
        state.staticContent = content;
    },
    [constants.SET_PRODUCTS](state, products) {
        state.products = products;
    },
    [constants.SET_GALLERY](state, gallery) {
        state.gallery = gallery;
    },
    [constants.SET_MAPBOX_DATA](state, mapbox) {
        state.mapboxData = mapbox;
    },
    [constants.SET_LOADER](state, value) {
        state.loader = value;
    }
}

export default {
    state,
    getters,
    actions,
    mutations
}
