<template>
    <modal :showModal="showModal" :closeAction="closeAction" :modalHeight="'70vh'" :modalWidth="'70vh'">
        <h1 slot="header">Installer Metamask</h1>

        <div class="embed-responsive embed-responsive-16by9 z-depth-1-half" slot="body">
            <iframe class="embed-responsive-item" src="https://metamask.io" allowfullscreen></iframe>
        </div>
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
