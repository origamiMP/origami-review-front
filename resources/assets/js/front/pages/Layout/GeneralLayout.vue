<template>
    <div class="wrapper">
        <header class="navbar navbar-color-on-scroll fixed-top navbar-expand-lg navbar-transparent"
                color-on-scroll="100">
            <div class="container-fluid pl-5 pr-5">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
                        aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <router-link class="navbar-brand" to="/">
                    <img src="/images/origami_review_logo.png" width="30" height="30" class="d-inline-block align-top"
                         alt="">
                    Origami Review
                </router-link>

                <div v-if="!this.$root.currentUser.email" class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav float-right ml-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <router-link class="nav-link" to="/auth/register">S'inscrire</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link" to="/auth/login">Se connecter</router-link>
                        </li>
                    </ul>
                </div>
                <div v-else>
                    <a href="/admin" class="btn btn-xs">Vers le back office ></a>
                </div>
            </div>
        </header>

        <general-content></general-content>

        <footer class="footer" data-background-color="black">
            <div class="container">
                <nav class="float-left">
                    <ul>
                        <li>
                            <a href="https://www.creative-tim.com">
                                Origami
                            </a>
                        </li>
                        <li>
                            <a href="https://presentation.creative-tim.com">
                                About Us
                            </a>
                        </li>
                        <li>
                            <a href="https://blog.creative-tim.com">
                                Blog
                            </a>
                        </li>
                        <li>
                            <a href="https://www.creative-tim.com/license">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright float-right">
                    © 2018, made with <i class="material-icons">favorite</i> by
                    <a href="https://www.creative-tim.com" target="_blank">Origami</a> for a better web.
                </div>
            </div>
        </footer>

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
