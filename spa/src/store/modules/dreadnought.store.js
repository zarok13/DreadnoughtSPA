import Axios from "axios"
// define app store actions names
export const GET_SLIDER = 'getSlider'

// define app store mutations names
const SET_SLIDER = 'SetSlider'

// initial app state
const state = {
    apiUrl: 'http://localhost:8000/',
    slider: [],
}


const getters = {
    getApiUrl(state) {
        return state.apiUrl
    },
    getSlider(state) {
        return state.slider
    }
}

// app store actions
const actions = {
    [GET_SLIDER](state) {
        Axios.get(state.state.apiUrl + 'api/slider')
            .then(data => {
                console.log(data.data);
                let slider = data.data
                state.commit(SET_SLIDER, slider)
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
    }
}

export default {
    state,
    getters,
    actions,
    mutations
}