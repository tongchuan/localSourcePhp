<template lang="html">

  <div class="">
    <div class="">
      用户管理 <router-link to="usersadd">添加用户</router-link>
    </div>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>用户名</th>
          <th>邮箱</th>
          <th>编辑</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(item,index) in userStore.userlist">
          <td>{{item.name}}</td>
          <td>{{item.email}}</td>
          <td>
            <a href="javascript:void(0)" @click="updateItem(item,$event)">修改</a>
            <a href="javascript:void(0)" @click="deleteItem(item,$event)">删除</a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import { USER_LIST, USER_DELETE } from '@/store/methods'
export default {
  name: 'userslist',
  data () {
    return { }
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
      USER_LIST,
      USER_DELETE
    ]),
    updateItem (item, event) {
      this.$router.push('/usersupdate/' + item._id)
      // this.$router.push({path: 'usersupdate', params: { id: item._id }})
    },
    deleteItem (item, event) {
      let that = this
      that.USER_DELETE([{type: '_id', value: item._id}, () => {
        that.USER_LIST()
      }])
    }
  }
}
</script>

<style lang="css">
</style>
