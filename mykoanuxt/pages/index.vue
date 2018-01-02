<template>
  <section class="container">
    <ul>
      <li v-for="(item,index) in getDataList" v-bind:key="index">
         <nuxt-link v-bind:to="'/item/'+item.id">
          <span v-text="item.displayName"></span>
         </nuxt-link>
      </li>
    </ul>
    <!-- <img src="../assets/img/logo.png" alt="Nuxt.js Logo" class="logo" />
    <h1 class="title">
      Universal Vue.js Application Framework
    </h1>
    <nuxt-link class="button" to="/about">
      About page
    </nuxt-link>
    {{JSON.stringify(userStore.userItem)}} -->
  </section>
</template>
<script>
import { mapGetters, mapActions } from 'vuex'
import DB from '~/store/db/userDb'
import action from '~/store/actionMethod'
export default {
  name: 'Index',
  data () {
    return {}
  },
  asyncData () {
    DB.getUserItem().then((data)=>{
      // console.log(data.data)
    })
  },
  created () {
    this[action.GET_USER_ITEM]()
  },
  methods: {
    ...mapActions([
      action.GET_USER_ITEM
    ])
  },
  computed: {
    ...mapGetters({
      userStore: 'userStore'
    }),
    getDataList() {
      if(this.userStore.userItem.data && this.userStore.userItem.data.items && this.userStore.userItem.data.items){
        return this.userStore.userItem.data.items
      }else{
        return []
      }
    }
  }
}
</script>
<style scoped>
</style>
