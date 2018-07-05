<template>
    <div class="main main-raised mt-4">
        <div class="section section-basic">

            <div class="container">
                <div class="title"><h2>Add review for {{order.marketplace.name}}</h2></div>

                <div class="col-md-12">

                    <div class="mt-5 mb-5" v-for="criteria in order.marketplace.marketplace_criteria">
                        <div class="form-group row">
                            <label class="col-sm-3" style="margin: auto"><h3>{{criteria.name}}</h3></label>
                            <div class="col-sm-9">
                                <div class="starrating risingstar d-flex float-left flex-row-reverse">
                                    <input v-model="review.criteria[criteria.id]" type="radio" :id="criteria.id + '_5'"
                                           :name="criteria.id" value="5"/><label :for="criteria.id + '_5'"
                                                                                 title="Excellent">
                                    <i class="material-icons">star</i>
                                </label>
                                    <input v-model="review.criteria[criteria.id]" type="radio" :id="criteria.id + '_4'"
                                           :name="criteria.id" value="4"/><label :for="criteria.id + '_4'"
                                                                                 title="Bon"><i
                                        class="material-icons">star</i></label>
                                    <input v-model="review.criteria[criteria.id]" type="radio" :id="criteria.id + '_3'"
                                           :name="criteria.id" value="3"/><label :for="criteria.id + '_3'"
                                                                                 title="Moyen"><i
                                        class="material-icons">star</i></label>
                                    <input v-model="review.criteria[criteria.id]" type="radio" :id="criteria.id + '_2'"
                                           :name="criteria.id" value="2"/><label :for="criteria.id + '_2'"
                                                                                 title="Bof"><i
                                        class="material-icons">star</i></label>
                                    <input v-model="review.criteria[criteria.id]" type="radio" :id="criteria.id + '_1'"
                                           :name="criteria.id" value="1"/><label :for="criteria.id + '_1'"
                                                                                 title="Mauvais"><i
                                        class="material-icons">star</i></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="comment"><h3>Your comment</h3></label>
                        <textarea v-model="review.text" class="form-control mt-5" id="comment" rows="8"></textarea>
                    </div>

                    <!--<div class="form-group">-->
                    <!--<div class="btn-xs btn-group mr-2" role="group" aria-label="First group">-->
                    <!--<button type="button" class="btn btn- btn-secondary-opacity">RAS</button>-->
                    <!--</div>-->
                    <!--<div class="btn-group mr-2" role="group" aria-label="Second group">-->
                    <!--<button type="button" class="btn btn-secondary-opacity">TOP !</button>-->
                    <!--</div>-->
                    <!--<div class="btn-group mr-2" role="group" aria-label="Second group">-->
                    <!--<button type="button" class="btn btn-secondary-opacity">....</button>-->
                    <!--</div>-->
                    <!--</div>-->
                </div>

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
  import ModalInstallMetamask from './ModalInstallMetamask';
  import ModalEnterMetamaskPassword from './ModalEnterMetamaskPassword';
  import SignMetamaskTransactionPassword from './SignMetamaskTransactionPassword';

  export default {
    data() {
      return {
        installMetamaskModalShow: false,
        enterMetamaskPasswordModalShow: false,
        signMetamaskTransactionModalShow: false,
        order: {
          marketplace: {
            marketplace_criteria: []
          }
        },
        review: {
          criteria: []
        }
      }
    },
    beforeCreate() {
      this.axios.get('/api/orders/' + this.$route.query.order_id).then((response) => {
        this.order = response.data;
      });
    },
    created() {
      let cookieReview = this.$cookie.get('review');
      if (cookieReview !== null) {
        this.review = JSON.parse(cookieReview);
        this.$cookie.delete('review');
        this.submitCertifiedReview();
      }
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
          review.review_hash = web3.sha3(JSON.stringify(review));

          web3.eth.sign(web3.eth.accounts[0], review.review_hash, function (err, result) {
            if (err)
              this.signMetamaskTransactionModalShow = false;
            else {
              review.review_signed_hash = result;
              review.wallet = web3.eth.accounts[0];

              console.log(review);
              context.axios.post('/api/reviews', review).then((response) => {
                router.push({name: 'ReviewCreateSuccess'});
              });
            }
          });
        }
      },

      submitNonCertifiedReview() {
        let router = this.$router;

        console.log(this.getFormattedReview(false));

        this.axios.post('/api/reviews', this.getFormattedReview(false)).then(() => {
          router.push({name: 'ReviewCreateSuccess'});
        });
      },

      modalMetamaskValidate() {
        this.$cookie.set('review', JSON.stringify(this.review), {expires: '10m'});
        window.location.reload()
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

        Object.keys(context.review.criteria).map(function (key) {
          review.criteria.push({
            marketplace_criteria_id: key,
            rating: context.review.criteria[key]
          });
        });

        return review;
      },
    },
    components: {
      SignMetamaskTransactionPassword,
      ModalInstallMetamask,
      ModalEnterMetamaskPassword
    }
  }
</script>
