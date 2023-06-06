const routes = [
    {
    path: '/inventory-list',
    name: 'inventory_list',
    meta: { auth: true },
    component: () => import('../pages/inventoryList.vue')
  },
  {
    path: '/inventory-add',
    name: 'inventory_add',
      meta: { auth: true },
    component: () => import('../pages/InventoryForm.vue')
  },
    {
        path: '/inventory-edit/:inventoryId',
        name: 'inventory_edit',
        meta: { auth: true },
        component: () => import('../pages/InventoryForm.vue')
    }

]

export default routes
