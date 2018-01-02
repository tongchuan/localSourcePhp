<template lang="html">
  <div class="">
    <div id="editor" type="text/plain" style="width:1024px;height:500px;"></div>
    <button @click="submits">保存</button>
<button @click="xieru">写入</button>
  </div>
</template>

<script>
import '../../../static/ueditor/ueditor.config.js'
import '../../../static/ueditor/ueditor.all.js'
import '../../../static/ueditor/lang/zh-cn/zh-cn.js'
export default {
  name: 'newsadd',
  data () {
    return {
      ue: '',
      uedata: [],
      xierudata: []
    }
  },
  mounted () {
    console.log(window.UE)
    this.ue = window.UE.getEditor('editor', { BaseUrl: '', UEDITOR_HOME_URL: 'static/ueditor/' })
  },
  methods: {
    submits () {
      this.uedata.push(window.UE.getEditor('editor').getContent())
      console.log(this.uedata.join('\n'))
    },
    xieru () {
      window.UE.getEditor('editor').setContent('欢迎使用ueditor')
    }
  }
}
</script>

<style lang="css">
</style>
