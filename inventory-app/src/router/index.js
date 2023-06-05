import { createRouter, createWebHistory } from 'vue-router'
import ProductRoutes from '../modules/product/routes'
import CategoryRoutes from '../modules/category/routes'
const routes = [
    ...ProductRoutes,
    ...CategoryRoutes
]
const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes
})

export default router
