// import './bootstrap';
//
// import { createApp } from 'vue'
// // import the root component App from a single-file component.
// import App from './App.vue'
//
// import testComponent from "./components/testComponent.vue";
//
// const app = createApp(App)
//
// app.mount('#app')


require('./bootstrap');

window.Vue=require('vue')

Vue.component('product-add',require('./components/products/AddProduct').default)


const app=new Vue({
    el:'#app'
});
