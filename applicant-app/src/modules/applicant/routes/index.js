const routes = [{
  path: '/',
  name: 'list',
  meta: { auth: false },
  component: () => import('../pages/ApplicantList.vue')
},
{
  path: '/add-applicant',
  name: 'applicant_form',
  meta: { auth: false },
  component: () => import('../pages/ApplicantForm.vue')
},
{
  path: '/edit-applicant/:applicantId',
  name: 'edit_applicant_form',
  meta: { auth: false },
  component: () => import('../pages/ApplicantForm.vue')
}
]

export default routes
