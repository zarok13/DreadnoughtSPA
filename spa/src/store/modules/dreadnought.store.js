import Axios from "axios"
import { getDataFromLocalStorage } from "../../helpers/init_local_storage"
import { getExpireDate } from "../../helpers/expire_date"

// global api url
export const API_URL = 'http://localhost:8000/api'

// define app store actions names
export const GET_HOME = 'home'

export const GET_API_ROUTES = 'getApiRoutes'

// export const GET_SLIDER = 'getSlider'
export const BLOG_LIST = 'blogList'
export const GET_INTRO1 = 'getIntro1'
export const GET_INTRO2 = 'getIntro2'
export const GET_INTRO3 = 'getIntro3'
export const GET_FOOTER = 'getFooter'
export const SEND_MAIL = 'sendMail'
export const SEND_CONTACT = 'sendContact'
export const GET_MAPBOX_DATA = 'getMapboxData'
export const GET_STATIC_CONTENT = 'getStaticContent'

// define app store mutations names
export const SET_HOME = 'setHome'

const SET_API_ROUTES = 'setApiRoutes'
// export const SET_SLIDER = 'setSlider'
const SET_BLOG_LIST = 'setBlogList'
const SET_INTRO1 = 'setIntro1'
const SET_INTRO2 = 'setIntro2'
const SET_INTRO3 = 'setIntro3'
const SET_FOOTER = 'setFooter'
export const SET_LOADER = 'setLoader'
const SET_MAPBOX_DATA = 'setMapboxDate'
const SET_STATIC_CONTENT = 'setStaticContent'

// init app state
const state = {
    home:[],
    // slider: [],
    intro1: '',
    intro2: '',
    intro3: '',
    blogPart1: [],
    blogPart2: [],
    apiRoutes: [],
    footer: [],
    loader: false,
    mapboxData: [],
    staticContent: { },
}

// init app getters
const getters = {
    getHome(state) {
        const { home } = state;
        return { home };
    },
    // getSlider(state) {
    //     return state.slider
    // },
    getIntro1(state) {
        return state.intro1
    },
    getIntro2(state) {
        return state.intro2
    },
    getIntro3(state) {
        return state.intro3
    },
    blogPart1(state) {
        return state.blogPart1
    },
    blogPart2(state) {
        return state.blogPart2
    },
    getApiRoutes(state) {
        return state.apiRoutes
    },
    getFooter(state) {
        return state.footer;
    },
    getLoader(state) {
        return state.loader;
    },
    getMapbox(state) {
        return state.mapboxData;
    },
    getStaticContent(state) {
        return state.staticContent;
    },
}

