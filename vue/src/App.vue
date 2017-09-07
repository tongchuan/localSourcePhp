<template>
  <div id="app">
    <div class="">
      {{errorStore.message}}
    </div>
    <!-- <img src="./assets/logo.png"> -->
    <router-view></router-view>

  </div>
</template>

<script>
import { mapGetters } from 'vuex'
export default {
  name: 'app',
  computed: {
    ...mapGetters({
      errorStore: 'errorStore'
    })
  }
}
</script>

<style>
/*@primary-color: #8c0776*/
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
</style>
