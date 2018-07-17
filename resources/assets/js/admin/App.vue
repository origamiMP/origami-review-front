<template>
    <div :class="{'nav-open': $sidebar.showSidebar}">
        <router-view></router-view>
    </div>
</template>

<script>
  export default {
    beforeCreate() {
      // this.$router.push('/register');
      // location.reload()
    }
  }
</script>