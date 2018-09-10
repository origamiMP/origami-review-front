<template>
    <div class="ecommerce-page">
        <div class="page-header header-filter header-small" data-parallax="true"
             style="background-image: url('/images/city.jpg'); transform: translate3d(0px, 0px, 0px);">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto text-center">
                        <div class="brand">
                            <h1 class="title">Find a Brand !</h1>
                            <h4>A new way to review.</h4>
                            <div class="card">
                                <div class="card-body">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                              <span class="input-group-text">
                                                  <i class="material-icons">search</i>
                                              </span>
                                        </div>
                                        <input v-model="search" type="text" class="form-control"
                                               placeholder="Find among thousands of brands">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main main-raised">
            <div class="section">
                <div class="container">
                    <div class="row">

                        <div class="col-md-3" v-for="organization in organizations">
                            <div class="card card-profile ml-auto mr-auto" style="max-width: 360px">
                                <div class="card-header card-header-image">
                                    <router-link :to="'/' + organization.type + 's/' + organization.id">
                                        <img class="img" :src="organization.image_profile"/>
                                    </router-link>
                                    <!--<div class="colored-shadow"-->
                                    <!--:style="'background-image: url(' + seller.image_profile + '); opacity: 1;'"></div>-->
                                </div>
                                <div class="card-body ">
                                    <h4 class="card-title">{{ organization.name }}</h4>
                                    <!--<h6 class="card-category text-gray">Vendeur</h6>-->
                                </div>
                                <div class="card-footer justify-content-center">
                                    <star-rating-component v-model="organization.average_verified_rating" :input-name="organization.name + 'Rating'"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- section -->
        </div>
        <!-- end-main-raised -->
    </div>
</template>

<script>
  import StarRatingComponent from '../components/StarRatingComponent'

  export default {
    components: {StarRatingComponent},
    data() {
      return {
        search: '',
        organizations: [],
      }
    },
    beforeCreate() {
      this.axios.get('/api/sellers/').then((response) => {
        this.organizations = [...this.organizations, ...response.data];
      });
      this.axios.get('/api/marketplaces/').then((response) => {
        this.organizations = [...this.organizations, ...response.data];
      });
    },
    watch: {
      search: function (newSearch, oldSearch) {
        this.axios.get('/api/sellers?search=' + newSearch).then((response) => {
          let sellers = response.data;
          this.axios.get('/api/marketplaces?search=' + newSearch).then((response) => {
            this.organizations = [...response.data, ...sellers];
          });
        });
      }
    }
  }
</script>
