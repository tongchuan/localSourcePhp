import DB from '~/store/db/userDb'
import action from '~/store/actionMethod'
// console.log(DB)
const state = {
  userStore: {
    userItem: {}
  }
}
const getters = {
  userStore: state => {
    return state.userStore
  }
}
const actions = {
  [action.GET_USER_ITEM] ({commit, state}, data) {
    DB.getUserItem(data).then((data)=>{
      commit(action.GET_USER_ITEM, data)
    }, (err) => {
      console.log(err)
    })
    
  }
}
const mutations = {
  [action.GET_USER_ITEM] (state, data) {
    state.userStore.userItem = Object.assign({}, data)
  }
}
export default {
  state,
  mutations,
  actions,
  getters
}
