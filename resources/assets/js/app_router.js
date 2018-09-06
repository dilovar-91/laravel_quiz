/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';

window.Vue.use(VueRouter);
//const QE = require('./components/question/QuestionsCreate').default;
//const QE = () => import('./components/question/QuestionsCreate.vue').then(m => m.default);

import QuestionsIndex from './components/question/QuestionsIndex.vue';
import QuestionsCreate from './components/question/QuestionsCreate.vue';
import QuestionsEdit from './components/question/QuestionsEdit.vue';

const routes = [
    {
        path: '/',
        components: {
            questionsIndex: QuestionsIndex
        }
    },
    {path: '/create', component: QuestionsCreate, name: 'createQuestion'},
    {path: '/edit/:id', component: QuestionsEdit, name: 'editQuestion'},
]

const router = new VueRouter({ routes })

const app = new Vue({ router }).$mount('#app')
const app = new Vue({
  el: '#app',
  components: {
    'example-component'​
  } 
});