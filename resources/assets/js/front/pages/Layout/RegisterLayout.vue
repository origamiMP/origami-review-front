<template>
    <div class="wrapper login-page">
        <nav class="navbar navbar-color-on-scroll navbar-transparent    fixed-top  navbar-expand-lg " color-on-scroll="100" id="sectionsNav">

            <div class="container">
                <div class="navbar-translate">

                    <router-link class="navbar-brand" to="/">
                        <img src="/images/origami_review_logo.png" width="30" height="30" class="d-inline-block align-top"
                             alt="">
                        Origami Review
                    </router-link>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon"></span>
                        <span class="navbar-toggler-icon"></span>
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">

                        <li v-if="!this.$root.currentUser.email" class="nav-item" id="navbarTogglerDemo03">
                            <ul class="navbar-nav float-right ml-auto mt-2 mt-lg-0">
                                <li class="nav-item">
                                    <router-link class="nav-link" to="/auth/register">Register</router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link class="nav-link" to="/auth/login">Log In</router-link>
                                </li>
                            </ul>
                        </li>
                        <li v-else>
                            <a href="/admin" class="btn btn-xs">To the back office ></a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        <div class="page-header header-filter" style="background-image: url('/images/city.jpg')">
            <general-content></general-content>
            <footer class="footer">
                <div class="container">
                    <nav class="float-left">
                        <ul>
                        </ul>
                    </nav>
                    <div class="copyright float-right">
                        © 2018, made with <i class="material-icons">favorite</i> by
                        <a href="/" target="_blank">Origami Review</a> for a better web.
                    </div>
                </div>
            </footer>
        </div>

    </div>
</template>
<style lang="scss">

</style>
<script>
  import GeneralContent from './Content.vue'

  export default {
    beforeCreate() {
      this.axios.get('/api/me').then((response) => {
        this.$root.currentUser = response.data;
      })
    },
    components: {
      GeneralContent,
    }
  }
</script>
