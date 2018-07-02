<template>
    <modal :showModal="showModal" :closeAction="closeAction">
        <h1 slot="header">Sign Metamask Transaction</h1>
        <span slot="body">You have to sign metamask transaction</span>
    </modal>
</template>

<script>
  import Modal from './Modal'

  export default {
    components: {Modal},
    props: {
      closeAction: Function,
      showModal: Boolean
    }
  }
</script>
