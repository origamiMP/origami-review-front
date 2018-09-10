<template>
    <div class="main main-raised mt-4">
        <div class="section section-basic">
            <div class="alert alert-primary">
                <div class="container">
                    <!--<div class="alert-icon">-->
                        <!--<i class="material-icons">info_outline</i>-->
                    <!--</div>-->
                    <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close">-->
                        <!--<span aria-hidden="true"><i class="material-icons">clear</i></span>-->
                    <!--</button>-->

                    You are about to test this new way to review solution as a customer in a safe testnet environment. You have the opportunity to simulate a review (not a real one - because it’s a Beta - actually) about a fictional order you had on a website you like (Nike, for exemple).
                    Now, you can choose a seller and a marketplace, in order to write a review. Have fun !
                </div>
            </div>
            <div v-if="!order.id" class="container">
                <div class="title"><h2>1. Simulate an order</h2></div>

                <div class="col-md-12">

                    <form>

                        <div class="form-group">
                            <label for="selectedMarketplace">Choose a marketplace</label>

                            <select class="form-control" data-style="btn btn-link"
                                    v-model="selectedMarketplaceId" id="selectedMarketplace">
                                <option v-for="marketplace in marketplaces" :value="marketplace.id">
                                    {{marketplace.name}}
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="selectedSeller">Choose a seller</label>

                            <select class="form-control" data-style="btn btn-link"
                                    v-model="selectedSellerId"
                                    id="selectedSeller">
                                <option v-for="seller in sellers" :value="seller.id">
                                    {{seller.name}}
                                </option>
                            </select>
                        </div>

                    </form>

                    <button v-on:click="simulateOrder" class="btn btn-primary">Simulate</button>

                </div>

            </div>

            <div v-if="order.id" class="container mt-5">

                <div class="title"><h2>2. Give your opinion on {{order.seller.name}} from
                    {{order.marketplace.name}}</h2></div>

                <form>

                    <div class="mt-5 mb-5" v-for="criteria in order.marketplace.marketplace_criteria">
                        <div class="form-group row">
                            <label class="col-sm-3" style="margin: auto"><h3>{{criteria.name}}</h3></label>
                            <div class="col-sm-9">
                                <div class="starrating editable risingstar d-flex float-left flex-row-reverse">
                                    <star-rating-component font-size="60px" v-model="criteria.rating"
                                                           :input-name="criteria.id" :editable="true"></star-rating-component>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="comment"><h3>Your comment</h3></label>
                        <textarea v-model="review.text" class="form-control" id="comment" rows="8"></textarea>
                    </div>
                </form>

                <div class="row mt-5">

                    <div class="col-md-6 text-center" style="margin: auto;">
                        <a v-on:click="submitNonCertifiedReview" href="#">Send a classical review</a>
                    </div>

                    <div class="col-md-6 text-center">
                        <button v-on:click="submitCertifiedReview" class="btn btn-primary btn-lg">Send a certified
                            review
                            <br>and get 1,45 ORI
                        </button>
                    </div>
                </div>

                <ModalInstallMetamask :showModal="installMetamaskModalShow" :closeAction="modalMetamaskClose"
                                      :validateAction="modalMetamaskValidate"></ModalInstallMetamask>
                <ModalEnterMetamaskPassword :showModal="enterMetamaskPasswordModalShow"
                                            :closeAction="modalMetamaskClose"
                                            :validateAction="modalMetamaskValidate"></ModalEnterMetamaskPassword>
                <SignMetamaskTransactionPassword :showModal="signMetamaskTransactionModalShow"
                                                 :closeAction="modalMetamaskClose"></SignMetamaskTransactionPassword>

            </div>

        </div>

    </div>
</template>

<script>

  import ModalInstallMetamask from '../components/ModalInstallMetamask';
  import ModalEnterMetamaskPassword from '../components/ModalEnterMetamaskPassword';
  import SignMetamaskTransactionPassword from '../components/SignMetamaskTransactionPassword';
  import StarRatingComponent from '../components/StarRatingComponent';

  export default {
    data() {
      return {
        installMetamaskModalShow: false,
        enterMetamaskPasswordModalShow: false,
        signMetamaskTransactionModalShow: false,
        selectedSellerId: null,
        selectedMarketplaceId: null,
        review: {
          criteria: []
        },
        sellers: [],
        marketplaces: [],
        order: {
          marketplace: {
            marketplace_criteria: []
          },
          seller: {}
        }
      }
    },
    beforeCreate() {
      if (this.$route.query.order_id)
        this.axios.get('/api/orders/' + this.$route.query.order_id).then((response) => {
          this.order = response.data;
          let cookieReview = this.$cookie.get('review');
          if (cookieReview !== null) {
            this.review = JSON.parse(cookieReview).review;
            this.order.marketplace.marketplace_criteria = JSON.parse(cookieReview).criteria;
            this.$cookie.delete('review');
            this.submitCertifiedReview();
          }
        });
      this.axios.get('/api/sellers').then((response) => {
        this.sellers = response.data;
        this.selectedSellerId = this.sellers[0].id
      });
      this.axios.get('/api/marketplaces').then((response) => {
        this.marketplaces = response.data;
        this.selectedMarketplaceId = this.marketplaces[0].id
      });
    },
    methods: {

      submitCertifiedReview() {
        let context = this;
        let router = this.$router;

        if (typeof web3 === 'undefined')
          this.installMetamaskModalShow = true;
        else if (web3.eth.accounts.length === 0)
          this.enterMetamaskPasswordModalShow = true;
        else {
          this.signMetamaskTransactionModalShow = true;
          let review = context.getFormattedReview();
          review.hash = web3.sha3(JSON.stringify(review));

          web3.eth.sign(web3.eth.accounts[0], review.hash, function (err, result) {
            if (err)
              this.signMetamaskTransactionModalShow = false;
            else {
              review.signed_hash = result;
              review.wallet = web3.eth.accounts[0];

              context.axios.post('/api/reviews', review).then((response) => {
                router.push({name: 'ReviewCreateSuccess'});
              });
            }
          });
        }
      },

      submitNonCertifiedReview() {
        let router = this.$router;

        this.axios.post('/api/reviews', this.getFormattedReview(false)).then(() => {
          router.push({name: 'ReviewCreateSuccess'});
        });
      },

      modalMetamaskValidate() {
        this.$cookie.set('review', JSON.stringify({
          review: this.review,
          criteria: this.order.marketplace.marketplace_criteria
        }), {expires: '10m'});
        window.location.href = '/reviews/new?order_id=' + this.order.id
      },

      modalMetamaskClose() {
        this.installMetamaskModalShow = false;
        this.enterMetamaskPasswordModalShow = false;
        this.signMetamaskTransactionModalShow = false;
      },

      getFormattedReview(certified = true) {
        let context = this;
        let review = {
          order_id: context.order.id,
          text: context.review.text,
          certified: certified,
          criteria: []
        };

        context.order.marketplace.marketplace_criteria.forEach(function (value) {
          review.criteria.push({
            marketplace_criteria_id: value.id,
            rating: value.rating
          });
        });

        return review;
      },
      simulateOrder() {
        let context = this;
        this.axios.post('/api/orders/simulate', {
          marketplace_id: this.selectedMarketplaceId,
          seller_id: this.selectedSellerId
        }).then((response) => {
          this.axios.get('/api/orders/' + response.data.id).then((response) => {
            context.order = response.data
          });
        });
      }
    },
    components: {
      SignMetamaskTransactionPassword,
      ModalInstallMetamask,
      ModalEnterMetamaskPassword,
      StarRatingComponent
    }
  }
</script>
