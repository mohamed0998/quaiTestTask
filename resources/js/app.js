import 'bootstrap';

import '../css/app.css';
import '../sass/app.scss';

import { createApp, h } from 'vue';

import App from './App.vue';
import Router from './plugins/router';

import registerGlobals from './components/Global';
import axios from './plugins/axios';

const app = createApp({
    render: () => h(App),
});

registerGlobals(app);

app.use(Router());
app.mount('#app');

axios(app);
