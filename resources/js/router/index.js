import { createRouter, createWebHistory } from 'vue-router'

import RealEstateIndex from '../components/realestates/RealEstateIndex.vue'

const routes = [
    {
        path: '/dashboard',
        name: 'realestates.index',
        component: RealEstateIndex
    }
];

export default createRouter({
    history: createWebHistory(),
    routes
})