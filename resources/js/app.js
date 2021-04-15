require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('list-puestos', require('./components/listPuestos.vue').default);

const app = new Vue({
    el: '#app',
});
