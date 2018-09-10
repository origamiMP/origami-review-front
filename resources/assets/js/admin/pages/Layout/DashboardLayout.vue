<template>
    <div class="wrapper">
        <!--<notifications></notifications>-->

        <side-bar :backgroundImage="'/images/city.jpg'" :title="currentUser.name">
            <mobile-menu slot="content"></mobile-menu>
            <sidebar-link to="/admin/dashboard">
                <md-icon>dashboard</md-icon>
                <p>Dashboard</p>
            </sidebar-link>
            <sidebar-link to="/admin/reviews">
                <md-icon>star</md-icon>
                <p>Reviews</p>
            </sidebar-link>
            <sidebar-link to="/admin/user">
                <md-icon>person</md-icon>
                <p>Profile</p>
            </sidebar-link>
            <sidebar-link to="#" @click.native="logout">
                <md-icon>close</md-icon>
                <p>Logout</p>
            </sidebar-link>
        </side-bar>

        <div class="main-panel">
            <top-navbar></top-navbar>

            <dashboard-content>

            </dashboard-content>

            <content-footer v-if="!$route.meta.hideFooter"></content-footer>
        </div>
    </div>
</template>
<style lang="scss">

</style>
<script>
  import TopNavbar from './TopNavbar.vue'
  import ContentFooter from './ContentFooter.vue'
  import DashboardContent from './Content.vue'
  import MobileMenu from '../../pages/Layout/MobileMenu.vue'

  export default {
    components: {
      TopNavbar,
      DashboardContent,
      ContentFooter,
      MobileMenu
    },
    data() {
      return {
        currentUser: {}
      }
    },
    beforeCreate() {
      this.axios.get('/api/me').then((response) => {
        this.$root.currentUser = response.data;
        if (!this.$root.currentUser.email) {
          this.$router.push('/auth/login');
          window.location.reload()
        }
      })
    },
    methods: {
      logout() {
        this.axios.post('/api/users/logout').then((response) => {
          this.$router.push('/auth/login');
          window.location.reload();
        })
      }
    }
  }
</script>
