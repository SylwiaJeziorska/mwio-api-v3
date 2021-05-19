import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from "../views/Home";
import Admin from "../views/admin";
import Installations from "../components/admin/installations";
import Installation from "../components/admin/installation";
import singleInstallation from "../views/singleInstallation";
import newInstallation from "../views/newInstallation";
Vue.use(VueRouter);

const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home,
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
    }
];

const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes,
});

export default router;

