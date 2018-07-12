<template>
    <div v-bind:class="{
    'form-group':formGroup,
    'has-danger': errors.has(inputName),
    'has-success': value && !errors.has(inputName)
    }">
        <div v-bind:class="{
        'input-group': inputGroupMaterialIcon
        }">
            <div v-if="inputGroupMaterialIcon" class="input-group-prepend">
              <span class="input-group-text">
                <i class="material-icons">{{inputGroupMaterialIcon}}</i>
              </span>
            </div>
            <input :type="inputType"
                   :name="inputName"
                   class="form-control"
                   v-validate="inputValidationRules"
                   v-bind:value="value"
                   v-on:input="$emit('input', $event.target.value)"
                   :placeholder="inputPlaceholder">
            <span class="material-icons form-control-feedback" style="margin-top: -30px"
                  v-show="errors.has(inputName)">clear</span>
            <span class="material-icons form-control-feedback" style="margin-top: -30px"
                  v-show="value && !errors.has(inputName)">done</span>
        </div>
    </div>
</template>

<script>
  export default {
    props: {
      formGroup: {
        type: Boolean,
        default: true
      },
      inputGroup: {
        type: Boolean,
        default: false
      },
      inputGroupMaterialIcon: String,
      inputName: {
        type: String,
        default: 'input'
      },
      inputType: {
        type: String,
        default: "text"
      },
      value: String,
      inputModelBinding: String,
      inputPlaceholder: String,
      inputValidationRules: String
    },
    created() {
      this.$validator = this.$parent.$validator;
    },
  }
</script>

<style scoped>
</style>