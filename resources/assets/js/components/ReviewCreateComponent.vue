<template>
    <div class="container">
        <form v-on:submit.prevent="submitReview">

            <div class="col-md-12">

                <h2>Evaluez {{order.marketplace ? order.marketplace.name : ''}}</h2>
                <div class="mt-5 mb-5" v-for="criteria in order.marketplace.marketplace_criteria">

                    <div class="form-group row">
                        <label class="col-sm-3" style="margin: auto"><h3>{{criteria.name}}</h3></label>
                        <div class="col-sm-9">
                            <div class="starrating risingstar d-flex float-left flex-row-reverse">
                                <input type="radio" id="star5" name="rating" value="5"/><label for="star5"
                                                                                               title="5 star"></label>
                                <input type="radio" id="star4" name="rating" value="4"/><label for="star4"
                                                                                               title="4 star"></label>
                                <input type="radio" id="star3" name="rating" value="3"/><label for="star3"
                                                                                               title="3 star"></label>
                                <input type="radio" id="star2" name="rating" value="2"/><label for="star2"
                                                                                               title="2 star"></label>
                                <input type="radio" id="star1" name="rating" value="1"/><label for="star1"
                                                                                               title="1 star"></label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Commentaire</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1"
                              rows="8" name="comment"></textarea>
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
    </div>

</template>

<script>
  export default {
    data() {
      return {
        order: {
          marketplace: {
            marketplace_criteria: []
          }
        }
      }
    },
    created: function () {
      this.getNewReviewData();
    },

    methods: {
      getNewReviewData() {
        this.axios.get('/orders/' + this.$route.query.order_id).then((response) => {
          this.order = response.data;
        });
      },
      submitReview() {
        let params = JSON.stringify({
          critere1: 'toto',
          commentaire: 'tata',
        });

        let sha3_params = web3.sha3(params);
        let router = this.$router;

        web3.eth.sign(web3.eth.accounts[0], sha3_params, function (err, result) {
          if (err) return console.error(err);
          console.log('SIGNED:' + result);
          router.push({name: 'ReviewCreateSuccessComponent'});

          // $.ajax({
          //   method: 'POST',
          //   url: '/reviews',
          //   headers: {
          //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          //   },
          //   data: {
          //     data: params,
          //     hash: sha3_params,
          //     signed_hash: result,
          //     wallet: web3.eth.accounts[0]
          //   },
          //   success: function(data) {
          //     alert("ok : " + data['response']);
          //   },
          //   fail: function(data) {
          //     alert('ko : ' + data.data);
          //   }
          // })

        });
      }
    }
  }
</script>
