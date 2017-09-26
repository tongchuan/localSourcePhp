import Vue from 'vue'
import Router from 'vue-router'
// import Hello from '@/components/Hello'
import Index from '@/containers/Index'
const NewsList = () => import('@/containers/news/NewsList')
const NewsAdd = () => import('@/containers/news/NewsAdd')
const UserList = () => import('@/containers/users/UserList')
const UserAdd = () => import('@/containers/users/UserAdd')
const Md = () => import('@/containers/md/Md')
const MdList = () => import('@/containers/md/MdList')
const MdItem = () => import('@/containers/md/MdItem')
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
      path: '/newsadd',
      name: 'NewsAdd',
      component: NewsAdd
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
    },
    {
      path: '/md',
      name: 'md',
      component: Md
    },
    {
      path: '/mdlist',
      name: 'MdList',
      component: MdList
    },
    {
      path: '/mditem/:_id',
      name: 'MdItem',
      component: MdItem
    }
  ]
})
