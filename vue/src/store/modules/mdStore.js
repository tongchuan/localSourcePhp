import * as DB from '../api/mdDB'
// import {
//   MD_LIST,
//   // MK_ITEM,
//   MD_SAVE,
//   // MK_DELETE,
//   ERROR_MESSAGE
//  } from '../methods'
import { MD as method, ERROR_MESSAGE } from '../methods'

const state = {
  mdStore: {
    list: [],
    item: null
  }
}
const getters = {
  mdStore: state => state.mdStore
}
const actions = {
  [method.LIST] ({commit, state}, data) {
    DB.list(data).then((data) => {
      commit(method.LIST, data)
    }).catch((error) => {
      commit(ERROR_MESSAGE, error.toString())
    })
  },
  [method.ITEM] ({commit, state}, data) {
    DB.item(data).then((data) => {
      commit(method.ITEM, data)
    }).catch((error) => {
      commit(ERROR_MESSAGE, error.toString())
    })
  },
  [method.SAVE] ({commit, state}, [data, callback]) {
    DB.save(data).then((data) => {
      callback(undefined, data)
    }).catch((error) => {
      callback(error, [])
    })
  }
}
const mutations = {
  [method.LIST] (state, data) {
    state.mdStore.list = Object.assign([], data.data)
  },
  [method.ITEM] (state, data) {
    state.mdStore.item = Object.assign([], data.data)
  }
}
export default {
  state,
  getters,
  actions,
  mutations
}
