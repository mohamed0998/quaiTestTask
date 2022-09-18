import axios from 'axios';

const api = axios.create({ baseURL: 'http://127.0.0.1:8000/' });

export default (app) => {
    app.config.globalProperties.$axios = axios;

    app.config.globalProperties.$api = api;
};

export { api };
