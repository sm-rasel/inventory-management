import { createRouter, createWebHistory } from 'vue-router'
import UserRoutes from '../modules/auth/routes'
import InventoryRoutes from '../modules/inventory/routes'
import ProductRoutes from '../modules/product/routes'
import CategoryRoutes from '../modules/category/routes'
import Store from "../store";
const routes = [
    ...UserRoutes,
    ...ProductRoutes,
    ...CategoryRoutes,
    ...InventoryRoutes
]
const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes
})

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.auth)) {
        const authUser = Store.state.user.authenticated
        if (!authUser) {
            return next({ path: '/' })
        } else {
            return next()
        }
    }
    next()
})
export default router
