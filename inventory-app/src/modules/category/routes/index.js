const routes = [
    {
    path: '/category-list',
    name: 'category_list',
    meta: { auth: false },
    component: () => import('../pages/CategoryList.vue')
  },
  {
    path: '/category-add',
    name: 'category_add',
    component: () => import('../pages/CategoryForm.vue')
  },
    {
        path: '/category-edit/:categoryId',
        name: 'category_edit',
        component: () => import('../pages/CategoryForm.vue')
    }

]

export default routes
