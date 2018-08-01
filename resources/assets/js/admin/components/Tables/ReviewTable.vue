<template>
    <div>
        <md-table v-model="reviews" :table-header-color="tableHeaderColor">
            <md-table-row slot="md-table-row" slot-scope="{ item }">
                <md-table-cell md-label="ID">{{ item.id }}</md-table-cell>
                <md-table-cell md-label="Rating">{{ item.rating }}</md-table-cell>
                <md-table-cell md-label="State">{{ item.review_state.name }}</md-table-cell>
                <md-table-cell md-label="Created_at">{{ item.created_at.date }}</md-table-cell>
                <md-table-cell><md-button :to="'/admin/reviews/' + item.id" class="md-primary md-just-icon"><md-icon >edit</md-icon></md-button></md-table-cell>
            </md-table-row>
        </md-table>
    </div>
</template>

<script>
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
    }
  }
</script>
