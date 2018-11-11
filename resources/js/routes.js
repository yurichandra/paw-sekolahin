import Campaign from './components/campaigns/Campaign.vue'
import AdminView from './components/admin/AdminView.vue'
import DashboardView from './components/admin/DashboardView.vue'
import UserView from './components/admin/UserView.vue'

export const routes = [
    {
        path : '/campaigns',
        component : Campaign
    },
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
    }
]
