import axios from "axios";
window.axios = axios;
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
try {
    window.Popper = require("popper.js").default;
    window.$ = window.jQuery = require("jquery");
    require("bootstrap");
} catch (e) {}

import Vue from "vue";
import VueRouter from "vue-router";
import Toasted from "vue-toasted";

Vue.use(Toasted);

import router from "./router";

Vue.use(VueRouter);

import routes from "./router";

Vue.component("navigation", require("./components/Navigation.vue").default);
Vue.productionTips = false;

const app = new Vue({
    el: "#larahmat",
    router: new VueRouter(routes)
});
