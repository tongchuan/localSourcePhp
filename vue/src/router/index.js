import Vue from 'vue'
import Router from 'vue-router'
import Hello from '@/components/Hello'
const Index = () => import('@/containers/Index.vue')
Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Hello',
      component: Hello
    },
    {
      path: '/index',
      name: 'Index',
      component: Index
    }
  ]
})
