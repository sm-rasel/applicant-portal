import { createRouter, createWebHistory } from 'vue-router'
import ApplicantRoutes from '../modules/applicant/routes'
const routes = [
  ...ApplicantRoutes
]
const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes
})

export default router
