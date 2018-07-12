<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 ml-auto mr-auto" style="margin-top: -5vh">
                <div class="card card-login">
                    <div class="card-header card-header-primary text-center">
                        <h4 class="card-title">Inscrivez-vous !</h4>
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
                        <div class="form-group">
                            <div class="form-check form-check-radio form-check-inline">
                                <label class="form-check-label">
                                    <input v-model="user.organization_type" class="form-check-input"
                                           type="radio"
                                           name="organization_type"
                                           value="seller"> Vendeur
                                    <span class="circle">
                                                    <span class="check"></span>
                                                </span>
                                </label>
                            </div>
                            <div class="form-check form-check-radio form-check-inline">
                                <label class="form-check-label">
                                    <input v-model="user.organization_type" class="form-check-input"
                                           type="radio"
                                           name="organization_type"
                                           value="marketplace"> Marketplace
                                    <span class="circle">
                                                    <span class="check"></span>
                                                </span>
                                </label>
                            </div>
                        </div>
                        <CustomInput
                                inputGroupMaterialIcon="home"
                                inputName="organization_name"
                                v-model="user.organization_name"
                                inputValidationRules="required"
                                inputType="text"
                                :input-placeholder="'Le nom de votre ' + (user.organization_type === 'seller' ? 'magasin' : 'marketplace')"
                        />
                        <div class="form-check mt-4">
                            <label class="form-check-label">
                                <input name="cgv"
                                       v-model="user.cgv" class="form-check-input" type="checkbox">
                                <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                J'accepte les
                                <a href="#something">conditions générales d'utilisation</a>.
                            </label>
                        </div>
                    </div>
                    <div class="text-center mt-3 mb-4">
                        <button v-on:click="submitRegistration" class="btn btn-primary btn-wd btn-lg">Je m'inscris
                        </button>
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
        user: {
          organization_type: 'seller',
          cgv: true
        }
      }
    },
    methods: {
      submitRegistration() {
        let context = this;
        this.$validator.validateAll().then(() => {
          if (!context.isChildrenValid())
            return false;
          context.axios.post('/api/users', context.user).then(() => {
            context.$router.push({name: 'LoginPage'});
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
