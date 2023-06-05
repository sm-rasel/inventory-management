<template>
 <div class="product-edit">
   <div class="row mb-4">
     <div class="col-12">
       <div class="page-title-box d-sm-flex align-items-center justify-content-between">
         <div class="page-title-right">
           <ol class="breadcrumb m-0">
             <li class="breadcrumb-item">
               <router-link :to="{ name: 'inventory_list' }" class="text-decoration-none">Home</router-link>
             </li>
             <li class="breadcrumb-item active">Product</li>
           </ol>
         </div>
       </div>
     </div>
   </div>
   <div class="col-xl-12">
     <div class="card">
       <div class="card-body">
         <h4 class="card-title mb-4">Edit Product Form</h4>
         <form @submit.prevent="submitProduct">
           <div class="row mb-4">
             <label class="col-sm-3 col-form-label">
               Product Name
               <span class="text-danger me-1">*</span>
             </label>
             <div class="col-sm-9">
               <input type="text" class="form-control" v-model="productData.p_name" placeholder="Enter Product Name"/>
             </div>
           </div>
           <div class="row justify-content-end">
             <div class="col-sm-9">
               <button type="submit" class="btn btn-outline-success w-md px-5 me-1">Create New Product</button>
               <router-link :to="{ name: 'product_list' }" class="btn btn-outline-danger w-md px-3 ms-2">Cancel</router-link>
             </div>
           </div>
         </form>
       </div>
       <!-- end card body -->
     </div>
     <!-- end card -->
   </div>
 </div>
</template>

<script>
import RestApi, { ServiceBaseUrl } from '../../../../config/api_config'
import { productStoreApi, productUpdateApi } from '../api/routes'
import {mapState} from "vuex";
  export default {
    data() {
      return {
        productData : {
          p_name : ''
        }
      }
    },
    created() {
      const productId = this.$route.params.productId;
      console.log(productId)
      if (productId){
        this.getProductData(productId);
      }
    },
    methods: {
      getProductData(productId){
        const productList = this.$store.state.applicants.productList
        const data = {...productList.find(item => item.id === parseInt(productId))}
        this.productData = data
        return this.productData
      },
      async submitProduct(){
        var productData = this.productData
        console.log(productData)
        // object.key(this.productData)
        let response = null
        if (this.productData.id){
          response = await RestApi.postData(ServiceBaseUrl, `${productUpdateApi}/${this.productData.id}`, productData)
        }else {
          response = await RestApi.postData(ServiceBaseUrl, productStoreApi, productData)
        }
        if (response.success == true)
        {
          this.$router.push('/product-list');
        }
      }
    }
  }
</script>

<style scoped>

</style>