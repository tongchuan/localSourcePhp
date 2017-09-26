<template lang="html">
  <div>
      <div class="">
        Title: <input type="text" v-model:value="title">
      </div>
      <div id="editormd">
        <textarea style="display:none;">{{this.mdStore.item && this.mdStore.item.content}}</textarea>
      </div>
      <div class="">
        <a href="javascript:void(0)" @click="baocun">baocun</a>
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
  name: 'MdItem',
  data () {
    return {
      _id: '',
      title: '',
      editor: null
    }
  },
  created () {
    // console.log(this)
    this[method.ITEM]({type: '_id', value: this.$route.params._id})
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
      method.ITEM,
      method.SAVE
    ]),
    baocun () {
      // console.log(this)
      this[method.SAVE]([
        {
          _id: this.$route.params._id,
          title: this.title,
          content: this.editor.getMarkdown(),
          email: 'zhangtch@yonyou.com'
        },
        (err, data) => {
          if (!err) {
            this.$router.replace('/mdlist')
          }
          // console.log(data)
        }
      ])
    }
  },
  watch: {
    'mdStore.item.title' (newVal, oldValue) {
      this.title = newVal
      // console.log(newVal, oldValue)
    },
    '$route.params._id' (newVal, oldValue) {
      this[method.ITEM]({type: '_id', value: newVal})
    }
  }
}
</script>

<style lang="css">
</style>
