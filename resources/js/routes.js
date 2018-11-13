import Campaign from './components/campaigns/Campaign.vue'
import AdminView from './components/Admin.vue'
import DashboardView from './components/admin/DashboardView.vue'
import UserView from './components/admin/UserView.vue'
import LoginView from './components/admin/LoginView.vue'
import DonationView from './components/admin/DonationView.vue'
import SchoolView from './components/admin/SchoolView.vue'

import HomeView from './views/Home.vue'
import CreateView from './views/CampaignCreate.vue'
import CampaignView from './views/Campaign.vue'
import ProfileView from './views/Profile.vue'


export const routes = [
    // ROUTES UNTUK ADMIN
    {
        name : 'admin',
        path : '/admin',
        component : AdminView,
    },
    {
        name : 'login',
        path : '/admin/login',
        component : LoginView,
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
    },
    {
        name : 'donations',
        path : '/admin/donations',
        component : DonationView
    },
    {
        name : 'schools',
        path : '/admin/schools',
        component : SchoolView
    }
]
