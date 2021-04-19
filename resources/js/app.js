require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('list-puestos', require('./components/listPuestos.vue').default);
Vue.component('list-puesto-edit', require('./components/listPuestoEdit.vue').default);

const app = new Vue({
    el: '#app',
});
