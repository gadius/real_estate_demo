import { createRouter, createWebHistory } from 'vue-router'

import RealEstateIndex from '../components/realestates/RealEstateIndex.vue'
import RealEstateCreate from '../components/realestates/RealEstateCreate.vue'
import RealEstateEdit from '../components/realestates/RealEstateEdit.vue'
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
    {
        path: '/realestates/:id/edit',
        name: 'realestates.edit',
        component: RealEstateEdit,
        props: true
    },
];

export default createRouter({
    history: createWebHistory(),
    routes
})