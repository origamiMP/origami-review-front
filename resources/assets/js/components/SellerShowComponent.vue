<template>
    <div class="row">
        <div class="container-fluid">
            <div class="card hovercard">
                <div class="card-background">
                    <img class="card-bkimg" alt="" :src="seller.image_cover">
                </div>
                <!--<div class="card-info"><span class="card-title">{{seller.name}}</span>-->

            </div>
            <div class="useravatar">
                <img alt="" :src="seller.image_profile">
            </div>

        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="star">
                        <i class="fa fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    data() {
      return {
        seller: {},
      }
    },
    beforeCreate() {
      this.axios.get('/api/sellers/' + this.$route.params.id).then((response) => {
        console.log(response.data);
        this.seller = response.data;
      });
    },
    methods: {}
  }
</script>
