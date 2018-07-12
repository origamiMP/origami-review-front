<template>
    <div class="wrapper">
        <header class="navbar navbar-expand navbar-dark bg-dark flex-column flex-md-row bd-navbar">
            <div class="container-fluid pl-5 pr-5">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
                        aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <img src="/images/origami_review_logo.png" width="30" height="30" class="d-inline-block align-top"
                         alt="">
                    Origami Review
                </a>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Sellers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Marketplace</a>
                        </li>
                    </ul>
                    <form class="form-inline ml-auto">
                        <div class="form-group has-white">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-white btn-raised btn-fab btn-fab-mini btn-round">
                            <i class="material-icons">search</i>
                        </button>
                    </form>
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
    components: {
      GeneralContent,
    }
  }
</script>
