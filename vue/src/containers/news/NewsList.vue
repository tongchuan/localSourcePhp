<template lang="html">
  <div class="g">
    <div class="newsItem">
      <ul>
        <li>newsItem</li>
      </ul>
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
.g{
  background: url('../../assets/logo.png')
}
.newsItem{
  width: 100%;
  ul{
    li{
      line-height: 30px
    }
  }
}
</style>
