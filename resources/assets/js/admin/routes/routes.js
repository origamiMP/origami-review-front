import DashboardLayout from '../pages/Layout/DashboardLayout.vue'

import Dashboard from '../pages/Dashboard.vue'
import UserProfile from '../pages/UserProfile.vue'
import ReviewList from '../pages/ReviewList.vue'
import ReviewShow from '../pages/ReviewShow.vue'
import Typography from '../pages/Typography.vue'
import Icons from '../pages/Icons.vue'
import Maps from '../pages/Maps.vue'
import Notifications from '../pages/Notifications.vue'

const routes = [
  {
    path: '/admin',
    component: DashboardLayout,
    redirect: '/admin/dashboard',
    children: [
      {
        path: '/admin/dashboard',
        name: 'Dashboard',
        component: Dashboard
      },
      {
        path: '/admin/user',
        name: 'User Profile',
        component: UserProfile
      },
      {
        path: '/admin/reviews',
        name: 'Reviews',
        component: ReviewList
      },
      {
        path: '/admin/reviews/:id',
        name: 'Review',
        component: ReviewShow
      },
    ]
  }
];

export default routes
