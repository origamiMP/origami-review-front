<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                <div class="card card-login">
                    <div class="card-header card-header-primary text-center">
                        <h4 class="card-title">Connectez-vous !</h4>
                    </div>
                    <div class="card-body mt-2 mb-3">
                        <CustomInput
                                v-bind:errors="this.errors"
                                inputGroupMaterialIcon="mail"
                                inputName="email"
                                v-model="user.email"
                                inputValidationRules="required|email"
                                input-placeholder="Votre adresse email..."
                        />
                        <CustomInput
                                inputGroupMaterialIcon="lock_outline"
                                inputName="password"
                                v-model="user.password"
                                inputValidationRules="required"
                                inputType="password"
                                input-placeholder="Votre mot de passe..."
                        />
                    </div>
                    <div class="mb-4 text-center">
                        <button v-on:click="logIn" class="btn btn-primary btn-wd btn-lg">Je me connecte</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  import CustomInput from '../components/form/Input'

  export default {
    components: {CustomInput},
    data() {
      return {
        user: {}
      }
    },
    methods: {
      logIn() {
        let context = this;
        this.$validator.validateAll().then(() => {
          if (!context.isChildrenValid())
            return false;
          context.axios.post('/api/users/login', context.user).then(() => {
            context.$router.push('/admin');
            window.location.reload();
          }).catch((error) => {
            error.response.data.errors.forEach((err) => {
              context.errors.add({field: err.title, msg: err.detail});
            });
          })
        });
      },
      isChildrenValid() {
        let valid = true;
        this.$children.forEach((children) => {
          if (children.errors.items.length)
            valid = false;
        });
        return valid;
      }
    }
  }
</script>
