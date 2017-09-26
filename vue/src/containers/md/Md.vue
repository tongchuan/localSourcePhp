<template lang="html">
  <div>
      <div id="editormd">
        <textarea style="display:none;">
          
        </textarea>
      </div>
      <div class="">
        <a href="javascript:void(0)" @click="baocun">baocun</a>
      </div>
      <div class="">
        {{this.mdStore.list}}
      </div>
  </div>
</template>

<script>
// import jQuery from 'jquery'
// import editormd from 'editor.md/editormd.js'
// import 'bootstrap/dist/css/bootstrap.css'
import { mapGetters, mapActions } from 'vuex'
import { MD as method } from '@/store/methods'
import 'editor.md/css/editormd.css'
export default {
  name: 'md',
  data () {
    return {
      editor: null
    }
  },
  created () {
    this[method.LIST]()
  },
  computed: {
    ...mapGetters({
      mdStore: 'mdStore'
    })
  },
  mounted () {
    // console.log(editormd)
    // console.log(window.$)
    // console.log(window.jQuery)
    this.editor = window.editormd({
      id: 'editormd',
      width: '90%',
      height: 340,
      path: '/static/editor.md/lib/'
    })
    // console.log(jQuery('#editormd'))
    // console.log(jQuery('#editormd'))
    // console.log(jQuery)
    // console.log(this.editor)
  },
  methods: {
    ...mapActions([
      method.LIST,
      method.SAVE
    ]),
    baocun () {
      this[method.SAVE]([
        {
          title: 'zhangtongchuan' + Math.random(),
          content: this.editor.getMarkdown(),
          email: 'zhangtch@yonyou.com'
        },
        (err, data) => {
          console.log(err)
          console.log(data)
        }
      ])
    }
  }
}
</script>

<style lang="css">
</style>
