import Vue from 'vue'
import Router from 'vue-router'
// import Hello from '@/components/Hello'
import Index from '@/containers/Index'
const NewsList = () => import('@/containers/news/NewsList')
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
    }

  ]
})
