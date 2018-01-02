import Vue from 'vue'
import Vuex from 'vuex'
// console.log(Vuex)
import userStore from '~/store/modules/userStore'
// console.log(userStore)
Vue.use(Vuex)

// const store = new Vuex.Store({
//   modules: {
//     userStore
//   }
// })
const store = () => new Vuex.Store({
  modules: {
    userStore
  }
    // state: {
    //   counter: 0
    // },
    // mutations: {
    //   increment (state) {
    //     state.counter++
    //   }
    // }
  })
  
  
export default store