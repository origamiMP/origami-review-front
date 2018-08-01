<template>
    <div class="content">
        <div class="md-layout">
            <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100">
                <md-card>
                    <md-card-header data-background-color="primary">
                        <h4 class="title">Liste des avis</h4>
                    </md-card-header>
                    <md-card-content>
                        <review-table :reviews="reviews" table-header-color="primary"></review-table>
                    </md-card-content>
                </md-card>
            </div>
        </div>
    </div>
</template>

<script>
  import ReviewTable from '../components/Tables/ReviewTable'

  export default {
    created() {
      this.axios.get('/api/reviews').then((response) => {
        this.reviews = response.data;
      });
    },
    data() {
      return {
        reviews: []
      }
    },
    components: {
      ReviewTable,
    }
  }
</script>