// app store actions
const actions = {
    [GET_API_ROUTES](state, routeList) {
        state.commit(SET_API_ROUTES, routeList)
    },
    async [GET_HOME](state) {
        // if (await getDataFromLocalStorage(state, GET_HOME, SET_HOME)) {
        //     console.log('home parsed from local storage');
        // } else {
            await Axios.get(API_URL + '/home')
                .then(data => {
                    let home = data.data
                    state.commit(SET_HOME, home)
                    home.expire_date = getExpireDate(2);
                    localStorage.setItem(GET_HOME, JSON.stringify(home));
                })
                .catch(error => {
                    console.log(error);
                })
        // }
    },
    // async [GET_SLIDER](state) {
    //     if (await getDataFromLocalStorage(state, GET_SLIDER, SET_SLIDER)) {
    //         console.log('slider parsed from local storage');
    //     } else {
    //         await Axios.get(API_URL + '/slider')
    //             .then(data => {
    //                 let slider = data.data
    //                 state.commit(SET_SLIDER, slider)
    //                 slider.expire_date = getExpireDate(2);
    //                 localStorage.setItem(GET_SLIDER, JSON.stringify(slider));
    //             })
    //             .catch(error => {
    //                 console.log(error);
    //             })
    //     }
    // },
    async [BLOG_LIST](state) {
        if (await getDataFromLocalStorage(state, BLOG_LIST, SET_BLOG_LIST)) {
            console.log('blog parsed from local storage');
        } else {
            await Axios.get(API_URL + '/blog_list')
                .then(data => {
                    let blogList = data.data;
                    state.commit(SET_BLOG_LIST, blogList)
                    blogList.expire_date = getExpireDate(2);
                    localStorage.setItem(BLOG_LIST, JSON.stringify(blogList));
                })
                .catch(error => {
                    console.log(error);
                })
        }
    },
    [GET_INTRO1](state) {
        Axios.get(API_URL + '/intro_section_1')
            .then(data => {
                let intro = data.data
                state.commit(SET_INTRO1, intro)
            })
            .catch(error => {
                console.log(error);
            })
    },
    [GET_INTRO2](state) {
        Axios.get(API_URL + '/intro_section_2')
            .then(data => {
                let intro = data.data
                state.commit(SET_INTRO2, intro)
            })
            .catch(error => {
                console.log(error);
            })
    },
    [GET_INTRO3](state) {
        Axios.get(API_URL + '/intro_section_3')
            .then(data => {
                let intro = data.data
                state.commit(SET_INTRO3, intro)
            })
            .catch(error => {
                console.log(error);
            })
    },
    async [GET_FOOTER](state) {
        if (await getDataFromLocalStorage(state, GET_FOOTER, SET_FOOTER)) {
            console.log('footer parsed from local storage');
        } else {
            await Axios.get(API_URL + '/footer')
                .then(data => {
                    let footer = data.data
                    state.commit(SET_FOOTER, footer)
                    footer.expire_date = getExpireDate(2);
                    localStorage.setItem(GET_FOOTER, JSON.stringify(footer));
                })
                .catch(error => {
                    console.log(error);
                })
        }
    },
    async [SEND_MAIL](state, messageData) {
        await Axios.post(API_URL + '/send_message', messageData)
            .then( data => {
                console.log(data.data);
            })
            .catch(error => {
                console.log(error);
            })
    },
    async [SEND_CONTACT](state, contactData) {
        await Axios.post(API_URL + '/send_contact', contactData)
            .then( data => {
                console.log(data.data);
            })
            .catch(error => {
                console.log(error);
            })
    },
    async [GET_MAPBOX_DATA](state) {
        if (await getDataFromLocalStorage(state, GET_MAPBOX_DATA, SET_MAPBOX_DATA)) {
            console.log('mapbox parsed from local storage');
        } else {
             await Axios.get(API_URL + '/mapbox')
                .then(data => {
                    let mapbox = data.data
                    state.commit(SET_MAPBOX_DATA, mapbox)
                    mapbox.expire_date = getExpireDate(2);
                    localStorage.setItem(GET_MAPBOX_DATA, JSON.stringify(mapbox));
                })
                .catch(error => {
                    console.log(error);
                })
        }
    },
    async [GET_STATIC_CONTENT](state, slug) {
        await Axios.get(API_URL + '/static_content', {params: {slug: slug } })
            .then(data => {
                let content = data.data
                state.commit(SET_STATIC_CONTENT, content)
            })
            .catch(error => {
                console.log(error);
            })
    },
}

// app store mutations
const mutations = {
    [SET_API_ROUTES](state, routeList) {
        state.apiRoutes = routeList;
    },
    [SET_HOME](state, home) {
        state.home = home;
    },
    // [SET_SLIDER](state, slider) {
    //     state.slider = slider;
    // },
    [SET_INTRO1](state, intro) {
        state.intro1 = intro;
    },
    [SET_INTRO2](state, intro) {
        state.intro2 = intro;
    },
    [SET_INTRO3](state, intro) {
        state.intro3 = intro;
    },
    [SET_BLOG_LIST](state, blogList) {
        state.blogPart1 = blogList.blogPart1;
        state.blogPart2 = blogList.blogPart2;
    },
    [SET_FOOTER](state, footer) {
        state.footer = footer;
    },
    [SET_LOADER](state, value) {
        state.loader = value;
    },
    [SET_MAPBOX_DATA](state, mapbox) {
        state.mapboxData = mapbox;
    },
    [SET_STATIC_CONTENT](state, content) {
        state.staticContent = content;
    }
}

export default {
    state,
    getters,
    actions,
    mutations
}
