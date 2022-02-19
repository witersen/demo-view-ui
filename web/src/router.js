const routers = [
    {
        name: 'login',
        path: '/login',
        component: (resolve) => require(['./views/login.vue'], resolve)
    },
    {
        name: 'manage',
        path: '/',
        redirect: 'nav1',
        meta: {
            title: '首页',
        },
        component: (resolve) => require(['./views/layout/index.vue'], resolve),
        children: [
            {
                name: 'nav1',
                path: '/nav1',
                meta: {
                    title: 'nav1',
                },
                component: (resolve) => require(['./views/nav1.vue'], resolve)
            },
            {
                name: 'nav2',
                path: '/nav2',
                meta: {
                    title: 'nav2',
                },
                component: (resolve) => require(['./views/nav2.vue'], resolve)
            },
        ]
    },
];
export default routers;