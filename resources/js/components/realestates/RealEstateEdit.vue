<template>
    <div class="mt-2 mb-6 text-sm text-red-600" v-if="errors !== ''">
        {{ errors }}
    </div>

    <form class="space-y-6" v-on:submit.prevent="saveRealEstate">
        <div class="space-y-4 rounded-md shadow-sm">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <div class="mt-1">
                    <input type="text" name="name" required
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="realestate.name">
                </div>
            </div>

            <div>
                <label for="real_state_type" class="block text-sm font-medium text-gray-700">Real Estate Type</label>
                <div class="mt-1">
                    <select type="text" name="real_state_type" required
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="realestate.real_state_type">
                           <option disabled value="">Please select one type</option>
                           <option value="house">House</option>
                           <option value="department">Department</option>
                           <option value="land">Land</option>
                           <option value="commercial_ground">Commercial Ground</option>
                    </select>
                </div>
            </div>

            <div>
                <label for="street" class="block text-sm font-medium text-gray-700">Street</label>
                <div class="mt-1">
                    <input type="text" name="street" required
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="realestate.street">
                </div>
            </div>

            <div>
                <label for="external_number" class="block text-sm font-medium text-gray-700">External Number</label>
                <div class="mt-1">
                    <input type="text" name="external_number" required
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="realestate.external_number">
                </div>
            </div>

            <div>
                <label for="internal_number" class="block text-sm font-medium text-gray-700">Internal Number</label>
                <div class="mt-1">
                    <input type="text" name="internal_number"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="realestate.internal_number">
                </div>
            </div>

            <div>
                <label for="neighborhood" class="block text-sm font-medium text-gray-700">Neighborhood</label>
                <div class="mt-1">
                    <input type="text" name="neighborhood" required
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="realestate.neighborhood">
                </div>
            </div>

            <div>
                <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                <div class="mt-1">
                    <input type="text" name="city" required
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="realestate.city">
                </div>
            </div>

            <div>
                <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                <div class="mt-1">
                    <select type="text" name="country" required
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="realestate.country">
                        <option disabled value="">Please select one type</option>
                        <option value="MX">MX</option>
                        <option value="US">US</option>
                        <option value="JP">JP</option>
                        <option value="UK">UK</option>
                    </select>
                </div>
            </div>

            <div>
                <label for="rooms" class="block text-sm font-medium text-gray-700">Rooms</label>
                <div class="mt-1">
                    <input type="number" name="rooms" required
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="realestate.rooms">
                </div>
            </div>

            <div>
                <label for="bathrooms" class="block text-sm font-medium text-gray-700">Bathrooms</label>
                <div class="mt-1">
                    <input type="number" name="bathrooms" required
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="realestate.bathrooms">
                </div>
            </div>

            <div>
                <label for="comments" class="block text-sm font-medium text-gray-700">Comments</label>
                <div class="mt-1">
                    <textarea type="text" name="comments"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="realestate.comments">
                    </textarea>
                </div>
            </div>
        </div>
        <div class="col mt-2">
            <button type="submit"
                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 rounded-md border border-transparent ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25">
                Update
            </button>
            <router-link :to="{ name: 'realestates.index'}" class="bg-transparent ml-2 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                Go back
            </router-link>
        </div>
        
    </form>
</template>

<script>
import useRealEstates from '../../composables/realestates'
import { onMounted } from 'vue';

export default {
    props: {
        id: {
            required: true,
            type: String
        }
    },

    setup(props) {
        const { errors, realestate, updateRealEstate, getRealEstate } = useRealEstates()

        onMounted(() => getRealEstate(props.id))

        const saveRealEstate = async () => {
            await updateRealEstate(props.id)
        }

        return {
            errors,
            realestate,
            saveRealEstate
        }
    }
}
</script>