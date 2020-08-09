import '../css/app.css';

//Import frameworks
import $ from 'jquery';
import Vue from 'vue';

//Import components
import Paragraph from "./Components/Paragraph.vue";

new Vue({
    el: '#app',
    components: {Paragraph}
});