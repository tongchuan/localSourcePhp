<template lang="html">
<div class="">
  <Table stripe :columns="columns1" :data="userStore.userlist"></Table>
  <!-- <ul>
    <li v-for="(item,index) in userStore.userlist">{{index}}/{{item._id}} {{item.name}}</li>
  </ul> -->
</div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import { USER_LIST } from '@/store/methods'
export default {
  name: 'userslist',
  data () {
    return {
      columns1: [
        {
          title: '姓名',
          key: 'name'
        },
        {
          title: '年龄',
          key: 'age'
        },
        {
          title: '地址',
          key: '_id'
        }
      ]
    }
  },
  created () {
    this.USER_LIST({})
  },
  computed: {
    ...mapGetters({
      userStore: 'userStore'
    })
  },
  methods: {
    ...mapActions([
      USER_LIST
    ])
  }
}
</script>

<style lang="css">
</style>
