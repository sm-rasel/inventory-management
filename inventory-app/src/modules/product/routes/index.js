const routes = [
  {
    path: '/product-list',
    name: 'product_list',
    meta: { auth: true },
    component: () => import('../pages/ProductList.vue')
  },
  {
    path: '/product-add',
    name: 'product_add',
    meta: { auth: true },
    component: () => import('../pages/ProductForm.vue')
  },
  {
    path: '/product-edit/:productId',
    name: 'product_edit',
    meta: { auth: true },
    component: () => import('../pages/ProductForm.vue')
  }
]

export default routes
