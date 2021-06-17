import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from "../views/Home";
import installationsObsoletes from "../views/installationsObsoletes";
import MountainWilderness from "../views/MountainWilderness";
import PrivacyPolicy from "../views/PrivacyPolicy";
import Contact from "../views/Contact";
import Admin from "../views/admin";
import Installations from "../components/admin/installations";
import Installation from "../components/admin/installation";
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
    },
    {
        path: '/home',
        name: 'Home',
        component: Home,
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
        path: '/installation/:id',
        name: 'singleInstallation',
        component: singleInstallation,
    },
    {
        path: "/admin",
        name: "Admin",
        component: Admin,
        children: [
            {
                path: "/admin/installations",
                name: "Installations",
                component: Installations,
                props: true
            },
            {
                path: "/admin/installation/:id",
                name: "Installation",
                component: Installation,
                props: true
            },
        ]
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

