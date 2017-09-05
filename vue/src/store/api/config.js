import config from '../../../config'
// console.log(process.env.NODE_ENV) // npm run dev development
// console.log(process.env.NODE_ENV) // production
const baseUrl = process.env.NODE_ENV === 'production' ? config.build.serverUrl : config.dev.serverUrl
// console.log(baseUrl)
export default {
  user: {
    getuser: baseUrl + 'getuser'
  }
}
