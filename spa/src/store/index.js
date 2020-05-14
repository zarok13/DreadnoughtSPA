import Vue from 'vue'
import Axios from 'axios'
import Vuex from 'vuex'
import dreadnought from './modules/dreadnought.store'
// import createPersistedState from 'vuex-persistedstate'


Vue.use(Vuex, Axios)

const store = new Vuex.Store({
    debug: false,
    modules: {
        dreadnought
    },
    plugins: [
        // createPersistedState({
            // reducer: (persistedState) => {
            //     const stateFilter = Object.assign({}, persistedState)
            //     const blackList = ['intro1', 'intro2', 'intro3']

            //     blackList.forEach((item) => {
            //         delete stateFilter['dreadnought'][item]
            //     })

            //     return stateFilter
            // }
        // })
    ]
})

export default store