<template>
  <div class="category-add">
    <div class="row mb-4">
      <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
          <div class="page-title-right">
            <ol class="breadcrumb m-0">
              <li class="breadcrumb-item">
                <router-link :to="{ name: 'inventory_list' }" class="text-decoration-none">Home</router-link>
              </li>
              <li class="breadcrumb-item active">Category Add</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title mb-4">Add Category Form</h4>
        <form action="" method="POST" id="" enctype="multipart/form-data">
          <div class="row mb-4">
            <label class="col-sm-3 col-form-label">
              Product Name
              <span class="text-danger me-1">*</span>
            </label>
            <div class="col-sm-9">
              <select v-model="product_id" class="form-control">
                <option>-- Select Product --</option>
              </select>
            </div>
          </div>
          <div class="row mb-4">
            <label class="col-sm-3 col-form-label">
              Category Name
              <span class="text-danger me-1">*</span>
            </label>
            <div class="col-sm-9">
              <input type="text" class="form-control" v-model="c_name" placeholder="Enter Category Name"/>
            </div>
          </div>
          <div class="row mb-4">
            <label class="col-sm-3 col-form-label">
              Category Quantity
              <span class="text-danger me-1">*</span>
            </label>
            <div class="col-sm-9">
              <input type="number" class="form-control" v-model="c_qty" placeholder="Enter Quantity"/>
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

</script>

<style scoped>

</style>