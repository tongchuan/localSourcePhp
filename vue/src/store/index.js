import Vue from 'vue'
import Vuex from 'vuex'
import errorStore from './modules/errorStore'
import userStore from './modules/userStore'

Vue.use(Vuex)
const store = new Vuex.Store({
  modules: {
    errorStore,
    userStore
  }
})
export default store
