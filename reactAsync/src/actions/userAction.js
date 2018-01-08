import axios from 'axios'
// export default {
//   user(data){
//     return (dispatch, getState) => {
//       dispatch({type:'RECEIVE_HOT_SEARCH', data:{name:Math.random()}})
//     }
//   }
// }

export function user1(){
  return (dispatch, getState) => {
    console.log(getState)
    dispatch({type:'RECEIVE_HOT_SEARCH', data:{name:Math.random()}})
  }
}