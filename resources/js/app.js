
require('./bootstrap');

window.Vue = require('vue');
import Vuex from 'vuex';
Vue.use(Vuex);


import VueAxios from 'vue-axios';
import axios from 'axios';

Vue.use(VueAxios, axios);

Vue.component('tabela-lista', require('./components/empresa/Tabela.vue').default);
Vue.component('modal', require('./components/Modal.vue').default);
Vue.component('modal-link', require('./components/ModalLink.vue').default);

 //Vuex
 const store = new Vuex.Store({
  state: {
    item:{}
  },
  mutations: {
    setItem(state, obj){
      state.item = obj;
    }
  }
});

const app = new Vue({
    el: '#app',
    store,
    mounted: function(){
      document.getElementById('app').style.display = "block";
    }
});