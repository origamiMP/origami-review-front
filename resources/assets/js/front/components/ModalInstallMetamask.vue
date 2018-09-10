<template>
    <modal :showModal="showModal" :closeAction="closeAction" :modalHeight="'70vh'" :modalWidth="'70vh'">
        <h3 slot="header">Installer Metamask</h3>

        <div slot="body">
            <a href="http://metamask.io" target="_blank"><img style="height: auto; width: 100%" src="/images/metamask_logo.png"/></a>
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
