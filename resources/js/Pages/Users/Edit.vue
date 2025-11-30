<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Fields from './Partials/Fields.vue';
import {Head} from '@inertiajs/vue3';</script>

<template>
  <AuthenticatedLayout>

    <div class="container mx-auto px-4 py-6">

      <Head title="User details"/>

      <div class="bg-white shadow-lg rounded-lg p-6 max-w-4xl mx-auto">

        <h1 class="text-3xl font-semibold mb-6">Edit User</h1>

        <form @submit.prevent="submitForm">

          <Fields :user="user"></Fields>

          <div>
            <button
                type="submit"
                class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-indigo-500">
              Update User
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
      this.$inertia.put('/users/' + this.user.id, this.user);
    },
  }
}
</script>
