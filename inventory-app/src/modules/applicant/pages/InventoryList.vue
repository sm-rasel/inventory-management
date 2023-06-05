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
            </ul>
          </li>
        </ul>
      </div>
      <!-- Sidebar -->
    </div>
  </div>
  <div class="container text-center  mt-5 mb-5">
    <div class="float-end">
      <router-link class="btn btn-sm btn-outline-success w-md" :to="{ name: 'product_list'}">Add New</router-link>
    </div>
    <h3 class="mt-5 fw-bolder text-success "> List of Data </h3>
    <div class="table-responsive my-5 table-bordered">
      <BtTable :data="applicants" :columns="columns" :actions="actions" />
    </div>
  </div>
</template>

<script>
import RestApi, { ServiceBaseUrl } from '../../../../config/api_config'
import {inventoryListApi} from '../api/routes'
import { mapState } from 'vuex'
export default {
  components: { },
  computed: mapState({
    applicants: state => state.applicants.applicantList
  }),
  data() {
    return {
      columns: [
        {
          title:  'SL',
          field:  'id'
        },
        {
          title:  'Product Name',
          field:  'p_name'
        },
        {
          title:  'Category Name',
          field:  'c_name'
        },
        {
          title: 'Stock',
          field: 'app_image'
        },
        {
          title: 'Status',
          field: 'i_status'
        },
      ],
      actions: {
        edit: true,
        delete: true
      }
    }
  },
  created () {
    this.loadData()
  },
  methods: {
    loadData () {
      const params = {}
      RestApi.getData(ServiceBaseUrl, inventoryListApi, params).then(response => {
        if (response.success) {
          const arrayData = response.data.map(item => {
            // const in_status = item.in_status === 1 ? 'Active' : 'Inactive';
            // item.in_status = in_status;
            return item;
          })
          this.$store.commit('applicants/setApplicantList', arrayData)
        }
      })
    },
    dataEdit(itemId)  {
      console.log('Edit Item  => ', itemId);
    }
  }
}
</script>