import Campaign from './components/campaigns/Campaign.vue'
import AdminView from './components/admin/AdminView.vue'

export const routes = [
    {
        path : '/campaigns',
        component : Campaign
    },
    {
        name : 'admin',
        path : '/admin',
        component : AdminView
    }
]
