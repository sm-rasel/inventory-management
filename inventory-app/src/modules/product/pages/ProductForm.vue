<template>
  <div class="category-add">
    <div class="row mb-4">
      <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
          <div class="page-title-right">
            <ol class="breadcrumb m-0">
              <li class="breadcrumb-item">
                <!--                <router-link :to="{ name: 'inventory_list' }" class="text-decoration-none">Home</router-link>-->
              </li>
              <li class="breadcrumb-item active">Product {{ title }}</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title mb-4">{{ title }} Product Form</h4>
        <form @submit.prevent="submitProduct">
          <div class="row mb-4">
            <label class="col-sm-3 col-form-label">
              Category Name
              <span class="text-danger me-1">*</span>
            </label>
            <div class="col-sm-9">
              <select v-model="productData.category_id" class="form-control">
                <option v-for="(category, key) in categories" :key="key" :value="category.id">{{ category.category_name }}</option>
              </select>
            </div>
          </div>
          <div class="row mb-4">
            <label class="col-sm-3 col-form-label">
              Product Name
              <span class="text-danger me-1">*</span>
            </label>
            <div class="col-sm-9">
              <input type="text" class="form-control" v-model="productData.product_name" placeholder="Enter Product Name"/>
            </div>
          </div>
          <div class="row mb-4">
            <label class="col-sm-3 col-form-label">
              Initial Quantity
              <span class="text-danger me-1">*</span>
            </label>
            <div class="col-sm-9">
              <input type="number" class="form-control" v-model="productData.stock_qty" placeholder="Enter Quantity"/>
            </div>
          </div>
          <div class="row justify-content-end">
            <div class="col-sm-9">
              <button type="submit" class="btn btn-outline-success w-md px-5 me-1" @click="newCategory" >Create New Category</button>
              <router-link :to="{ name: 'category_list' }" class="btn btn-outline-danger w-md px-3 ms-2">Cancel</router-link>
            </div>
          </div>
        </form>
      </div>
      <!-- end card body -->
    </div>
    <!-- end card -->
  </div>
</template>

<script>
import RestApi, {ServiceBaseUrl} from "../../../../config/api_config";
import {categoryListApi} from "@/modules/category/api/routes";
import {productStoreApi, productUpdateApi} from "@/modules/product/api/routes";

export default {
  data() {
    return {
      title: 'Add',
      categories: [],
      productData: {
        product_name: '',
        category_id: 0,
        stock_qty: 0
      }
    }
  },
  created () {
    const productId = this.$route.params.productId;
    if (productId) {
      this.title = 'Edit'
      this.getProduct(productId)
    }
    this.loadCategory()
  },
  methods: {
    getProduct(productId) {
      const productList = this.$store.state.product.productList
      this.productData = {...productList.find(item => item.id === parseInt(productId))}
    },
    loadCategory() {
      RestApi.getData(ServiceBaseUrl, categoryListApi).then(response => {
        if (response.success)
        {
         this.categories = response.data
        }
      })
    },
    async submitProduct() {
      let response = null
      if (this.productData.id) {
       response = await RestApi.postData(ServiceBaseUrl, `${productUpdateApi}/${this.productData.id}`, this.productData)
      } else {
        response = await RestApi.postData(ServiceBaseUrl, productStoreApi,this.productData)
      }
      console.log(response)
      if (response.success)
      {

        this.$router.push('/product-list')
      }
    }
  }
}
</script>

<style scoped>

</style>