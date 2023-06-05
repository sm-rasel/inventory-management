import { createStore, createLogger } from 'vuex'
import category from '../modules/category/store'
import product from '../modules/product/store'


const debug = process.env.NODE_ENV !== 'production'

export default createStore({
  modules: {
    category,
    product,
  },
  strict: debug,
  plugins: debug ? [createLogger()] : []
})