<template>
  <transition name="fade" mode="out-in">
    <!--<keep-alive>-->
      <router-view></router-view>
    <!--</keep-alive>-->
  </transition>
</template>
<script>
export default{}
</script>
<style>
  .fade-enter-active, .fade-leave-active {
    transition-property: opacity;
    transition-duration: .10s;
  }

  .fade-enter-active {
    transition-delay: .10s;
  }

  .fade-enter, .fade-leave-active {
    opacity: 0
  }
</style>
