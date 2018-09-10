<template>
  <ul class="nav nav-mobile-menu">
    <li><a :href="'/sellers/' + this.$root.currentUser.organization.id" class="dropdown-toggle" data-toggle="dropdown">
      <i class="material-icons">home</i>
      <p>Access to my shop</p></a>
    </li>
  </ul>
</template>
<script>
export default {
  data () {
    return {
      search: null,
      selectedEmployee: null,
      employees: [
        'Jim Halpert',
        'Dwight Schrute',
        'Michael Scott',
        'Pam Beesly',
        'Angela Martin',
        'Kelly Kapoor',
        'Ryan Howard',
        'Kevin Malone'
      ]
    }
  }
}
</script>
