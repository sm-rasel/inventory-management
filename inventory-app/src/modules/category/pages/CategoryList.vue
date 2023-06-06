<template>
  <div class="vertical-menu">
    <div data-simplebar class="h-100">
      <div id="sidebar-menu">
        <ul class="metismenu list-unstyled" id="side-menu">
          <li>
            <ul class="sub-menu" aria-expanded="true">
              <div class="float-start ">
                <router-link class="btn btn-sm btn-outline-info" :to="{ name: 'category_list'}" >Add Category</router-link>
              </div>
              <div class="float-start ms-3">
                <router-link class="btn btn-sm btn-outline-success" :to="{ name: 'product_list'}" >Add Product</router-link>
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
              <th class="text-center">Category Name</th>
              <th class="text-center">Status</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(category,key) in categories" :key="key">
              <td>{{ key + 1 }}</td>
              <td>{{ category.category_name }}</td>
              <td>{{ category.status === 1 ? 'Active' : 'Inactive' }}</td>
              <td>
                <button class="btn btn-sm btn-outline-success me-2" @click="editCategory(editId = category.id)">
                  Edit
                  <i class="fa fa-edit"></i>
                </button>
                <button class="btn btn-sm btn-outline-warning me-2" @click="statusUpdate(statusId = category.id)">
                  Update
                  <i class="fa fa-edit"></i>
                </button>
                <button class="btn btn-sm btn-outline-danger" @click="deleteCategory(deleteId = category.id)">
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
import { categoryListApi, categoryStatusUpdateApi, categoryDeleteApi } from '../api/routes'
import { mapState } from 'vuex'
import Store from '@/store'
import Swal from 'sweetalert2';
import {toast} from "vue3-toastify";
import toaster from "@meforma/vue-toaster";
export default {
  components: { },
  computed: mapState({
    categories: state => state.category.categoryList
  }),
  data() {
    return {
      //
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
          this.$store.commit('category/setCategoryList', response.data)
        }
      })
    },
    editCategory(editId)  {
      this.$router.push({ name: 'category_edit', params: {categoryId: editId} })
    },
    statusUpdate(categoryId) {
      Swal.fire({
        title: 'Are you sure?',
        text: "This Item will Be Inactive!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#F8E04C',
        cancelButtonColor: '#ea4c32',
        confirmButtonText: 'Yes, Change it!'
      }).then((result) => {
        if (result.isConfirmed){
          RestApi.postData(ServiceBaseUrl, `${categoryStatusUpdateApi}/${categoryId}`).then(response => {
            if (response.success === true) {
              this.$store.commit('category/updateCategoryList', response.data)
              toast.success('Status updated', )
            }else {
              toast.error('Could Updated')
            }
          });
        }
      })
    },
    deleteCategory(deleteId){
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#F8E04C',
        cancelButtonColor: '#ea4c32',
        confirmButtonText: 'Yes, Delete it!'
      }).then((result) => {
        if (result.isConfirmed){
          const params = {}
          RestApi.deleteData(ServiceBaseUrl, `${categoryDeleteApi}/${deleteId}`, params).then(response => {
            if (response.success === true)
            {
              this.$store.commit('category/deleteCategory', deleteId)
              toast.success(
                  'Deleted',
                  'Your file has been deleted.'
              )
            }else {
              toast.error('Could Deleted')
            }
          })
        }
      })
    }
  }
}
</script>