import { createRouter, createWebHistory } from 'vue-router'

import RealEstateIndex from '../components/realestates/RealEstateIndex.vue'
import RealEstateCreate from '../components/realestates/RealEstateCreate.vue'
const routes = [
    {
        path: '/dashboard',
        name: 'realestates.index',
        component: RealEstateIndex
    },
    {
        path: '/realestates/create',
        name: 'realestates.create',
        component: RealEstateCreate
    },
];

export default createRouter({
    history: createWebHistory(),
    routes
})