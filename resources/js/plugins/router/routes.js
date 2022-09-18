const routes = [
    {
        path: '/',
        component: () => import('../../layouts/MainLayout.vue'),
        children: [
            {
                path: '',
                name: 'Services',
                component: () => import('../../pages/ServicesPage.vue'),
            },
            {
                path: 'commandes',
                name: 'Commandes',
                component: () => import('../../pages/CommandesPage.vue'),
            },

        ],
    },
    // Always leave this as last one,
    // but you can also remove it
    {
        path: '/:catchAll(.*)*',
        component: () => import('../../pages/Error404Page.vue'),
    },
];

export default routes;