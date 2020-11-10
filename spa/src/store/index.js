import Vue from 'vue'
import Axios from 'axios'
import Vuex from 'vuex'
import dreadnought from './modules/dreadnought.store'

Vue.use(Vuex, Axios)
const store = new Vuex.Store({
    debug: false,
    modules: {
        dreadnought
    },
    plugins: []
})

export default store