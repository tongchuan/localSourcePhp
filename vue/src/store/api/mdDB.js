import axios from './axios'
import config from './config'
export function save (data) {
  return new Promise((resolve, reject) => {
    axios.post(config.markdown.save, data).then((data) => {
      resolve(data)
    }).catch((error) => {
      console.log(error.toString())
      reject(error)
    })
  })
}
export function list (data) {
  return new Promise((resolve, reject) => {
    axios.get(config.markdown.list, {params: data}).then((data) => {
      resolve(data)
    }).catch((error) => {
      console.log(error.toString())
      reject(error)
    })
  })
}
export function item (data) {
  return new Promise((resolve, reject) => {
    axios.post(config.markdown.item, data).then((data) => {
      resolve(data)
    }).catch((error) => {
      console.log(error.toString())
      reject(error)
    })
  })
}
