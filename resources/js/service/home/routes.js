import HomeView from '../../views/Home.vue'
import CreateView from '../../views/CampaignCreate.vue'
import CampaignView from '../../views/Campaign.vue'
import ProfileView from '../../views/Profile.vue'

export const routes = [
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
    },
]
