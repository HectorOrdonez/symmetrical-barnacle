<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/vue3';</script>

<template>
  <AuthenticatedLayout>

    <div class="container mx-auto px-4 py-6">

    <Head title="User details"/>

      <div class="bg-white shadow-lg rounded-lg p-6 max-w-4xl mx-auto">

        <h1 class="text-3xl font-semibold mb-6">User Details</h1>

        <p class="text-lg"><strong>Name:</strong> {{ user.first_name + ' ' + user.last_name }}</p>
        <p class="text-lg"><strong>Email:</strong> {{ user.email }}</p>
        <p class="text-lg"><strong>Country:</strong> {{ user.country }}</p>
        <p class="text-lg"><strong>City:</strong> {{ user.city }}</p>
        <p class="text-lg"><strong>Postcode:</strong> {{ user.post_code }}</p>
        <p class="text-lg"><strong>Street:</strong> {{ user.street }}</p>

        <button @click="goBack" class="mt-6 px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-indigo-500">
          Go Back
        </button>
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
    goBack() {
      window.history.back(); // Go back to the previous page
    }
  }
}
</script>
