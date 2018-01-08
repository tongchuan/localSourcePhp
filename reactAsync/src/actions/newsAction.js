import axios from 'axios'
export default {
  news(data){
    return (dispatch, getState) => {
      dispatch({type:'RECEIVE_HOT_SEARCH', data:{name:Math.random()}})
    }
  }
}