import * as userDB from '../api/userDB'
import {
  GET_USER,
  GET_USERS,
  ERROR_MESSAGE,
  USER_LIST,
  USER_ADD,
  USER_DELETE,
  USER_ITEM
 } from '../methods'
// console.log(userDB)
const state = {
  userStore: {
    userlist: [],
    user: null
  }
}
const getters = {
  userStore: state => state.userStore
}
const actions = {
  [USER_LIST] ({commit, state}, data) {
    userDB.userList(data).then((data) => {
      commit(USER_LIST, data)
    }).catch((error) => {
      commit(ERROR_MESSAGE, error.toString())
      console.log(error)
    })
  },
  [USER_DELETE] ({commit, state}, [data, callback]) {
    userDB.userRemove(data).then((data) => {
      callback(data)
    }).catch((error) => {
      commit(ERROR_MESSAGE, error.toString())
      console.log(error)
    })
  },
  [USER_ADD] ({commit, state}, [data, callback]) {
    userDB.userAdd(data).then((data) => {
      callback(data)
    }).catch((error) => {
      commit(ERROR_MESSAGE, error.toString())
      console.log(error)
    })
  },
  [USER_ITEM] ({commit, state}, [data, callback]) {
    userDB.findOne(data).then((data) => {
      callback(data)
    }).catch((error) => {
      commit(ERROR_MESSAGE, error.toString())
      console.log(error)
    })
  },
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
  [USER_LIST] (state, data) {
    state.userStore.userlist = Object.assign([], data.data)
  },
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
