// initial state
const state = () => ({
  categoryList: []
})

// getters
const getters = {
  categoryList: state   => state.categoryList
}

// actions
const actions = {

}

// mutations
const mutations = {
  setCategoryList (state, categories) {
    state.categoryList = categories
  },
  updateCategoryList (state, category) {
    state.categoryList = state.categoryList.map(item => {
      if(item.id ===  category.id) {
        item = category
      }
      return item
    })
  },
  deleteCategory: function (state, categoryId) {
    const categoryIndex = state.categoryList.findIndex(category => category.id === categoryId);
    state.categoryList.splice(categoryIndex, 1);
  }
}

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
}