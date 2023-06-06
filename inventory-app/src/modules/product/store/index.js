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
  },
  deleteProduct(state, productId) {
    const productIndex = state.productList.findIndex(product => product.id === productId);
    state.productList.splice(productIndex, 1)
  }
}

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
}