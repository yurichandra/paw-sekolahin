import HomeView from '../../views/Home.vue';
import CreateView from '../../views/CampaignCreate.vue';
import CampaignView from '../../views/Campaign.vue';
import ProfileView from '../../views/Profile.vue';
import RegisterView from '../../views/Register.vue';
import DetailView from '../../views/CampaignDetail.vue';


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
        path: '/campaign/:campaign_id',
        name: 'campaign-detail',
        component: DetailView
    },
    {
        path: '/profile/:profile_type',
        name: 'profile',
        component: ProfileView
    },
    {
        path: '/campaign',
        name: 'campaign',
        component: CampaignView
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
