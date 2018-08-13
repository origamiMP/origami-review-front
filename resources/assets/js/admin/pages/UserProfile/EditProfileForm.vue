<template>
    <!--<md-card>-->
      <!--<md-card-header :data-background-color="dataBackgroundColor">-->
        <!--<h4 class="title">Edit Profile</h4>-->
        <!--&lt;!&ndash;<p class="category">Complete your profile</p>&ndash;&gt;-->
      <!--</md-card-header>-->

      <!--<md-card-content>-->
        <div class="md-layout pt-5">
          <div class="md-layout-item md-small-size-100 md-size-33">
            <md-field>
              <label>Company Name</label>
              <md-input v-on:change="updateProfile" v-model="organization.name"></md-input>
            </md-field>
          </div>
          <div class="md-layout-item md-small-size-100 md-size-33">
            <md-field>
              <label>Email Address</label>
              <md-input v-on:change="updateProfile" v-model="organization.email" type="email"></md-input>
            </md-field>
          </div>
          <div class="md-layout-item md-small-size-100 md-size-33">
            <md-field>
              <label>Website Link</label>
              <md-input v-on:change="updateProfile" v-model="organization.website_link" type="text"></md-input>
            </md-field>
          </div>
          <div class="md-layout-item md-small-size-100 md-size-66">
            <md-field>
              <label>Adress</label>
              <md-input v-on:change="updateProfile" v-model="organization.address" type="text"></md-input>
            </md-field>
          </div>
          <div class="md-layout-item md-small-size-100 md-size-33">
            <md-field>
              <label>Phone</label>
              <md-input v-on:change="updateProfile" v-model="organization.phone" type="text"></md-input>
            </md-field>
          </div>
          <div class="md-layout-item md-size-100">
            <md-field maxlength="5">
              <label>Description</label>
              <md-textarea v-on:change="updateProfile" v-model="organization.description"></md-textarea>
            </md-field>
          </div>
          <!--<div class="md-layout-item md-size-100 text-right">-->
            <!--<md-button v-on:click="updateProfile" class="md-raised md-success">Update Profile</md-button>-->
          <!--</div>-->
        </div>

      <!--</md-card-content>-->
    <!--</md-card>-->
</template>
<script>
export default {
  name: 'edit-profile-form',
  props: {
    dataBackgroundColor: {
      type: String,
      default: ''
    }
  },
  data () {
    return {
      organization: {},
    }
  },
  created() {
    this.axios.get('/api/me').then((response) => {
      this.organization = response.data.organization;
    })
  },
  methods: {
    updateProfile() {
      let context = this;
      this.axios.put('/api/'+ this.organization.type + 's/' + this.organization.id, this.organization).then((response) => {
        context.$root.currentUser.organization = this.organization;
      })
    }
  }
}

</script>
<style>

</style>
