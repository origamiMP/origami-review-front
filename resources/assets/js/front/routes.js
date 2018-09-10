import ReviewCreateComponent from './components/ReviewCreateComponent.vue';
import ReviewCreateSuccessComponent from './components/ReviewCreateSuccessComponent';
import SellerShowComponent from './components/SellerShowComponent';
import MarketplaceShowComponent from './components/MarketplaceShowComponent';
import RegisterPage from './pages/Register';
import LoginPage from './pages/Login';
import SellerListPage from './pages/SellerList'
import DemoGiveOpinionPage from './pages/DemoGiveOpinion';

import GeneralLayout from './pages/Layout/GeneralLayout';
import RegisterLayout from './pages/Layout/RegisterLayout';

const routes = [
  {
    path: '/',
    component: GeneralLayout,
    children: [
      {name: 'DemoGiveOpinion', path: '/reviews/new', component: DemoGiveOpinionPage},
      {name: 'ReviewCreateSuccess', path: '/reviews/new/success', component: ReviewCreateSuccessComponent},
      {name: 'SellerShowComponent', path: '/sellers/:id', component: SellerShowComponent},
      {name: 'MarketplaceShowComponent', path: '/marketplaces/:id', component: MarketplaceShowComponent},
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
