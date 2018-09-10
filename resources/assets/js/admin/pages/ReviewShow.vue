<template>
    <div class="content">
        <div class="md-layout">
            <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-50">
                <md-card>
                    <md-card-header data-background-color="primary">
                        <h4 class="title">Order Summary</h4>
                    </md-card-header>
                    <md-card-content>
                        <div class="md-layout md-gutter">
                            <div class="md-layout-item md-size-25"><b>ID</b></div>
                            <div class="md-layout-item">{{review.order.id}}</div>
                        </div>
                        <hr/>
                        <div class="md-layout md-gutter">
                            <div class="md-layout-item md-size-25"><b>Reference</b></div>
                            <div class="md-layout-item">{{review.order.reference}}</div>
                        </div>
                        <hr/>
                        <div class="md-layout md-gutter">
                            <div class="md-layout-item md-size-25"><b>Order date</b></div>
                            <div class="md-layout-item">{{review.order.date}}</div>
                        </div>
                        <hr/>
                        <div class="md-layout md-gutter">
                            <div class="md-layout-item md-size-25"><b>Marketplace</b></div>
                            <div class="md-layout-item">{{review.order.marketplace.name}}</div>
                        </div>
                        <hr/>
                        <div class="md-layout md-gutter mb-5">
                            <div class="md-layout-item md-size-25"><b>Products</b></div>
                            <div class="md-layout-item">(Fictionnal Products)</div>
                        </div>
                        <!--<div v-for="product in review.order.products">-->
                            <!--<div class="md-layout md-gutter mt-5 order-product">-->
                                <!--<div class="md-layout-item md-size-25 text-center">-->
                                    <!--<div class="order-product-image"><img :src="product.image"></div>-->
                                <!--</div>-->
                                <!--<div class="md-layout-item md-size-25">{{product.name}}</div>-->
                                <!--<div class="md-layout-item md-size-25">{{product.quantity}}</div>-->
                                <!--<div class="md-layout-item md-size-25">{{product.price}} €</div>-->
                            <!--</div>-->
                        <!--</div>-->
                    </md-card-content>
                </md-card>
            </div>
            <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-50">
                <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100">
                    <md-card>
                        <md-card-header data-background-color="primary">
                            <h4 class="title">Customer information</h4>
                        </md-card-header>
                        <md-card-content>
                            <div class="md-layout md-gutter">
                                <div class="md-layout-item md-size-25"><b>ID</b></div>
                                <div class="md-layout-item">{{review.order.customer.id}}</div>
                            </div>
                            <hr/>
                            <div class="md-layout md-gutter">
                                <div class="md-layout-item md-size-25"><b>Customer Name</b></div>
                                <div class="md-layout-item">{{review.order.customer.name}}</div>
                            </div>
                            <hr/>
                            <div class="md-layout md-gutter">
                                <div class="md-layout-item md-size-25"><b>Customer Email</b></div>
                                <div class="md-layout-item">{{review.order.customer.email}}</div>
                            </div>
                        </md-card-content>
                    </md-card>
                </div>
                <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100">
                    <md-card>
                        <md-card-header data-background-color="primary">
                            <h4 class="title">Customer Review</h4>
                        </md-card-header>
                        <md-card-content>
                            <div class="md-layout md-gutter">
                                <div class="md-layout-item md-size-25"><b>ID</b></div>
                                <div class="md-layout-item">{{review.id}}</div>
                            </div>
                            <hr/>
                            <div class="md-layout md-gutter">
                                <div class="md-layout-item md-size-25"><b>State</b></div>
                                <div class="md-layout-item">
                                    <md-icon v-if="review.review_state.name === 'ACCEPTED'">done</md-icon>
                                    <md-icon v-if="review.review_state.name === 'CERTIFIED'">done</md-icon>
                                    <md-icon v-if="review.review_state.name === 'CREATED'">hourglass_empty</md-icon>
                                    <md-icon v-if="review.review_state.name === 'REFUSED'">clear</md-icon>
                                </div>
                            </div>
                            <hr/>
                            <div class="md-layout md-gutter">
                                <div class="md-layout-item md-size-25"><b>Rating</b></div>
                                <div class="md-layout-item">
                                    <star-rating-component :value="review.rating" :input-name="review.id + 'Rating'"
                                                           :disabled="true"/>
                                </div>
                            </div>
                            <hr/>
                            <div class="md-layout md-gutter">
                                <div class="md-layout-item md-size-25"><b>Comment</b></div>
                                <div class="md-layout-item">{{review.text}}</div>
                            </div>
                        </md-card-content>
                        <md-card-actions md-alignment="space-between">
                            <div>
                                <md-button v-if="review.review_state.name === 'CREATED'" @click.native="showModal = true">Refuse review</md-button>
                            </div>

                            <md-card-expand-trigger>
                                <md-button v-if="review.review_state.name !== 'ACCEPTED' && review.review_state.name !== 'CERTIFIED'" @click.native="accept" class="md-success">Accept review</md-button>
                            </md-card-expand-trigger>
                        </md-card-actions>
                    </md-card>
                </div>
            </div>
            <div v-if="review.review_comments.length > 0"
                 class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100">
                <md-card>
                    <md-card-header data-background-color="primary">
                        <h4 class="title">Reviews comments</h4>
                    </md-card-header>
                    <md-card-content>
                        <div v-for="review_comment in review.review_comments">
                            <div class="md-layout md-gutter">
                                <div class="md-layout-item md-size-25"><b>{{ review_comment.author.name}} :</b></div>
                                <div class="md-layout-item">{{review_comment.text}}</div>
                            </div>
                            <hr/>
                        </div>

                        <md-field v-if="review.review_state.name === 'REFUSED'" maxlength="10">
                            <label>Comment</label>
                            <md-textarea rows="10" v-model="comment"></md-textarea>
                        </md-field>
                    </md-card-content>
                    <md-card-actions v-if="review.review_state.name === 'REFUSED'">
                        <md-button class="md-primary" @click.native="addComment">Send</md-button>
                    </md-card-actions>
                </md-card>
            </div>
        </div>
        <modal-refuse-review ref="modalRefuseReview" :validateAction="refuse"
                             :showModal="showModal"></modal-refuse-review>
    </div>
