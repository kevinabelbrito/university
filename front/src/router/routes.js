export default [
    // {
    //     path: '/',
    //     component: () => import('../components/layouts/AuthLayout.vue'),
    //     children: [
    //         { path: '/login', name: 'login', component: () => import('../pages/auth/LoginPage.vue') },
    //         { path: '/register', name: 'register', component: () => import('../pages/auth/RegisterPage.vue') },
    //         { path: '/', redirect: '/login' }
    //     ]
    // },
    {
        path: '/',
        component: () => import('../components/layouts/PanelLayout.vue'),
        children: [
            { path: '/students', component: () => import('../pages/students/StudentList.vue') },
            { path: '/', redirect: '/students' }
        ]
    }
]