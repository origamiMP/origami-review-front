<template>
    <div>
        <div :class="{modal: true, fade: true, show: showModal}" :style="{
        display: showModal ? 'block' : 'none' }"
             tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document" :style="{height: modalHeight, width: modalWidth}">
                <div class="modal-content">
                    <div v-if="this.$slots.header || closeAction" class="modal-header">
                        <slot name="header"></slot>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                @click="closeAction">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div v-if="this.$slots.body" class="modal-body">
                        <slot name="body"></slot>
                    </div>
                    <div v-if="this.$slots.footer" class="modal-footer">
                        <slot name="footer"></slot>
                    </div>
                </div>
            </div>
        </div>
        <div :class="{'modal-backdrop': showModal, show: showModal}"></div>
    </div>
</template>

<script>
  export default {
    props: {
      showModal: Boolean,
      closeAction: Function,
      modalHeight: String,
      modalWidth: String
    }
  }
</script>

<style scoped>
</style>