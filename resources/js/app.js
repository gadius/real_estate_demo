require('./bootstrap');

require('alpinejs');

import { createApp } from 'vue';
import router from './router'

import RealEstateIndex from './components/realestates/RealEstateIndex.vue';

createApp({
    components: {
        RealEstateIndex
    }
}).use(router).mount('#app')