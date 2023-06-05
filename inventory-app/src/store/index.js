import { createStore, createLogger } from 'vuex'
import applicants from '../modules/applicant/store'


const debug = process.env.NODE_ENV !== 'production'

export default createStore({
  modules: {
    applicants,
  },
  strict: debug,
  plugins: debug ? [createLogger()] : []
})