import Axios from "axios"
// define app store actions names
export const GET_SLIDER = 'getSlider'
export const GET_INTRO1 = 'getIntro1'
export const GET_INTRO2 = 'getIntro2'
export const GET_INTRO3 = 'getIntro3'
export const BLOG_LIST = 'blogList'

// define app store mutations names
const SET_SLIDER = 'setSlider'
const SET_INTRO1 = 'setIntro1'
const SET_INTRO2 = 'setIntro2'
const SET_INTRO3 = 'setIntro3'
const SET_BLOG_LIST = 'setBlogList'

// initial app state
const state = {
    apiUrl: 'http://localhost:8000/',
    slider: [],
    intro1: '',
    intro2: '',
    intro3: '',
    blogPart1: [],
    blogPart2: []
}


const getters = {
    getApiUrl(state) {
        return state.apiUrl
    },
    getSlider(state) {
        return state.slider
    },
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
}

// app store actions
const actions = {
    [GET_SLIDER](state) {
        Axios.get(state.state.apiUrl + 'api/slider')
            .then(data => {
                let slider = data.data
                // console.log(slider);
                state.commit(SET_SLIDER, slider)
            })
            .catch(error => {
                console.log(error);
            })
    },
    [GET_INTRO1](state) {
        Axios.get(state.state.apiUrl + 'api/intro_section_1')
            .then(data => {
                let intro = data.data
                // console.log(intro);
                state.commit(SET_INTRO1, intro)
            })
            .catch(error => {
                console.log(error);
            })
    },
    [GET_INTRO2](state) {
        Axios.get(state.state.apiUrl + 'api/intro_section_2')
            .then(data => {
                let intro = data.data
                // console.log(intro);
                state.commit(SET_INTRO2, intro)
            })
            .catch(error => {
                console.log(error);
            })
    },
    [GET_INTRO3](state) {
        Axios.get(state.state.apiUrl + 'api/intro_section_3')
            .then(data => {
                let intro = data.data
                // console.log(data.data);
                state.commit(SET_INTRO3, intro)
            })
            .catch(error => {
                console.log(error);
            })
    },
    [BLOG_LIST](state) {
        Axios.get(state.state.apiUrl + 'api/blog_list')
            .then(data => {
                let blogList = data.data;
                // console.log(blogList);
                state.commit(SET_BLOG_LIST, blogList)
            })
            .catch(error => {
                console.log(error);
            })
    }
}

// app store mutations
const mutations = {
    [SET_SLIDER](state, slider) {
        state.slider = slider;
    },
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
        state.blogPart1 = blogList.data_1;
        state.blogPart2 = blogList.data_2;
    }
}

export default {
    state,
    getters,
    actions,
    mutations
}