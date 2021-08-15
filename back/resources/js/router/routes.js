import Students from "../views/Students.vue";
import NotFound from "../views/NotFound.vue";

const routes = [
    {
        path: '/',
        name: 'Students',
        component: Students
    },
    {
        path: '/404',
        name: '404',
        component: NotFound,
    },
    {
        path: '*',
        redirect: '/404',
    }
]

export default routes
