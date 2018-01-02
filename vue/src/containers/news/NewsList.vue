<template lang="html">
  <div class="g">
    <div class="newsItem">
    <script id="editor" type="text/plain" style="width:1024px;height:500px;"></script>
    </div>
    <div class="newslist">
      <ul>
        <li>newslist</li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
}
</script>

<style lang="sass" scoped>
.newslist
  width: 100%
  ul
    li
      line-height: 30px
</style>
<style lang="less" scoped>

.newsItem{
  width: 100%;
  ul{
    li{
      line-height: 30px
    }
  }
}
</style>
