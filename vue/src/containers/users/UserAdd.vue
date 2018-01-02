<template lang="html">
  <div class="" style="width:80%;magrin:0 auto;">
    <div class="">
      <h2>添加用户</h2>
    </div>
    <Form ref="formValidate" :model="formValidate" :rules="ruleValidate" :label-width="80">
      <FormItem label="用户名" prop="name">
          <Input v-model="formValidate.name" placeholder="请输入姓名"></Input>
      </FormItem>
      <FormItem label="密码" prop="pwd">
          <Input type="password" v-model="formValidate.pwd" placeholder="请输入姓名"></Input>
      </FormItem>
      <FormItem label="邮箱" prop="email">
          <Input v-model="formValidate.email" placeholder="请输入邮箱"></Input>
      </FormItem>
      <FormItem label="性别" prop="gender">
          <RadioGroup v-model="formValidate.gender">
              <Radio label="1">男</Radio>
              <Radio label="2">女</Radio>
          </RadioGroup>
      </FormItem>
      <FormItem label="生日">
        <DatePicker type="date" placeholder="选择生日" v-model="formValidate.date"></DatePicker>
      </FormItem>
      <FormItem>
        <Button type="primary" @click="handleSubmit('formValidate')">提交</Button>
        <Button type="ghost" @click="handleReset('formValidate')" style="margin-left: 8px">重置</Button>
      </FormItem>
    </Form>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import { USER_ADD, USER_ITEM } from '@/store/methods'
export default {
  name: 'userAdd',
  data () {
    return {
      formValidate: {
        _id: '',
        name: '',
        pwd: '',
        email: '',
        date: '',
        gender: ''
      },
      ruleValidate: {
        name: [
          { required: true, message: '用户名不能为空', trigger: 'blur' }
        ],
        pwd: [
          { required: true, message: '密码不能为空', trigger: 'blur' },
          { type: 'string', min: 6, message: '密码不能少于6字', trigger: 'blur' }
        ],
        email: [
          { required: true, message: '邮箱不能为空', trigger: 'blur' },
          { type: 'email', message: '邮箱格式不正确', trigger: 'blur' }
        ],
        date: [
          { required: true, type: 'date', message: '请选择日期', trigger: 'change' }
        ],
        gender: [
          { required: true, message: '请选择性别', trigger: 'change' }
        ]
      }
    }
  },
  created () {
    if (this.$route.params.id) {
      this.USER_ITEM([{type: '_id', value: this.$route.params.id}, (data) => {
        this.formValidate = {
          _id: data.data._id,
          name: data.data.name,
          pwd: data.data.pwd,
          email: data.data.email,
          date: data.data.date,
          gender: data.data.gender
        }
      }])
    }
  },
  computed: {
    ...mapGetters({
      userStore: 'userStore'
    })
  },
  methods: {
    ...mapActions([
      USER_ADD,
      USER_ITEM
    ]),
    handleSubmit (name) {
      let that = this
      this.$refs[name].validate((valid) => {
        if (valid) {
          console.log(that.formValidate)
          that.USER_ADD([that.formValidate, (data) => {
            this.$Message.success('提交成功!')
            this.$router.push('/userslist')
            // // 字符串
            // this.$router.push('/home/first')
            // // 对象
            // this.$router.push({ path: '/home/first' })
            // // 命名的路由
            // this.$router.push({ name: 'home', params: { userId: wise }})
          }])
        } else {
          this.$Message.error('表单验证失败!')
        }
      })
    },
    handleReset (name) {
      this.$refs[name].resetFields()
    }
  }
}
</script>

<style lang="css">
</style>
