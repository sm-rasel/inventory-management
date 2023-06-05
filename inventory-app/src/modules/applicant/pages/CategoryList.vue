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
              <div class="float-start ms-3">
                <router-link class="btn btn-sm btn-outline-primary" :to="{ name: 'inventory_list'}">See Inventory</router-link>
              </div>
            </ul>
          </li>
        </ul>
      </div>
      <!-- Sidebar -->
    </div>
  </div>
  <div class="container text-center  mt-5 mb-5">
    <div class="float-end">
      <router-link class="btn btn-sm btn-outline-success w-md" :to="{ name: 'category_add'}">Add New</router-link>
    </div>
    <h3 class="mt-5 fw-bolder text-success "> List of Category Data </h3>
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
          <tr v-for="(category,key) in categories" :key="key">
            <td>{{ category.id }}</td>
            <td>{{ category.product_id }}</td>
            <td>{{ category.c_name }}</td>
            <td>{{ category.c_status }}</td>
            <td>
              <button class="btn btn-sm btn-outline-success me-2" @click="editProduct(editId = product.id)">
                Edit
                <i class="fa fa-edit"></i>
              </button>
              <button class="btn btn-sm btn-outline-warning me-2" @click="statusUpdate(statusId = product.id)">
                Update
                <i class="fa fa-edit"></i>
              </button>
              <button class="btn btn-sm btn-outline-danger" @click="deleteProduct(deleteId = product.id)">
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
import { categoryListApi} from '../api/routes'
import { mapState } from 'vuex'
export default {
  components: { },
  computed: mapState({
    categories: state => state.applicants.categoryList
  }),
  data() {
    return {
      // columns: [
      //   {
      //     title:  'SL',
      //     field:  'id'
      //   },
      //   {
      //     title: 'Product Name',
      //     field: 'product_id'
      //   },
      //   {
      //     title:  'Category Name',
      //     field:  'c_name'
      //   },
      //   {
      //     title:  'Stock',
      //     field:  'c_qty'
      //   },
      //   {
      //     title: 'Status',
      //     field: 'i_status'
      //   },
      // ],
      // actions: {
      //   edit: true,
      //   delete: true
      // }
    }
  },
  created () {
    this.loadData()
  },
  methods: {
    loadData () {
      const params = {}
      RestApi.getData(ServiceBaseUrl, categoryListApi, params).then(response => {
        if (response.success) {
          const arrayData = response.data.map(item => {
            const i_status = item.i_status === 1 ? 'Active' : 'Inactive';
            item.i_status = i_status;
            return item;
          })
          this.$store.commit('applicants/setCategoryList', arrayData)
        }
      })
    },
    dataEdit(itemId)  {
      console.log('Edit Item  => ', itemId);
    }
  }
}
</script>