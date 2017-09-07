import Vue from 'vue'
import Router from 'vue-router'
// import Hello from '@/components/Hello'
import Index from '@/containers/Index'
const NewsList = () => import('@/containers/news/NewsList')
const UserList = () => import('@/containers/users/UserList')
const UserAdd = () => import('@/containers/users/UserAdd')
Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Index',
      component: Index
    },
    {
      path: '/newslist',
      name: 'NewsList',
      component: NewsList
    },
    {
      path: '/userslist',
      name: 'UserList',
      component: UserList
    },
    {
      path: '/usersadd',
      name: 'UserAdd',
      component: UserAdd
    },
    {
      path: '/usersupdate/:id',
      name: 'UserAdd',
      component: UserAdd
    }
  ]
})
