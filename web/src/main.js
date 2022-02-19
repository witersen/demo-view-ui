import Vue from 'vue';
import ViewUI from 'view-design';
import VueRouter from 'vue-router';
import Routers from './router';
import Util from './libs/util';
import App from './app.vue';
import 'view-design/dist/styles/iview.css';

/**
 * 安装过axios后需要在main.js文件进行操作
 * 
 * 以下为手动安装配置的依赖
 * 通过 Vue.prototype.$name 的方式 使$name在所有的Vue实例中可用
 */
//http请求 -> axios
import axios from 'axios';
Vue.prototype.$axios = axios;

Vue.use(VueRouter);
Vue.use(ViewUI);

// 路由配置
const RouterConfig = {
    mode: 'hash',
    routes: Routers
};
const router = new VueRouter(RouterConfig);

//路由拦截器 beforeEach
router.beforeEach((to, from, next) => {
    ViewUI.LoadingBar.start();
    Util.title(to.meta.title);
    next();
});

//路由拦截器 afterEach
router.afterEach((to, from, next) => {
    ViewUI.LoadingBar.finish();
    window.scrollTo(0, 0);
});

/**
 * 手动配置请求拦截器
 */
axios.interceptors.request.use(function (config) {
    return config
}, function (error) {
    return Promise.reject(error);
});

/**
 * 手动配置添加响应拦截器
 */
axios.interceptors.response.use(function (response) {
    return response;
}, function (error) {
    return Promise.reject(error);
});

new Vue({
    el: '#app',
    router: router,
    render: h => h(App)
});
