const routes = [
    {
    path: '/',
    name: 'login',
    meta: { auth: false },
    component: () => import('../pages/Login.vue')
  }
]


export default routes
