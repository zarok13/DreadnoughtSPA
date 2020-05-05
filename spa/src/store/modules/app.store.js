// define app store actions names
export const ACTION_APP_INCREMENT = 'ActionAppIncrement'
export const ACTION_APP_DECREMENT = 'ActionAppDecrement'
export const CALL_INCREMENT = 'callIncrement'

// define app store mutations names
const INCREMENT_VALUE = 'IncrementValue'
const DECREMENT_VALUE = 'DecrementValue'
const CUSTOM_INCREMENT = 'increment'

// initial app state
const state = {
    message: 'Hello Vuex',
    count: 0,
    counter: 0
}

const getters = {
    message(state) {
        return state.message.toUpperCase();
    },
    counter(state) {
        return state.count
    },
    getCounter(state) {
        return state.counter
    }
}

// app store actions
const actions = {
    [ACTION_APP_INCREMENT](context, arg) {
        context.commit(INCREMENT_VALUE, arg);
    },
    [ACTION_APP_DECREMENT](context, arg) {
        context.commit(DECREMENT_VALUE, arg);
    },
    [CALL_INCREMENT](state, payload) {
        state.commit(CUSTOM_INCREMENT, payload);
    }
}

// app store mutations
const mutations = {
    [INCREMENT_VALUE](state, arg) {
        state.counter = state.counter + arg
    },
    [DECREMENT_VALUE](state, arg) {
        state.counter = state.counter - arg
    },
    increment(state, payload) {
        state.count += payload;
    }
}

export default {
    state,
    getters,
    actions,
    mutations
}