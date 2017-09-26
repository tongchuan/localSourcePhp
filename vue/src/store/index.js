import Vue from 'vue'
import Vuex from 'vuex'
import errorStore from './modules/errorStore'
import userStore from './modules/userStore'
import mdStore from './modules/mdStore'
Vue.use(Vuex)
const store = new Vuex.Store({
  modules: {
    errorStore,
    userStore,
    mdStore
  }
})
export default store
