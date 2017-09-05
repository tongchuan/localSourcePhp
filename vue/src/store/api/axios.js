import axios from 'axios'
import config from '../../../config'
// console.log(process.env.NODE_ENV) // npm run dev development
// console.log(process.env.NODE_ENV) // production
const baseUrl = process.env.NODE_ENV === 'production' ? config.build.serverUrl : config.dev.serverUrl
// axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded'
const instance = axios.create({
  baseURL: baseUrl,
  method: 'get',
  timeout: 6000
  // headers: {
  //   'Content-Type': 'application/x-www-form-urlencoded',
  //   'charset': 'UTF-8'
  // }
  // headers: {'X-Custom-Header': 'foobar', 'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'}
})

export default instance
