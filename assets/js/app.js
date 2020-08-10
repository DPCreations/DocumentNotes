import '../css/app.css';

//Import frameworks
import Vue from 'vue';
import $ from 'jquery';
import bootstrap from 'bootstrap';

//Import components
import Paragraph from "./Components/Paragraph";

//Components
Vue.component('paragraph', Paragraph);

new Vue({
    el: '#app',
});