import axios from './axios'
import config from './config'

export function userList (data) {
  return new Promise((resolve, reject) => {
    axios.get(config.user.userList, {params: data}).then((data) => {
      resolve(data)
    }).catch((error) => {
      console.log(error.toString())
      reject(error)
    })
  })
}
export function userRemove (data) {
  return new Promise((resolve, reject) => {
    axios.post(config.user.userRemove, data).then((data) => {
      resolve(data)
    }).catch((error) => {
      console.log(error.toString())
      reject(error)
    })
  })
}
export function userAdd (data) {
  return new Promise((resolve, reject) => {
    axios.post(config.user.userAdd, data).then((data) => {
      resolve(data)
    }).catch((error) => {
      console.log(error.toString())
      reject(error)
    })
  })
}
export function findOne (data) {
  return new Promise((resolve, reject) => {
    axios.post(config.user.userfindOne, data).then((data) => {
      resolve(data)
    }).catch((error) => {
      console.log(error.toString())
      reject(error)
    })
  })
}

export function getuser (data) {
  return new Promise((resolve, reject) => {
    axios.get(config.user.getuser, {params: data}).then((data) => {
      resolve(data)
    }).catch((error) => {
      console.log(error.toString())
      reject(error)
    })
  })
}

export function getuser2 (data) {
  return new Promise((resolve, reject) => {
    axios.post(config.user.getuser, data).then((data) => {
      resolve(data)
    }).catch((error) => {
      console.log(error.toString())
      reject(error)
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
