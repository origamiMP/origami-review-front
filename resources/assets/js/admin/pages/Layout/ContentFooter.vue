<template>
  <footer class="footer">
    <div class="container">
        <nav>
            <ul>
              <li>
                <a href="#" v-on:click="logout">Logout</a>
              </li>
                <!--<li>-->
                    <!--<a href="#">-->
                        <!--Company-->
                    <!--</a>-->
                <!--</li>-->
                <!--<li>-->
                    <!--<a href="#">-->
                        <!--Portfolio-->
                    <!--</a>-->
                <!--</li>-->
                <!--<li>-->
                    <!--<a href="#">-->
                        <!--Blog-->
                    <!--</a>-->
                <!--</li>-->
            </ul>
        </nav>
        <div class="copyright text-center">
          &copy; {{ new Date().getFullYear() }} <a href="/">Origami Review</a>, made with <i class="fa fa-heart heart"></i> for a better web
        </div>
    </div>
  </footer>

</template>
<script>
export default {
  methods: {
    logout() {
      this.axios.post('/api/users/logout').then((response) => {
        this.$router.push('/auth/login');
        window.location.reload();
      })
    }
  }
}

</script>
<style>

</style>
