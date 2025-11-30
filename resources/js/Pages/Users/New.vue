<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/vue3';</script>

<template>
  <AuthenticatedLayout>

    <div class="container mx-auto px-4 py-6">

      <Head title="User details"/>

      <div class="bg-white shadow-lg rounded-lg p-6 max-w-4xl mx-auto">

        <h1 class="text-3xl font-semibold mb-6">New User</h1>

        <form @submit.prevent="submitForm">

          <div class="mb-4">
            <label for="first_name" class="block text-lg font-medium">First Name</label>
            <input
                v-model="user.first_name"
                type="text"
                id="first_name"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg"
                required
            />
          </div>
          <div class="mb-4">
            <label for="last_name" class="block text-lg font-medium">Last Name</label>
            <input
                v-model="user.last_name"
                type="text"
                id="last_name"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg"
                required
            />
          </div>
          <div class="mb-4">
            <label for="email" class="block text-lg font-medium">Email</label>
            <input
                v-model="user.email"
                type="email"
                id="email"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg"
                required
            />
          </div>
          <div class="mb-4">
            <label for="country" class="block text-lg font-medium">Country</label>
            <input
                v-model="user.country"
                type="text"
                id="country"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg"
                required
            />
          </div>
          <div class="mb-4">
            <label for="city" class="block text-lg font-medium">City</label>
            <input
                v-model="user.city"
                type="text"
                id="city"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg"
                required
            />
          </div>
          <div class="mb-4">
            <label for="post_code" class="block text-lg font-medium">Postcode</label>
            <input
                v-model="user.post_code"
                type="text"
                id="post_code"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg"
                required
            />
          </div>
          <div class="mb-4">
            <label for="street" class="block text-lg font-medium">Street</label>
            <input
                v-model="user.street"
                type="text"
                id="street"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg"
                required
            />
          </div>
          <div>
            <button
                type="submit"
                class="px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-indigo-500"
            >
              Create User
            </button>
          </div>
        </form>
      </div>
    </div>

  </AuthenticatedLayout>
</template>

<script>
export default {
  props: {
    user: Object,
  },
  methods: {
    submitForm() {
      this.$inertia.post('/users/', this.user);
    },
  }
}
</script>