</template>

<script>
  import StarRatingComponent from "../components/StarRatingComponent"
  import ModalRefuseReview from "../components/ModalRefuseReview"

  export default {
    created() {
      this.getReview()
    },
    data() {
      return {
        review: {
          order: {
            marketplace: {},
            seller: {},
            customer: {},
            products: []
          },
          review_comments: [],
          review_state: {}
        },
        showModal: false,
        comment: ''
      }
    },
    methods: {
      accept() {
        this.axios.post('/api/reviews/' + this.review.id + '/accept').then((response) => {
          this.$router.push('/admin/reviews');
        });
      },
      refuse() {
        this.axios.post('/api/reviews/' + this.review.id + '/refuse', {text: this.$refs.modalRefuseReview.refuse_comment}).then((response) => {
          this.$router.push('/admin/reviews');
        });
      },
      addComment() {
        this.axios.post('/api/reviews/' + this.review.id + '/comments', {text: this.comment}).then((response) => {
          this.getReview()
        });
      },
      getReview() {
        this.axios.get('/api/reviews/' + this.$route.params.id).then((response) => {
          this.review = response.data;
        });
      }
    },
    components: {StarRatingComponent, ModalRefuseReview}
  }
</script>

<style scoped lang="scss">
    .order-product {
        margin-top: 20px;
        div {
            margin: auto;
        }
        .order-product-image {
            height: 80px;
            width: 80px;
            img {
                object-fit: cover;
                height: 100%;
                width: 100%;
            }
        }
    }
</style>
