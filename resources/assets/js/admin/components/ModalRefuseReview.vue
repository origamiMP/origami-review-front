<template>
    <div>
        <md-dialog :md-active.sync="showModal">
            <md-dialog-title>What's your refusal reason ?</md-dialog-title>

            <div class="md-layout-item md-size-100">
                <md-field maxlength="10">
                    <md-textarea rows="10" v-model="refuse_comment"></md-textarea>
                </md-field>

            </div>
            <md-dialog-actions>
                <md-button class="md-primary" @click.native="validateAction">Send</md-button>
            </md-dialog-actions>
        </md-dialog>
    </div>
</template>

<script>
  export default {
    props: {
      showModal: {
        type: Boolean,
        default: false
      },
      validateAction: Function,
      value: String,
    },
    data() {
      return {
        refuse_comment: ''
      }
    },
  }
</script>

<style lang="scss" scoped>
    .md-dialog {
        width: 768px;
        background-color: white;
    }
</style>