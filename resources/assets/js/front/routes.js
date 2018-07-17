import ReviewCreateComponent from './components/ReviewCreateComponent.vue';
import ReviewCreateSuccessComponent from './components/ReviewCreateSuccessComponent';
import SellerShowComponent from './components/SellerShowComponent';
import RegisterPage from './pages/Register';
import LoginPage from './pages/Login';
import SellerListPage from './pages/SellerList'

import GeneralLayout from './pages/Layout/GeneralLayout';
import RegisterLayout from './pages/Layout/RegisterLayout';

const routes = [
  {
    path: '/',
    component: GeneralLayout,
    children: [
      {name: 'ReviewCreate', path: '/reviews/new', component: ReviewCreateComponent},
      {name: 'ReviewCreateSuccess', path: '/reviews/new/success', component: ReviewCreateSuccessComponent},
      {name: 'SellerShowComponent', path: '/sellers/:id', component: SellerShowComponent},
      {name: 'SellerListPage', path: '/', component: SellerListPage},
    ]
  },
  {
    path: '/auth/',
    component: RegisterLayout,
    redirect: '/auth/register',
    children: [
      {name: 'RegisterPage', path: '/auth/register', component: RegisterPage},
      {name: 'LoginPage', path: '/auth/login', component: LoginPage},
    ]
  },
];

export default routes
