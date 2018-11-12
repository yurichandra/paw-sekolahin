import Campaign from './components/campaigns/Campaign.vue'
import AdminView from './components/admin/AdminView.vue'
import DashboardView from './components/admin/DashboardView.vue'
import UserView from './components/admin/UserView.vue'

import HomeView from './views/Home.vue'
import CreateView from './views/CampaignCreate.vue'
import CampaignView from './views/Campaign.vue'
import ProfileView from './views/Profile.vue'


export const routes = [
    // ROUTES UNTUK ADMIN
    {
        name : 'admin',
        path : '/admin',
        component : AdminView
    },
    {
        name : 'dashboard',
        path : '/admin/dashboard',
        component : DashboardView
    },
    {
        name : 'users',
        path : '/admin/users',
        component : UserView
    },
    // ROUTES UNTUK UTAMA
    {
        path: '/',
        name: 'home',
        component: HomeView
      },
      {
        path: '/create',
        name: 'campaign-create',
        component: CreateView
      },
      {
        path: '/profile',
        name: 'profile',
        component: ProfileView
      },
      {
        path: '/campaign',
        name: 'campaign',
        component: CampaignView
      },
      {
          path: '*',
          name: 'all',
          component: HomeView
      }
]
