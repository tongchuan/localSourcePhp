import * as userDB from '../api/userDB'
import { GET_USER, GET_USERS, ERROR_MESSAGE } from '../methods'
// console.log(userDB)
const state = {
  userStore: {
    user: null
  }
}
const getters = {
  userStore: state => state.userStore
}
const actions = {
  [GET_USER] ({commit, state}, data) {
    userDB.getuser(data).then((data) => {
      commit(GET_USER, data)
    }).catch((error) => {
      commit(ERROR_MESSAGE, error.toString())
      console.log(error)
    })
  },
  [GET_USERS] ({commit, state}, data) {
    userDB.getuser2(data).then((data) => {
      commit(GET_USERS, data)
    }).catch((error) => {
      commit(ERROR_MESSAGE, error.toString())
    })
  }
}
const mutations = {
  [GET_USER] (state, data) {
    state.userStore.user = Object.assign({}, data)
  },
  [GET_USERS] (state, data) {
    state.userStore.user = Object.assign({}, data)
  }
}
export default {
  state,
  getters,
  actions,
  mutations
}
