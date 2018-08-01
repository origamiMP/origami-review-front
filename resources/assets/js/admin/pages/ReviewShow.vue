<template>
    <div class="content">
        <div class="md-layout">
            <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-50">
                <md-card>
                    <md-card-header data-background-color="primary">
                        <h4 class="title">Récapitulatif de la commande</h4>
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
                            <div class="md-layout-item md-size-25"><b>Date de la commande</b></div>
                            <div class="md-layout-item">{{review.order.date}}</div>
                        </div>
                        <hr/>
                        <div class="md-layout md-gutter">
                            <div class="md-layout-item md-size-25"><b>Marketplace</b></div>
                            <div class="md-layout-item">{{review.order.marketplace.name}}</div>
                        </div>
                        <hr/>
                        <div class="md-layout md-gutter mb-5">
                            <div class="md-layout-item md-size-25"><b>Produits</b></div>
                        </div>
                        <div v-for="product in review.order.products">
                            <div class="md-layout md-gutter mt-5 order-product">
                                <div class="md-layout-item md-size-25 text-center">
                                    <div class="order-product-image"><img :src="product.image"></div>
                                </div>
                                <div class="md-layout-item md-size-25">{{product.name}}</div>
                                <div class="md-layout-item md-size-25">{{product.quantity}}</div>
                                <div class="md-layout-item md-size-25">{{product.price}} €</div>
                            </div>
                        </div>
                    </md-card-content>
                </md-card>
            </div>
            <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-50">
                <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100">
                    <md-card>
                        <md-card-header data-background-color="primary">
                            <h4 class="title">Information du client</h4>
                        </md-card-header>
                        <md-card-content>
                            <div class="md-layout md-gutter">
                                <div class="md-layout-item md-size-25"><b>ID</b></div>
                                <div class="md-layout-item">{{review.order.customer.id}}</div>
                            </div>
                            <hr/>
                            <div class="md-layout md-gutter">
                                <div class="md-layout-item md-size-25"><b>Nom du client</b></div>
                                <div class="md-layout-item">{{review.order.customer.name}}</div>
                            </div>
                            <hr/>
                            <div class="md-layout md-gutter">
                                <div class="md-layout-item md-size-25"><b>Email du client</b></div>
                                <div class="md-layout-item">{{review.order.customer.email}}</div>
                            </div>
                        </md-card-content>
                    </md-card>
                </div>
                <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100">
                    <md-card>
                        <md-card-header data-background-color="primary">
                            <h4 class="title">Avis du client</h4>
                        </md-card-header>
                        <md-card-content>
                            <div class="md-layout md-gutter">
                                <div class="md-layout-item md-size-25"><b>ID</b></div>
                                <div class="md-layout-item">{{review.id}}</div>
                            </div>
                            <hr/>
                            <div class="md-layout md-gutter">
                                <div class="md-layout-item md-size-25"><b>Statut</b></div>
                                <div class="md-layout-item">{{review.review_state.name}}</div>
                            </div>
                            <hr/>
                            <div class="md-layout md-gutter">
                                <div class="md-layout-item md-size-25"><b>Note</b></div>
                                <div class="md-layout-item">{{review.rating}} / 5</div>
                            </div>
                            <hr/>
                            <div class="md-layout md-gutter">
                                <div class="md-layout-item md-size-25"><b>Commentaire</b></div>
                                <div class="md-layout-item">{{review.text}}</div>
                            </div>
                        </md-card-content>
                        <md-card-actions md-alignment="space-between">
                            <div>
                                <md-button>Refuser avis</md-button>
                            </div>

                            <md-card-expand-trigger>
                                <md-button class="md-success">Accepter Avis</md-button>
                            </md-card-expand-trigger>
                        </md-card-actions>
                    </md-card>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    created() {
      this.axios.get('/api/reviews/' + this.$route.params.id).then((response) => {
        this.review = response.data;
      });
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
          review_comments: []
        }
      }
    },
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
