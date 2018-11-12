import Campaign from './components/campaigns/Campaign.vue'
import AdminView from './components/Admin.vue'
import DashboardView from './components/admin/DashboardView.vue'
import UserView from './components/admin/UserView.vue'
import LoginView from './components/admin/LoginView.vue'
import DonationView from './components/admin/DonationView.vue'
import SchoolView from './components/admin/SchoolView.vue'

export const routes = [
    {
        path : '/campaigns',
        component : Campaign
    },
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
