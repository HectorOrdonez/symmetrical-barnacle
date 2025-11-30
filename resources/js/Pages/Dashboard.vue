<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, Link} from '@inertiajs/vue3';
import Pagination from '@/Components/Pagination.vue';
</script>

<template>
  <Head title="Dashboard"/>

  <AuthenticatedLayout>


    <div class="container max-w-4xl mx-auto p-4" v-if="users.data.length > 0">
      <Link
          :href="route('users.new')"
          class="text-gray-300 hover:text-indigo-500 font-medium mb-4 block text-lg"
      >Add new user</Link>

      <div class="rounded-xl bg-white/10 inset-ring-white/10 table-fixed">
        <table class="w-full table-auto border-collapse text-sm">
          <thead>
          <tr>
            <th class="border-b border-gray-200 p-4 pb-3 pl-8 text-left font-medium text-gray-400 dark:border-gray-600 dark:text-gray-200">
              Name
            </th>
            <th class="border-b border-gray-200 p-4 pb-3 pl-8 text-left font-medium text-gray-400 dark:border-gray-600 dark:text-gray-200">
              Email
            </th>
          </tr>
          </thead>
          <tbody>
          <tr
              class="cursor-pointer border-b border-gray-100 p-4 text-gray-500 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-500 hover:text-gray-900"
              v-for="user in users.data"
              :key="user.id"
              @click="goToUser(user.id)"
          >
            <td class="pl-8">
              {{ user.first_name }}
            </td>
            <td>
              {{ user.email }}
            </td>
          </tr>
          </tbody>
        </table>

        <Pagination class="pb-4 my-4 justify-center flex" :links="users.links" />
      </div>
    </div>
    <div v-else>
      <p>No users found. This should be an impossible text to read.</p>
    </div>

  </AuthenticatedLayout>
</template>

<script>
export default {
  props: {
    users: Object,
  },
  methods: {
    goToUser(userId) {
      this.$inertia.get('/users/' + userId);
    }
  }
};


</script>
