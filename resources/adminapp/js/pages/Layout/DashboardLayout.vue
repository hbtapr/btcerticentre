<template>
  <div class="wrapper" :class="{ 'nav-open': $sidebar.showSidebar }">
    <event-hub></event-hub>
    <side-bar :sidebarLinks="sidebarLinks">
      <mobile-menu slot="content"></mobile-menu>
    </side-bar>

    <div class="main-panel">
      <top-navbar></top-navbar>
      <div class="content">
        <dashboard-content></dashboard-content>
      </div>
    </div>
  </div>
</template>

<script>
import DashboardContent from './Content.vue'
import TopNavbar from './TopNavbar.vue'
import MobileMenu from './MobileMenu.vue'

export default {
  components: {
    DashboardContent,
    TopNavbar,
    MobileMenu
  },
  data() {
    return {
      sidebarLinks: [
        {
          title: 'global.dashboard',
          icon: 'dashboard',
          path: { name: 'dashboard' }
        },
        {
          title: 'cruds.userManagement.title',
          icon: 'person',
          path: { name: 'user_management' },
          gate: 'user_management_access',
          children: [
            {
              title: 'cruds.permission.title',
              icon: 'perm_data_setting',
              path: { name: 'permissions.index' },
              gate: 'permission_access'
            },
            {
              title: 'cruds.role.title',
              icon: 'group',
              path: { name: 'roles.index' },
              gate: 'role_access'
            },
            {
              title: 'cruds.user.title',
              icon: 'person',
              path: { name: 'users.index' },
              gate: 'user_access'
            },
            {
              title: 'cruds.certificate.title',
              icon: 'table_view',
              path: { name: 'certificates.index' },
              gate: 'certificate_access'
            },
            {
              title: 'cruds.partner.title',
              icon: 'table_view',
              path: { name: 'partners.index' },
              gate: 'partner_access'
            },
            {
              title: 'cruds.client.title',
              icon: 'table_view',
              path: { name: 'clients.index' },
              gate: 'client_access'
            }
          ]
        },
        {
          title: 'cruds.exam.title',
          icon: 'table_view',
          path: { name: 'exam' },
          gate: 'exam_access',
          children: [
            {
              title: 'cruds.question.title',
              icon: 'table_view',
              path: { name: 'questions.index' },
              gate: 'question_access'
            },
            {
              title: 'cruds.theme.title',
              icon: 'table_view',
              path: { name: 'themes.index' },
              gate: 'theme_access'
            },
            {
              title: 'cruds.attempt.title',
              icon: 'table_view',
              path: { name: 'attempts.index' },
              gate: 'attempt_access'
            },
            {
              title: 'cruds.demo.title',
              icon: 'table_view',
              path: { name: 'demos.index' },
              gate: 'demo_access'
            },
            {
              title: 'cruds.alternative.title',
              icon: 'table_view',
              path: { name: 'alternatives.index' },
              gate: 'alternative_access'
            }
          ]
        }
      ]
    }
  }
}
</script>
