<template>
    <div class="ecommerce-page">
        <div class="page-header header-filter header-small" data-parallax="true"
             style="background-image: url('/images/city.jpg'); transform: translate3d(0px, 0px, 0px);">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto text-center">
                        <div class="brand">
                            <h1 class="title">Trouvez une entreprise !</h1>
                            <h4>Lisez des avis. Publiez des avis. Trouvez des entreprises.</h4>
                            <div class="card">
                                <div class="card-body">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                              <span class="input-group-text">
                                                  <i class="material-icons">search</i>
                                              </span>
                                        </div>
                                        <input v-model="search" type="text" class="form-control"
                                               placeholder="Recherchez une entreprise">
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

                        <div class="col-md-3" v-for="seller in sellers">
                            <div class="card card-profile ml-auto mr-auto" style="max-width: 360px">
                                <div class="card-header card-header-image">
                                    <router-link :to="'/sellers/' + seller.id">
                                        <img class="img" :src="seller.image_profile"/>
                                    </router-link>
                                    <!--<div class="colored-shadow"-->
                                    <!--:style="'background-image: url(' + seller.image_profile + '); opacity: 1;'"></div>-->
                                </div>
                                <div class="card-body ">
                                    <h4 class="card-title">{{ seller.name }}</h4>
                                    <!--<h6 class="card-category text-gray">Vendeur</h6>-->
                                </div>
                                <div class="card-footer justify-content-center">
                                    <div class="starrating d-flex float-left flex-row-reverse">
                                        <input v-model="seller.average_verified_rating" type="radio"
                                               :id="seller.name + 'star1'" value="5"
                                               :name="seller.name + 'star1'" disabled/>
                                        <label :for="seller.name + 'star1'" style="font-size: 10px !important;"><i
                                                class="material-icons">star</i></label>
                                        <input v-model="seller.average_verified_rating" type="radio"
                                               :id="seller.name + 'star2'" value="4"
                                               :name="seller.name + 'star2'" disabled/>
                                        <label :for="seller.name + 'star2'" style="font-size: 10px !important;"><i
                                                class="material-icons">star</i></label>
                                        <input v-model="seller.average_verified_rating" type="radio"
                                               :id="seller.name + 'star3'" value="3"
                                               :name="seller.name + 'star3'" disabled/>
                                        <label :for="seller.name + 'star3'" style="font-size: 10px !important;"><i
                                                class="material-icons">star</i></label>
                                        <input v-model="seller.average_verified_rating" type="radio"
                                               :id="seller.name + 'star4'" value="2"
                                               :name="seller.name + 'star4'" disabled/>
                                        <label :for="seller.name + 'star4'" style="font-size: 10px !important;"><i
                                                class="material-icons">star</i></label>
                                        <input v-model="seller.average_verified_rating" type="radio"
                                               :id="seller.name + 'star5'" value="1"
                                               :name="seller.name + 'star5'" disabled/>
                                        <label :for="seller.name + 'star5'" style="font-size: 10px !important;"><i
                                                class="material-icons">star</i></label>
                                    </div>
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
  export default {
    data() {
      return {
        search: '',
        sellers: [],
      }
    },
    beforeCreate() {
      this.axios.get('/api/sellers/').then((response) => {
        this.sellers = response.data;
      });
    },
    watch: {
      search: function (newSearch, oldSearch) {
        this.axios.get('/api/sellers?search=' + newSearch).then((response) => {
          this.sellers = response.data;
        });
      }
    }
  }
</script>
