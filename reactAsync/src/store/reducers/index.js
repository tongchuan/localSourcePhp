import { combineReducers } from 'redux'
import { routerReducer } from 'react-router-redux'

import {userStore} from './userStore'
const rootReducer = combineReducers({
  routing: routerReducer,
  userStore
})
console.log(userStore)
export default rootReducer