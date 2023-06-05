<template>
 <div class="product-edit">
   <div class="row mb-4">
     <div class="col-12">
       <div class="page-title-box d-sm-flex align-items-center justify-content-between">
         <div class="page-title-right">
           <ol class="breadcrumb m-0">
             <li class="breadcrumb-item active">Product</li>
           </ol>
         </div>
       </div>
     </div>
   </div>
   <div class="col-xl-12">
     <div class="card">
       <div class="card-body">
         <h4 class="card-title mb-4">{{ title }} Category Form</h4>
         <form @submit.prevent="submitCategory">
           <div class="row mb-4">
             <label class="col-sm-3 col-form-label">
               Category Name
               <span class="text-danger me-1">*</span>
             </label>
             <div class="col-sm-9">
               <input type="text" class="form-control" v-model="categoryData.category_name" placeholder="Enter Category Name"/>
             </div>
           </div>
           <div class="row justify-content-end">
             <div class="col-sm-9">
               <button type="submit" class="btn btn-outline-success w-md px-5 me-1">{{form_title}} Product</button>
               <router-link :to="{ name: 'category_list' }" class="btn btn-outline-danger w-md px-3 ms-2">Cancel</router-link>
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
import RestApi, {ServiceBaseUrl} from '../../../../config/api_config'
import {categoryStoreApi, categoryUpdateApi} from '../api/routes'

export default {
    data() {
      return {
        title: 'Add',
        form_title: 'Create New',
        categoryData : {
          category_name : ''
        }
      }
    },
    created() {
      const categoryId = this.$route.params.categoryId;
      if (categoryId){
        this.title = 'Edit'
        this.form_title = 'Update'
        this.getCategoryData(categoryId);
      }
    },
    methods: {
      getCategoryData(categoryId){
        const categoryList = this.$store.state.category.categoryList
        this.categoryData = {...categoryList.find(item => item.id === parseInt(categoryId))}
      },
      async submitCategory(){
        let response = null
        if (this.categoryData.id){
          response = await RestApi.postData(ServiceBaseUrl, `${categoryUpdateApi}/${this.categoryData.id}`, this.categoryData)
        }else {
          response = await RestApi.postData(ServiceBaseUrl, categoryStoreApi, this.categoryData)
        }
        if (response.success)
        {
          this.$router.push('/category-list');
        }
      }
    }
  }
</script>

<style scoped>

</style>