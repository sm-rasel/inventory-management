<template>
  <div class="log-in">
    <div class="account-pages mt-md-4 pt-lg-5 pt-md-5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card overflow-hidden">
              <div class="bg-soft-primary log-backcolor">
                <div class="row">
                  <div class="col-7">
                    <div class="text-primary p-4">
                      <h5 class="text-primary">Welcome Back !</h5>
                      <p>Sign in to continue</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="p-2">
                  <form class="form-horizontal" @submit.prevent="login">
                    <div class="form-group row">
                      <label for="email" class="col-md-12 col-form-label text-md-right"></label>
                      <div class="col-md-12">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" type="email" v-model="auth.email" class="form-control" required autofocus>
                        <span class="invalid-feedback" role="alert"></span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="password" class="col-md-12 col-form-label text-md-right"></label>
                      <div class="col-md-12">
                        <label for="" class="form-label">Password</label>
                        <input id="password" type="password" v-model="auth.password" class="form-control" required>
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                      </div>
                    </div>
<!--                    <div class="form-group row mt-2">-->
<!--                      <div class="col-md-12">-->
<!--                        <div class="form-check">-->
<!--                          <input class="form-check-input" type="checkbox" name="remember" id="remember" >-->
<!--                          <label class="form-check-label" for="remember">-->
<!--                          </label>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                    </div>-->
                    <div class="form-group row mb-0 mt-5">
                      <div class="col-md-12">
                        <button type="submit" class="w-100 btn btn-primary btn-block waves-effect waves-light">
                          {{ processing ? 'Please Wait' : 'Login' }}
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import RestApi, { ServiceBaseUrl } from '../../../../config/api_config'
import { userLoginApi } from '../api/routes'
import Swal from 'sweetalert2';
import {toast} from "vue3-toastify";
import toaster from "@meforma/vue-toaster";
export default {
  name: 'login',
  data() {
    return {
      auth: {
        email: '',
        password: ''
      },
      processing: false
    }
  },
  created () {
  },
  methods: {
    async login() {
      this.processing = true
      console.log(this.auth)
      let response = null
      response = await RestApi.postData(ServiceBaseUrl, userLoginApi, this.auth).then(response => {
        if (response.success === true){
          this.$store.commit('user/setAuthenticated', true)
          this.$store.commit('user/setUser', response.data)
          this.$router.push('/inventory-list')
          toast.success('Admin is Login')
        } else {
          this.$store.commit('user/setAuthenticated', false)
        }
      }).finally(() => {
        this.processing = false
      })
    }
  }
}
</script>

<style scoped>

.log-backcolor{
  background-color:rgba(85,110,230,.25);
}

</style>