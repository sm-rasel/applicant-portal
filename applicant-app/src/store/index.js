import { createStore, createLogger } from 'vuex'
import applicants from '../modules/applicant/store'
import actions from './actions'

const debug = process.env.NODE_ENV !== 'production'

export default createStore({
  modules: {
    applicants
  },
  actions,
  strict: debug,
  plugins: debug ? [createLogger()] : []
})