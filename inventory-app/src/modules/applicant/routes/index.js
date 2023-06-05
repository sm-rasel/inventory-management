const routes = [
  {
    path: '/',
    name: 'inventory_list',
    meta: { auth: false },
    component: () => import('../pages/InventoryList.vue')
  },
  {
    path: '/product-list',
    name: 'product_list',
    meta: { auth: false },
    component: () => import('../pages/ProductList.vue')
  },
  {
    path: '/product-add',
    name: 'product_add',
    meta: { auth: false },
    component: () => import('../pages/ProductAdd.vue')
  },
  {
    path: '/product-edit/:productId',
    name: 'product_edit',
    meta: { auth: false },
    component: () => import('../pages/ProductEdit.vue')
  },
  {
    path: '/category-list',
    name: 'category_list',
    meta: { auth: false },
    component: () => import('../pages/CategoryList.vue')
  },
  {
    path: '/category-add',
    name: 'category_add',
    component: () => import('../pages/CategoryAdd.vue')
  }

]

export default routes
