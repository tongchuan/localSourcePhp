import axios from 'axios'
export default {
  getUserItem(data){
    return axios.get('http://127.0.0.1/keep/mdTplView').then(json=>json.data).then(err=>err)
    // return {name:'dddd'}
  }
}