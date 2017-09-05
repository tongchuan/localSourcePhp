<template lang="html">

</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import { GET_USER } from '@/store/modules/userStore'
export default {
  name: 'index',
  created () {
    this.GET_USER({username: 'zhang', password: '123'})
  },
  computed: {
    ...mapGetters({
      userStore: 'userStore'
    })
  },
  methods: {
    ...mapActions([GET_USER])
  }
}
</script>

<style lang="css">
</style>
