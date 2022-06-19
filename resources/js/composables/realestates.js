import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'

export default function useRealEstates() {
    const realestate = ref([])
    const realestates = ref([])

    const errors = ref('')
    const router = useRouter()

    const getRealEstates = async () => {
        let response = await axios.get('/api/realestate')
        realestates.value = response.data.data.realestates        
    }

    const getRealEstate = async (id) => {
        let response = await axios.get(`/api/realestate/${id}`)
        realestate.value = response.data.data
    }

    const storeRealEstate = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/realestate', data)
            await router.push({ name: 'realestates.index' })
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value += e.response.data.errors[key][0] + ' ';
                }
            }
        }

    }

    const updateRealEstate = async (id) => {
        errors.value = ''
        try {
            await axios.patch(`/api/realestate/${id}`, realestate.value)
            await router.push({ name: 'realestates.index' })
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value += e.response.data.errors[key][0] + ' ';
                }
            }
        }
    }

    return {
        errors,
        realestate,
        realestates,
        getRealEstate,
        getRealEstates,
        storeRealEstate,
        updateRealEstate
    }
}