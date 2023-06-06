const routes = [
    {
    path: '/category-list',
    name: 'category_list',
    meta: { auth: true },
    component: () => import('../pages/CategoryList.vue')
  },
  {
    path: '/category-add',
    name: 'category_add',
      meta: { auth: true },
    component: () => import('../pages/CategoryForm.vue')
  },
    {
        path: '/category-edit/:categoryId',
        name: 'category_edit',
        meta: { auth: true },
        component: () => import('../pages/CategoryForm.vue')
    }

]

export default routes
