import axios from './axios'
import config from './config'

export function getuser (data) {
  return new Promise((resolve, reject) => {
    axios.get(config.user.getuser, {params: data}).then((response) => {
      resolve(response.data)
    }).catch((error) => {
      reject(error)
      console.log(error)
    })
  })
}

export function getuser2 (data) {
  return new Promise((resolve, reject) => {
    console.log(data)
    axios.post(config.user.getuser, data).then((response) => {
      resolve(response.data)
    }).catch((error) => {
      reject(error)
      console.log(error)
    })
  })
}

export function getuser3 (data) {
  return new Promise((resolve, reject) => {
    console.log(data)
    axios.post(config.user.getuser, {data: data}).then((response) => {
      resolve(response.data)
    }).catch((error) => {
      reject(error)
      console.log(error)
    })
  })
}
