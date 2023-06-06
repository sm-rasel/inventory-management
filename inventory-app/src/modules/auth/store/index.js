// initial state
const state = () => ({
  authenticated:false,
  user: []
})

// getters
const getters = {
  authenticated: state => state.authenticated,
  user: state => state.user
}

// actions
const actions = {

}

// mutations
const mutations = {
  setAuthenticated (state, user) {
    state.authenticated = user
  },
  setUser (state, user) {
    state.user = user
  }
}

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
}