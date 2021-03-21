require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('navigation', require('./components/Navigation.vue').default);

const app = new Vue({
    el: '#larahmat',
});
