import Vue from 'vue'
import Vuex from 'vuex'
import dreadnought from './modules/dreadnought.store'

Vue.use(Vuex)
const store = new Vuex.Store({
    debug: false,
    modules: {
        dreadnought
    },
    plugins: []
})

export default store