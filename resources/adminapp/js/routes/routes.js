import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const View = { template: '<router-view></router-view>' }

const routes = [
  {
    path: '/',
    component: () => import('@pages/Layout/DashboardLayout.vue'),
    redirect: 'dashboard',
    children: [
      {
        path: 'dashboard',
        name: 'dashboard',
        component: () => import('@pages/Dashboard.vue'),
        meta: { title: 'global.dashboard' }
      },
      {
        path: 'user-management',
        name: 'user_management',
        component: View,
        redirect: { name: 'permissions.index' },
        children: [
          {
            path: 'permissions',
            name: 'permissions.index',
            component: () => import('@cruds/Permissions/Index.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'permissions/create',
            name: 'permissions.create',
            component: () => import('@cruds/Permissions/Create.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'permissions/:id',
            name: 'permissions.show',
            component: () => import('@cruds/Permissions/Show.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'permissions/:id/edit',
            name: 'permissions.edit',
            component: () => import('@cruds/Permissions/Edit.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'roles',
            name: 'roles.index',
            component: () => import('@cruds/Roles/Index.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'roles/create',
            name: 'roles.create',
            component: () => import('@cruds/Roles/Create.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'roles/:id',
            name: 'roles.show',
            component: () => import('@cruds/Roles/Show.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'roles/:id/edit',
            name: 'roles.edit',
            component: () => import('@cruds/Roles/Edit.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'users',
            name: 'users.index',
            component: () => import('@cruds/Users/Index.vue'),
            meta: { title: 'cruds.user.title' }
          },
          {
            path: 'users/create',
            name: 'users.create',
            component: () => import('@cruds/Users/Create.vue'),
            meta: { title: 'cruds.user.title' }
          },
          {
            path: 'users/:id',
            name: 'users.show',
            component: () => import('@cruds/Users/Show.vue'),
            meta: { title: 'cruds.user.title' }
          },
          {
            path: 'users/:id/edit',
            name: 'users.edit',
            component: () => import('@cruds/Users/Edit.vue'),
            meta: { title: 'cruds.user.title' }
          },
          {
            path: 'certificates',
            name: 'certificates.index',
            component: () => import('@cruds/Certificates/Index.vue'),
            meta: { title: 'cruds.certificate.title' }
          },
          {
            path: 'certificates/create',
            name: 'certificates.create',
            component: () => import('@cruds/Certificates/Create.vue'),
            meta: { title: 'cruds.certificate.title' }
          },
          {
            path: 'certificates/:id',
            name: 'certificates.show',
            component: () => import('@cruds/Certificates/Show.vue'),
            meta: { title: 'cruds.certificate.title' }
          },
          {
            path: 'certificates/:id/edit',
            name: 'certificates.edit',
            component: () => import('@cruds/Certificates/Edit.vue'),
            meta: { title: 'cruds.certificate.title' }
          },
          {
            path: 'partners',
            name: 'partners.index',
            component: () => import('@cruds/Partners/Index.vue'),
            meta: { title: 'cruds.partner.title' }
          },
          {
            path: 'partners/create',
            name: 'partners.create',
            component: () => import('@cruds/Partners/Create.vue'),
            meta: { title: 'cruds.partner.title' }
          },
          {
            path: 'partners/:id',
            name: 'partners.show',
            component: () => import('@cruds/Partners/Show.vue'),
            meta: { title: 'cruds.partner.title' }
          },
          {
            path: 'partners/:id/edit',
            name: 'partners.edit',
            component: () => import('@cruds/Partners/Edit.vue'),
            meta: { title: 'cruds.partner.title' }
          },
          {
            path: 'clients',
            name: 'clients.index',
            component: () => import('@cruds/Clients/Index.vue'),
            meta: { title: 'cruds.client.title' }
          },
          {
            path: 'clients/create',
            name: 'clients.create',
            component: () => import('@cruds/Clients/Create.vue'),
            meta: { title: 'cruds.client.title' }
          },
          {
            path: 'clients/:id',
            name: 'clients.show',
            component: () => import('@cruds/Clients/Show.vue'),
            meta: { title: 'cruds.client.title' }
          },
          {
            path: 'clients/:id/edit',
            name: 'clients.edit',
            component: () => import('@cruds/Clients/Edit.vue'),
            meta: { title: 'cruds.client.title' }
          }
        ]
      },
      {
        path: 'exam',
        name: 'exam',
        component: View,
        redirect: { name: 'questions.index' },
        children: [
          {
            path: 'questions',
            name: 'questions.index',
            component: () => import('@cruds/Questions/Index.vue'),
            meta: { title: 'cruds.question.title' }
          },
          {
            path: 'questions/create',
            name: 'questions.create',
            component: () => import('@cruds/Questions/Create.vue'),
            meta: { title: 'cruds.question.title' }
          },
          {
            path: 'questions/:id',
            name: 'questions.show',
            component: () => import('@cruds/Questions/Show.vue'),
            meta: { title: 'cruds.question.title' }
          },
          {
            path: 'questions/:id/edit',
            name: 'questions.edit',
            component: () => import('@cruds/Questions/Edit.vue'),
            meta: { title: 'cruds.question.title' }
          },
          {
            path: 'themes',
            name: 'themes.index',
            component: () => import('@cruds/Themes/Index.vue'),
            meta: { title: 'cruds.theme.title' }
          },
          {
            path: 'themes/create',
            name: 'themes.create',
            component: () => import('@cruds/Themes/Create.vue'),
            meta: { title: 'cruds.theme.title' }
          },
          {
            path: 'themes/:id',
            name: 'themes.show',
            component: () => import('@cruds/Themes/Show.vue'),
            meta: { title: 'cruds.theme.title' }
          },
          {
            path: 'themes/:id/edit',
            name: 'themes.edit',
            component: () => import('@cruds/Themes/Edit.vue'),
            meta: { title: 'cruds.theme.title' }
          },
          {
            path: 'attempts',
            name: 'attempts.index',
            component: () => import('@cruds/Attempts/Index.vue'),
            meta: { title: 'cruds.attempt.title' }
          },
          {
            path: 'attempts/create',
            name: 'attempts.create',
            component: () => import('@cruds/Attempts/Create.vue'),
            meta: { title: 'cruds.attempt.title' }
          },
          {
            path: 'attempts/:id',
            name: 'attempts.show',
            component: () => import('@cruds/Attempts/Show.vue'),
            meta: { title: 'cruds.attempt.title' }
          },
          {
            path: 'attempts/:id/edit',
            name: 'attempts.edit',
            component: () => import('@cruds/Attempts/Edit.vue'),
            meta: { title: 'cruds.attempt.title' }
          },
          {
            path: 'demos',
            name: 'demos.index',
            component: () => import('@cruds/Demos/Index.vue'),
            meta: { title: 'cruds.demo.title' }
          },
          {
            path: 'demos/create',
            name: 'demos.create',
            component: () => import('@cruds/Demos/Create.vue'),
            meta: { title: 'cruds.demo.title' }
          },
          {
            path: 'demos/:id',
            name: 'demos.show',
            component: () => import('@cruds/Demos/Show.vue'),
            meta: { title: 'cruds.demo.title' }
          },
          {
            path: 'demos/:id/edit',
            name: 'demos.edit',
            component: () => import('@cruds/Demos/Edit.vue'),
            meta: { title: 'cruds.demo.title' }
          },
          {
            path: 'alternatives',
            name: 'alternatives.index',
            component: () => import('@cruds/Alternatives/Index.vue'),
            meta: { title: 'cruds.alternative.title' }
          },
          {
            path: 'alternatives/create',
            name: 'alternatives.create',
            component: () => import('@cruds/Alternatives/Create.vue'),
            meta: { title: 'cruds.alternative.title' }
          },
          {
            path: 'alternatives/:id',
            name: 'alternatives.show',
            component: () => import('@cruds/Alternatives/Show.vue'),
            meta: { title: 'cruds.alternative.title' }
          },
          {
            path: 'alternatives/:id/edit',
            name: 'alternatives.edit',
            component: () => import('@cruds/Alternatives/Edit.vue'),
            meta: { title: 'cruds.alternative.title' }
          }
        ]
      }
    ]
  }
]

export default new VueRouter({
  mode: 'history',
  base: '/admin',
  routes
})
