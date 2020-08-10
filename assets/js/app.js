import '../css/app.css';

//Import frameworks
import Vue from 'vue';
import $ from 'jquery';
import bootstrap from 'bootstrap';

//Import components
import Paragraph from "./Components/Paragraph.vue";

new Vue({
    el: '#app',
    components: {Paragraph}
});