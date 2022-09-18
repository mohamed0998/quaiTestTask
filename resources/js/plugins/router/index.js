import { createRouter, createWebHistory } from "vue-router";

import routes from "./routes";
export default () => {
    const Router = createRouter({
        scrollBehavior: () => ({ left: 0, top: 0 }),
        routes,
        history: createWebHistory(),
    });

    return Router;
};
