<template>
    <div>
        <md-table v-model="reviews" :table-header-color="tableHeaderColor">
            <md-table-row slot="md-table-row" slot-scope="{ item }">
                <md-table-cell md-label="ID">{{ item.id }}</md-table-cell>
                <md-table-cell md-label="Rating">
                    <star-rating-component :value="item.rating" :input-name="item.id + 'Rating'" :disabled="true"/>
                </md-table-cell>
                <md-table-cell md-label="State">
                    <md-icon v-if="item.review_state.name === 'ACCEPTED'">done</md-icon>
                    <md-icon v-if="item.review_state.name === 'CERTIFIED'">done</md-icon>
                    <md-icon v-if="item.review_state.name === 'CREATED'">hourglass_empty</md-icon>
                    <md-icon v-if="item.review_state.name === 'REFUSED'">clear</md-icon>
                </md-table-cell>
                <md-table-cell md-label="Created_at">{{ item.created_at }}</md-table-cell>
                <md-table-cell>
                    <md-button :to="'/admin/reviews/' + item.id" class="md-primary md-just-icon">
                        <md-icon v-if="item.review_state.name === 'ACCEPTED' || item.review_state.name === 'CERTIFIED'">visibility</md-icon>
                        <md-icon v-else>edit</md-icon>
                    </md-button>
                </md-table-cell>
            </md-table-row>
        </md-table>
    </div>
</template>

<script>
  import StarRatingComponent from '../StarRatingComponent'

  export default {
    name: 'review-table',
    props: {
      tableHeaderColor: {
        type: String,
        default: ''
      },
      reviews: {
        type: Array
      }
    },
    data() {
      return {
        selected: [],
      }
    },
    components: {StarRatingComponent}
  }
</script>
