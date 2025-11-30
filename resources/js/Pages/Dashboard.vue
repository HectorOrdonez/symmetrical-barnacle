<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/vue3';
import Pagination from '@/Components/Pagination.vue';
</script>

<template>
  <Head title="Dashboard"/>

  <AuthenticatedLayout>

    <div class="container max-w-4xl mx-auto p-4" v-if="users.data.length > 0">
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
          <tr v-for="user in users.data" :key="user.id">
            <td class="border-b border-gray-100 p-4 pl-8 text-gray-500 dark:border-gray-700 dark:text-gray-400">
              {{ user.name }}
            </td>
            <td class="border-b border-gray-100 p-4 pl-8 text-gray-500 dark:border-gray-700 dark:text-gray-400">
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
  }
};

</script>
