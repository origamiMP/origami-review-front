<template>
    <modal :showModal="showModal" :closeAction="closeAction">
        <h1 slot="header">Installer Metamask</h1>
        <span slot="body">Vous devez installer Metamask</span>
        <div slot="footer">
            <button @click="validateAction" class="btn btn-primary">J'ai installé Metamask</button>
        </div>
    </modal>
</template>

<script>
  import Modal from './Modal'

  export default {
    components: {Modal},
    props: {
      validateAction: Function,
      closeAction: Function,
      showModal: Boolean
    }
  }
</script>
