<template>
  <div class="content">
    <div class="md-layout">
      <div class="md-layout-item md-medium-size-100 md-size-100">
        <user-card :cardUserImage="this.$root.currentUser.organization.image_profile">

        </user-card>
      </div>

      <div v-if="this.$root.currentUser.organization.type === 'marketplace'" class="md-layout-item md-medium-size-100 md-size-100">
        <md-card class="md-card-profile">
          <md-card-content>
          </md-card-content>
        </md-card>
      </div>
    </div>
  </div>
</template>

<script>
import {
  EditProfileForm,
  UserCard
} from '../pages'

export default{
  data() {
    return {
      currentUser: {}
    }
  },
  created() {
    this.sidebarStore = {}
  },
  components: {
    EditProfileForm,
    UserCard
  }
}
</script>
