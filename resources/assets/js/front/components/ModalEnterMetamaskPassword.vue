<template>
    <modal :showModal="showModal" :closeAction="closeAction">
        <h3 slot="header">Enter Metamask Password</h3>
        <div slot="body">
            <img style="height: auto; width: 100%" src="/images/metamask_password.gif"/>
        </div>
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
