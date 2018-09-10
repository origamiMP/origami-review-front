<template>
    <div v-bind:class="{
    'starrating': true,
    'd-flex': true,
    'float-left': true,
    'flex-row-reverse': true,
    'editable': this.editable,
    }">
        <input v-model="computedValue" v-on:click="$emit('input', 5)" type="radio"
               :id="inputName + 'star1'" value="5"
               :name="inputName" :disabled="disabled"/>
        <label :for="inputName + 'star1'"><i v-bind:style="fontSizeStyle" class="material-icons">star</i></label>
        <input v-model="computedValue" v-on:click="$emit('input', 4)" type="radio"
               :id="inputName + 'star2'" value="4"
               :name="inputName" :disabled="disabled"/>
        <label :for="inputName + 'star2'"><i v-bind:style="fontSizeStyle" class="material-icons">star</i></label>
        <input v-model="computedValue" v-on:click="$emit('input', 3)" type="radio"
               :id="inputName + 'star3'" value="3"
               :name="inputName" :disabled="disabled"/>
        <label :for="inputName + 'star3'"><i v-bind:style="fontSizeStyle" class="material-icons">star</i></label>
        <input v-model="computedValue" v-on:click="$emit('input', 2)" type="radio"
               :id="inputName + 'star4'" value="2"
               :name="inputName" :disabled="disabled"/>
        <label :for="inputName + 'star4'"><i v-bind:style="fontSizeStyle" class="material-icons">star</i></label>
        <input v-model="computedValue" v-on:click="$emit('input', 1)" type="radio"
               :id="inputName + 'star5'" value="1"
               :name="inputName" :disabled="disabled"/>
        <label :for="inputName + 'star5'"><i v-bind:style="fontSizeStyle" class="material-icons">star</i></label>
    </div>
</template>

<script>
  export default {
    props: {
      disabled: {
        type: Boolean,
        default: false
      },
      editable: {
        type: Boolean,
        default: false
      },
      inputName: String,
      value: {
        type: Number,
        default: 0
      },
      fontSize: {
        type: String,
        default: '30px'
      },
    },
    computed: {
      computedValue: {
        get() {
          return this.value
        },
        set(newValue) {
        },
      }
    },
    data() {
      return {
        fontSizeStyle: {
          fontSize: this.fontSize
        }
      }
    }
  }
</script>

<style scoped>
</style>