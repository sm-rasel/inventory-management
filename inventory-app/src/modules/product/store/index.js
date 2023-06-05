// initial state
const state = () => ({
  productList: []
})

// getters
const getters = {
  productList: state    => state.productList
}

// actions
const actions = {

}

// mutations
const mutations = {
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
  }
}

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
}