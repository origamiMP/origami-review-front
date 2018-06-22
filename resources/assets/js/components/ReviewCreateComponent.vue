<template>
    <div class="container">
        <form v-on:submit.prevent="submitReview">

            <div class="col-md-12">

                <h2>Evaluez {{order.marketplace.name}}</h2>
                <div class="mt-5 mb-5" v-for="criteria in order.marketplace.marketplace_criteria">

                    <div class="form-group row">
                        <label class="col-sm-3" style="margin: auto"><h3>{{criteria.name}}</h3></label>
                        <div class="col-sm-9">
                            <div class="starrating risingstar d-flex float-left flex-row-reverse">
                                <input v-model="review[criteria.id]" type="radio" :id="criteria.id + '_5'"
                                       :name="criteria.id" value="5"/><label :for="criteria.id + '_5'"
                                                                             title="Excellent"></label>
                                <input v-model="review[criteria.id]" type="radio" :id="criteria.id + '_4'"
                                       :name="criteria.id" value="4"/><label :for="criteria.id + '_4'"
                                                                             title="Bon"></label>
                                <input v-model="review[criteria.id]" type="radio" :id="criteria.id + '_3'"
                                       :name="criteria.id" value="3"/><label :for="criteria.id + '_3'"
                                                                             title="Moyen"></label>
                                <input v-model="review[criteria.id]" type="radio" :id="criteria.id + '_2'"
                                       :name="criteria.id" value="2"/><label :for="criteria.id + '_2'"
                                                                             title="Bof"></label>
                                <input v-model="review[criteria.id]" type="radio" :id="criteria.id + '_1'"
                                       :name="criteria.id" value="1"/><label :for="criteria.id + '_1'"
                                                                             title="Mauvais"></label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="comment">Commentaire</label>
                    <textarea v-model="review.text" class="form-control" id="comment"
                              rows="8"></textarea>
                </div>
                <div class="form-group">
                    <div class="btn-group mr-2" role="group" aria-label="First group">
                        <button type="button" class="btn btn-secondary-opacity">RAS</button>
                    </div>
                    <div class="btn-group mr-2" role="group" aria-label="Second group">
                        <button type="button" class="btn btn-secondary-opacity">TOP !</button>
                    </div>
                    <div class="btn-group mr-2" role="group" aria-label="Second group">
                        <button type="button" class="btn btn-secondary-opacity">....</button>
                    </div>
                </div>
            </div>

            <div class="row mt-5">

                <div class="col-md-6 text-center" style="margin: auto;"><a href="#">Déposer un avis classique</a></div>

                <div class="col-md-6 text-center">
                    <button type="submit" class="btn btn-primary btn-lg">Déposer un avis vérifié <br>et
                        gagner
                        1,45
                        ORI
                    </button>
                </div>
            </div>


        </form>

        <ModalInstallMetamask :showModal="installMetamaskModalShow" :closeAction="modalMetamaskClose"
                              :validateAction="modalMetamaskValidate"></ModalInstallMetamask>
        <ModalEnterMetamaskPassword :showModal="enterMetamaskPasswordModalShow" :closeAction="modalMetamaskClose"
                                    :validateAction="modalMetamaskValidate"></ModalEnterMetamaskPassword>
        <SignMetamaskTransactionPassword :showModal="signMetamaskTransactionModalShow"
                                         :closeAction="modalMetamaskClose"></SignMetamaskTransactionPassword>
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
        review: {}
      }
    },
    beforeCreate() {
      this.axios.get('/orders/' + this.$route.query.order_id).then((response) => {
        this.order = response.data;
      });
    },
    created() {
      let cookieReview = this.$cookie.get('review');
      if (cookieReview !== null) {
        this.review = JSON.parse(cookieReview);
        this.$cookie.delete('review');
        this.submitReview();
      }
    },
    methods: {
      submitReview() {
        let context = this;
        let router = this.$router;

        if (typeof web3 === 'undefined')
          this.installMetamaskModalShow = true;
        else if (web3.eth.accounts.length === 0)
          this.enterMetamaskPasswordModalShow = true;
        else {
          let params = JSON.stringify({
            critere1: 'toto',
            text: 'tata',
            rating: 5
          });

          context.review.data = params;
          context.review.hash = web3.sha3(params);

          this.signMetamaskTransactionModalShow = true;
          web3.eth.sign(web3.eth.accounts[0], context.review.hash, function (err, result) {
            if (err) {
              this.signMetamaskTransactionModalShow = false;
            } else {
              context.review.signed_hash = result;
              context.review.wallet = web3.eth.accounts[0];

              context.axios.post('/reviews', context.review).then((response) => {
                router.push({name: 'ReviewCreateSuccess'});
              });
            }
          });
        }
      },
      modalMetamaskValidate() {
        this.$cookie.set('review', JSON.stringify(this.review), {expires: '10m'});
        window.location.reload()
      },
      modalMetamaskClose() {
        this.installMetamaskModalShow = false;
        this.enterMetamaskPasswordModalShow = false;
        this.signMetamaskTransactionModalShow = false;
      }
    },
    components: {
      SignMetamaskTransactionPassword,
      ModalInstallMetamask,
      ModalEnterMetamaskPassword
    }
  }
</script>
