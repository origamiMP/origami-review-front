<template>
    <modal :showModal="showModal" :closeAction="closeAction">
        <h1 slot="header">Mettre mot de passe Metamask</h1>
        <span slot="body">Vous devez rentrer votre mot de passe Metamask</span>
        <div slot="footer">
            <button @click="validateAction" class="btn btn-primary">J'ai rentré mon mot de passe Metamask</button>
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
