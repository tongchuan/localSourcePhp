<template>
<div>
{{$route.params.id}}
</div>
</template>
<script>
export default{
  layout: 'dark',
  name: 'Item',
  data () {
    return {}
  },
  created () {
    console.log(this.$route.params.id)
  }
}
</script>