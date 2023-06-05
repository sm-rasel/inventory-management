// initial state
const state = () => ({
  applicantList: [],
  productList: [],
  categoryList: []
})

// getters
const getters = {
  applicantList: state  => state.applicantList,
  productList: state    => state.productList,
  categoryList: state   => state.categoryList
}

// actions
const actions = {
  mutateCommonProperties ({ commit }, payload) {
    commit('mutateCommonProperties', payload)
  }
}

// mutations
const mutations = {
  setApplicantList (state, applicants) {
    state.applicantList = applicants
  },
  setProductList (state, products) {
    state.productList = products
  },
  updateProductList (state, product) {
    state.productList = state.productList.map(item => {
      if(item.id ===  product.id) {
        item = product
      }
      return item
    })
  },
  setCategoryList (state, categorys) {
    state.categoryList = categorys
  }
}

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
}