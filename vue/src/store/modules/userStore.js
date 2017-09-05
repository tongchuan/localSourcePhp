import * as userDB from '../api/userDB'
export const GET_USER = 'GET_USER'
console.log(userDB)
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
      console.log(error)
    })
  }
}
const mutations = {
  [GET_USER] (state, data) {
    state.userStore.user = Object.assign({}, data)
  }
}
export default {
  state,
  getters,
  actions,
  mutations

}
