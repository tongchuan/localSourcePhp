import { ERROR_MESSAGE } from '../methods'
const state = {
  errorStore: {
    message: ''
  }
}
const getters = {
  errorStore: state => state.errorStore
}
const actions = {

}
const mutations = {
  [ERROR_MESSAGE] (state, data) {
    state.errorStore.message = data
  }
}
export default {
  state,
  getters,
  actions,
  mutations
}
