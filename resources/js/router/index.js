import Vue from 'vue';
import VueRouter from 'vue-router';
import Main from "../views/MainMap";
import Home from "../views/Home";
import installationsObsoletes from "../views/installationsObsoletes";
import MountainWilderness from "../views/MountainWilderness";
import PrivacyPolicy from "../views/PrivacyPolicy";
import Contact from "../views/Contact";
//import Admin from "../views/admin";
//import Installations from "../components/admin/installations/nstallations";
import Partners from "../components/admin/partners/partners";
import Users from "../components/admin/users/users";
import Installations from "../components/admin/installations/installations";
import Installation from "../components/admin/installations/installation";
import singleInstallation from "../views/singleInstallation";
import newInstallation from "../views/newInstallation";
import userAccount from "../components/user/userAccount"
import register from "../components/auth/register"
import signIn from "../components/auth/signIn"
import lostPasswordForm from "../components/auth/lostPasswordForm";
Vue.use(VueRouter);

const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home,
    },    {
        path: '/map',
        name: 'Main',
        component: Main,
    },
    {
        path: '/map',
        name: 'Main',
        component: Main,
    },
    {
        path: '/PrivacyPolicy',
        name: 'PrivacyPolicy',
        component: PrivacyPolicy,
    },
    {
        path: '/MountainWilderness',
        name: 'MountainWilderness',
        component: MountainWilderness,
    },
    {
        path: '/Contact',
        name: 'Contact',
        component: Contact,
    },
    {
        path: '/Partners',
        name: 'Partners',
        component: Partners,
    },
    {
        path: '/Users',
        name: 'Users',
        component: Users,
    },
    {
        path: '/installationsObsoletes',
        name: 'installationsObsoletes',
        component: installationsObsoletes,
    },
    {
        path: '/new',
        name: 'newInstallation',
        component: newInstallation,
    },
    {
        path: '/',
        name: 'singleInstallation',
        component: singleInstallation,
    },
    {
        path: "/Admin/installations",
        name: "Installations",
        component: Installations,
    },
    {
        path: "/admin/installation/:id",
        name: "Installation",
        component: Installation,
    },
    {
        path: '/user/:id',
        name: 'User',
        component: userAccount
    },
    {
        path: '/api/auth/register',
        name: 'register',
        component: register
    },
    {
        path: '/api/auth/signIn',
        name: 'signIn',
        component: signIn
    },
    {
        path: '/api/auth/lostPasswordForm',
        name: 'lostPasswordForm',
        component: lostPasswordForm
    }
];

const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes,
});

export default router;

