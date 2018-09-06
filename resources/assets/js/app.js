
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Datepicker from 'vuejs-datepicker';
import Sanjish from './components/App.vue'

import Task from './components/task.vue'
import Savol from './components/savol.vue'

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('Sanjish', require('./components/App.vue'));
Vue.component('quest-list', require('./components/Quest-list.vue'));
//Vue.component('savol', require('./components/savol.vue'));
	
//Vue.component('task', require('./components/task.vue'));


const app = new Vue({
    el: '#app',
	//render: h => h(Questions)
	components: {
      //'Questions': Questions,
      'Task' : Task,
     'Savol' : Savol,
      'Sanjish' : Sanjish,
     'quest-list' : quest-list,
    }



});



