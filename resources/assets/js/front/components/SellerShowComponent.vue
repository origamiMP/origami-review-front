<template xmlns:on="http://www.w3.org/1999/xhtml">
    <div class="profile-page">
        <div class="page-header header-filter" data-parallax="true"
             :style="'margin-top: -20px;height: 300px; background-image: url('+ seller.image_cover +');'"></div>

        <div class="main main-raised">
            <div class="profile-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 ml-auto mr-auto">
                            <div class="profile">
                                <div class="avatar">
                                    <img :src="seller.image_profile" alt="Circle Image"
                                         class="img-raised rounded-circle img-fluid">
                                </div>
                                <div class="name">
                                    <h3 class="title">{{seller.name}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">

                        <ul class="nav nav-pills justify-content-center">
                            <li class="nav-item"><a class="nav-link active" href="#pill1" data-toggle="tab">Origami Reviews</a></li>
                            <li class="nav-item"><a class="nav-link" href="#pill2" data-toggle="tab">External reviews</a>
                            </li>
                        </ul>
                        <div class="mt-3 tab-content tab-space">
                            <div class="tab-pane active" id="pill1">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6 text-center">
                                                <h3>Reviews ({{countTrustedReviews}}) •
                                                    {{trustedReviewScoreQualifier}}</h3>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6">
                                                <star-rating-component
                                                        v-model="seller.average_rating"
                                                        :input-name="seller.name + 'Rating'"
                                                        font-size="60px" :disabled="true"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-1"></div>
                                    <div class="col-md-5">
                                        <div class="row">
                                            <div class="col-md-3 pr-0">Great</div>
                                            <div class="col-md-8 pl-0">
                                                <div class="mt-2 progress progress-line-primary">
                                                    <div class="progress-bar progress-bar-primary" role="progressbar"
                                                         v-bind:style="{width: fiveRatingRatio}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1 pl-0">{{fiveRatingRatio}}</div>
                                            <div class="col-md-3 pr-0">Good</div>
                                            <div class="col-md-8 pl-0">
                                                <div class="mt-2 progress progress-line-primary">
                                                    <div class="progress-bar progress-bar-primary" role="progressbar"
                                                         v-bind:style="{width: fourRatingRatio}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1 pl-0">{{fourRatingRatio}}</div>
                                            <div class="col-md-3 pr-0">Okay</div>
                                            <div class="col-md-8 pl-0">
                                                <div class="mt-2 progress progress-line-primary">
                                                    <div class="progress-bar progress-bar-primary" role="progressbar"
                                                         v-bind:style="{width: threeRatingRatio}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1 pl-0">{{threeRatingRatio}}</div>
                                            <div class="col-md-3 pr-0">Bad</div>
                                            <div class="col-md-8 pl-0">
                                                <div class="mt-2 progress progress-line-primary">
                                                    <div class="progress-bar progress-bar-primary" role="progressbar"
                                                         v-bind:style="{width: twoRatingRatio}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1 pl-0">{{twoRatingRatio}}</div>
                                            <div class="col-md-3 pr-0">Poor</div>
                                            <div class="col-md-8 pl-0">
                                                <div class="mt-2 progress progress-line-primary">
                                                    <div class="progress-bar progress-bar-primary" role="progressbar"
                                                         v-bind:style="{width: oneRatingRatio}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1 pl-0">{{oneRatingRatio}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--<div class="tab-pane" id="pill2">-->
                            <!--Efficiently unleash cross-media information without cross-media value. Quickly maximize-->
                            <!--timely deliverables for real-time schemas.-->
                            <!--<br><br>Dramatically maintain clicks-and-mortar solutions without functional solutions.-->
                            <!--</div>-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="section section-tabs">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div v-for="review in seller.reviews" class="card" style="margin-bottom: 20px"
                                 v-bind:class="{certified: review.wallet}">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3" style="margin: auto;">
                                            <star-rating-component v-model="review.rating" :input-name="review.id"
                                                                   :disabled="true"/>
                                        </div>
                                        <div class="col-md-9" style="margin: auto;">
                                            <span class="text-gray float-right">published on {{review.created_at}}</span>

                                        </div>
                                    </div>
                                    <hr/>
                                    <div>{{review.text}}</div>
                                    <div class="text-gray float-right" style="text-align: right">
                                        <div>Ordered on <router-link :to="'/marketplaces/' + review.order.marketplace.id">{{review.order.marketplace.name}}</router-link></div>
                                        <div v-if="review.wallet" style="font-size: 12px !important">
                                            <i style="font-size: 12px !important" class="material-icons">lock</i> IPFS node id : {{review.ddb_node_id}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-primary" v-on:click="giveOpinion">Give my opinion</button>

                            <!--<nav aria-label="..." class="mt-5">-->
                            <!--<ul class="pagination justify-content-center">-->
                            <!--<li class="page-item disabled">-->
                            <!--<span class="page-link">Previous</span>-->
                            <!--</li>-->
                            <!--<li class="page-item"><a class="page-link" href="#">1</a></li>-->
                            <!--<li class="page-item active">-->
                            <!--<span class="page-link">-->
                            <!--2-->
                            <!--<span class="sr-only">(current)</span>-->
                            <!--</span>-->
                            <!--</li>-->
                            <!--<li class="page-item"><a class="page-link" href="#">3</a></li>-->
                            <!--<li class="page-item">-->
                            <!--<a class="page-link" href="#">Next</a>-->
                            <!--</li>-->
                            <!--</ul>-->
                            <!--</nav>-->
                        </div>
                        <div class="col-md-4">
                            <div v-if="seller.description || seller.website_link" class="card"
                                 style="margin-bottom: 20px">
                                <div class="card-body">
                                    <h4><b>{{seller.name}}</b></h4>
                                    <p>{{seller.description}}</p>
                                    <div class="text-center">
                                        <button :href="seller.website_link" class="btn btn-round btn-primary">Visit
                                            {{seller.name}}
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div v-if="seller.email || seller.phone || seller.address" class="card"
                                 style="margin-bottom: 20px">
                                <div class="card-body">
                                    <h4><b>Contact information :</b></h4>
                                    <div>Write to : <a :href="seller.email">{{seller.email}}</a></div>
                                    <div>Call : {{seller.phone}}</div>
                                    <div>Find us : {{seller.address}}</div>
                                    <div class="text-center">
                                        <button class="mr-3 btn btn-default btn-fab btn-fab-mini btn-round"><i
                                                class="fa fa-facebook"></i></button>
                                        <button class="mr-3 btn btn-default btn-fab btn-fab-mini btn-round"><i
                                                class="fa fa-twitter"></i></button>
                                        <button class="btn btn-default btn-fab btn-fab-mini btn-round"><i
                                                class="fa fa-google-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
  import StarRatingComponent from './StarRatingComponent'

  export default {
    components: {StarRatingComponent},
    data() {
      return {
        seller: {
          reviews: []
        },
      }
    },
    created() {
      this.axios.get('/api/sellers/' + this.$route.params.id).then((response) => {
        this.seller = response.data;
      });
    },
    computed: {
      fiveRatingRatio() {
        return parseFloat(this.seller.five_rating_reviews_ratio) + '%'
      },
      fourRatingRatio() {
        return parseFloat(this.seller.four_rating_reviews_ratio) + '%'
      },
      threeRatingRatio() {
        return parseFloat(this.seller.three_rating_reviews_ratio) + '%'
      },
      twoRatingRatio() {
        return parseFloat(this.seller.two_rating_reviews_ratio) + '%'
      },
      oneRatingRatio() {
        return parseFloat(this.seller.one_rating_reviews_ratio) + '%'
      },
      countTrustedReviews() {
        return this.seller.reviews.length;
      },
      trustedReviewScoreQualifier() {
        switch (this.seller.average_verified_rating) {
          case 1:
            return 'Poor';
          case 2:
            return 'Bad';
          case 3:
            return "Okay";
          case 4:
            return "Good";
          case 5:
            return "Great";
          default:
            return "None";
        }
      }
    },
    methods: {
      giveOpinion() {
        this.$router.push('/reviews/new');
        window.location.reload()
      }
    }
  }
</script>

<style scoped lang="scss">
    .certified {
        border: 2px solid #e72b54;
    }
</style>
