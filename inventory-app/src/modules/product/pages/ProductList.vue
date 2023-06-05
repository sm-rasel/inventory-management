<template>
  <div class="vertical-menu">
    <div data-simplebar class="h-100">
      <div id="sidebar-menu">
        <ul class="metismenu list-unstyled" id="side-menu">
          <li>
            <ul class="sub-menu" aria-expanded="true">
              <div class="float-start">
                <router-link class="btn btn-sm btn-outline-success" :to="{ name: 'product_list'}" >Add Product</router-link>
              </div>
              <div class="float-start ms-3">
                <router-link class="btn btn-sm btn-outline-info" :to="{ name: 'category_list'}" >Add Category</router-link>
              </div>
<!--              <div class="float-start ms-3">-->
<!--                <router-link class="btn btn-sm btn-outline-primary" :to="{ name: 'inventory_list'}">See Inventory</router-link>-->
<!--              </div>-->
            </ul>
          </li>
        </ul>
      </div>
      <!-- Sidebar -->
    </div>
  </div>
  <div class="container text-center  mt-5 mb-5">
    <div class="float-end">
      <router-link class="btn btn-sm btn-outline-success w-md" :to="{ name: 'product_add'}">Add New</router-link>
    </div>
    <h3 class="mt-5 fw-bolder text-success "> List of Product Data </h3>
    <div class="table-responsive my-5 table-bordered">
      <table class="table table-bordered table-striped dt-responsive nowrap w-100">
        <thead>
        <tr>
          <th class="text-center">Sl</th>
          <th class="text-center">Product Name</th>
          <th class="text-center">Category Name</th>
          <th class="text-center">Status</th>
          <th class="text-center">Action</th>
        </tr>
        </thead>
        <tbody>
          <tr v-for="(product,key) in products" :key="key">
            <td>{{ key + 1 }}</td>
            <td>{{ product.product_name }}</td>
            <td>{{ getCategoryName(product.category_id) }}</td>
            <td>{{ product.status === 1 ? 'Active' :  'Inactive' }}</td>
            <td>
              <button class="btn btn-sm btn-outline-success me-2" @click="editProduct(product.id)">
                Edit
                <i class="fa fa-edit"></i>
              </button>
              <button class="btn btn-sm btn-outline-warning me-2" @click="statusUpdate(product.id)">
                Update
                <i class="fa fa-edit"></i>
              </button>
              <button class="btn btn-sm btn-outline-danger" @click="deleteProduct(product.id)">
                Delete
                <i class="fa fa-edit"></i>
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import RestApi, { ServiceBaseUrl } from '../../../../config/api_config'
import { productListApi} from '../api/routes'
import { mapState } from 'vuex'
import {categoryListApi} from "@/modules/category/api/routes";
export default {
  components: { },
  computed: mapState({
    products: state => state.product.productList
  }),
  data() {
    return {
      categories: [],
    }
  },
  created () {
    this.loadCategory()
    this.loadData()
  },
  methods: {
    loadCategory() {
      RestApi.getData(ServiceBaseUrl, categoryListApi).then(response => {
        if (response.success)
        {
          this.categories = response.data
        }
      })
    },
    loadData () {
      const params = {}
      RestApi.getData(ServiceBaseUrl, productListApi, params).then(response => {
        if (response.success) {
          this.$store.commit('product/setProductList', response.data)
        }
      })
    },
    editProduct(productId){
      this.$router.push({ name: 'product_edit', params: {productId: productId}})
    },

    dataEdit(itemId)  {
      console.log('Edit Item  => ', itemId);
    },
    getCategoryName(categoryId) {
      const category = this.categories.find(item => item.id === parseInt(categoryId))
      return category.category_name
    }
  }
}
</script>