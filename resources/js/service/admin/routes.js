import AdminView from '../../components/Admin.vue'
import DashboardView from '../../components/admin/DashboardView.vue'
import UserView from '../../components/admin/UserView.vue'
import LoginView from '../../components/admin/LoginView.vue'
import DonationView from '../../components/admin/DonationView.vue'
import CampaignView from '../../components/admin/CampaignView'
import SchoolView from '../../components/admin/SchoolView.vue'
import SchoolEdit from '../../components/admin/SchoolEdit.vue'
import Http from '../../http'

const ifNotAuthenticated = (to, from, next) => {
    if (!Http.isHeaderExist()) {
        next()
        return
    }
    next('/admin/login')
}

const ifAuthenticated = (to, from, next) => {
    if (Http.isHeaderExist()) {
        next()
        return
    }
    next('/admin/dashboard')
}

export const routes = [
    {
        name : 'admin',
        path : '/admin',
        component : AdminView,
    },
    {
        name : 'login',
        path : '/admin/login',
        component : LoginView,
        beforeEnter: ifNotAuthenticated
    },
    {
        name : 'dashboard',
        path : '/admin/dashboard',
        component : DashboardView,
        beforeEnter: ifAuthenticated
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
        name : 'campaigns',
        path : '/admin/campaigns',
        component : CampaignView
    },
    {
        name : 'schools',
        path : '/admin/schools',
        component : SchoolView
    },
    {
        name: 'schools.edit',
        path: '/admin/schools/:id',
        component: SchoolEdit
    }
]
