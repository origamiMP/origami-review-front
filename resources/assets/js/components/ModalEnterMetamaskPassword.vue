<template>
    <modal :showModal="showModal" :closeAction="closeAction">
        <h1 slot="header">Enter Metamask Password/h1>
        <span slot="body">You have to enter metamask password</span>
        <div slot="footer">
            <button @click="validateAction" class="btn btn-primary">I have enter metamask password</button>
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
