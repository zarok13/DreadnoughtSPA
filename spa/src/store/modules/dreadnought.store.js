import Axios from "axios"
// define app store actions names
export const GET_SLIDER = 'getSlider'
export const GET_INTRO1 = 'getIntro1'
export const GET_INTRO2 = 'getIntro2'
export const GET_INTRO3 = 'getIntro3'

// define app store mutations names
const SET_SLIDER = 'SetSlider'
const SET_INTRO1 = 'SetIntro1'
const SET_INTRO2 = 'SetIntro2'
const SET_INTRO3 = 'SetIntro3'

// initial app state
const state = {
    apiUrl: 'http://localhost:8000/',
    slider: [],
    intro1: '',
    intro2: '',
    intro3: '',
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
    }
}

// app store actions
const actions = {
    [GET_SLIDER](state) {
        Axios.get(state.state.apiUrl + 'api/slider')
            .then(data => {
                let slider = data.data
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
                console.log(intro);
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
                console.log(intro);
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
                console.log(intro);
                state.commit(SET_INTRO3, intro)
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
    }
}

export default {
    state,
    getters,
    actions,
    mutations
}