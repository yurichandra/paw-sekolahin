import HomeView from '../../views/Home.vue'
import CreateView from '../../views/CampaignCreate.vue'
import CampaignView from '../../views/Campaign.vue'
import ProfileView from '../../views/Profile.vue'
import LoginView from '../../views/Login.vue'
import RegisterView from '../../views/Register.vue'

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
        path: '/login',
        name: 'login',
        component: LoginView
    },
    {
        path: '/register',
        name: 'register',
        component: RegisterView
    },
    {
        path: '*',
        name: 'all',
        component: HomeView
    },
]
