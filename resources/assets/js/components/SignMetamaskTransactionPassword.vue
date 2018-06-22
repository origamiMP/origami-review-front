<template>
    <modal :showModal="showModal" :closeAction="closeAction">
        <h1 slot="header">Signez la transaction Metamask</h1>
        <span slot="body">Vous devez signer la transaction Metamask</span>
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
