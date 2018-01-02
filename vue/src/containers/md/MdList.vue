<template lang="html">
  <div class="">
    <h1>mark编辑器 <a href="javascript:void(0)" @click="mdAdd($event)">添加</a></h1>
    <ul>
      <li v-for="(item, index) in this.mdStore.list">
        {{index+1}} <a href="javascript:void(0)" @click="itemClick(item,$event)"> {{'title:'+item.title +'\t\temial:'+item.email}}</a>
      </li>
    </ul>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import { MD as method } from '@/store/methods'
export default {
  name: 'mdlist',
  data () {
    return {}
  },
  created () {
    this[method.LIST]()
    // this.method.LIST({})
  },
  mounted () {

  },
  computed: {
    ...mapGetters({
      mdStore: 'mdStore'
    })
  },
  methods: {
    ...mapActions([
      method.LIST,
      method.SAVE
    ]),
    mdAdd () {
      this.$router.replace('/md')
      // console.log(this)
    },
    itemClick (item) {
      this.$router.replace('/mditem/' + item._id)
    }
  }
}
</script>

<style lang="css">
</style>
