<template>
  <md-card class="md-card-profile" :style="{ 'background-image': this.$root.currentUser.organization.image_cover}">
    <div class="md-card-avatar">
       <img class="img" :src="cardUserImage">
    </div>

    <md-card-content>
      <edit-profile-form data-background-color="primary">

      </edit-profile-form>
    </md-card-content>
  </md-card>
</template>
<script>
  import EditProfileForm from './EditProfileForm';

  export default {

    components: {EditProfileForm},
  name: 'user-card',
  props: {
    cardUserImage: {
      type: String,
    }
  },
  data () {
    return {
    }
  }
}

</script>
<style>

</style>
