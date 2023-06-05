const routes = [
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
    component: () => import('../pages/ProductForm.vue')
  },
  {
    path: '/product-edit/:productId',
    name: 'product_edit',
    meta: { auth: false },
    component: () => import('../pages/ProductForm.vue')
  }
]

export default routes
