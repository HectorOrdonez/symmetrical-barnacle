<template>
  <Head title="Dashboard"/>

  <AuthenticatedLayout>
    <div class="container max-w-4xl mx-auto p-4">
      <div class="flex justify-between mb-4 font-medium ">
        <Link
            :href="route('users.new')"
            class="mt-2 text-gray-300 hover:text-indigo-500 text-xl">Add new user</Link>
        <input v-model="search" type="text" placeholder="Search..." class="border px-2 rounded-lg">
      </div>

      <div class="rounded-xl bg-white/10 inset-ring-white/10 table-fixed" v-if="users.data.length > 0">
        <table class="w-full table-auto border-collapse text-sm">
          <thead>
          <tr>
            <th class="border-b border-gray-200 p-4 pb-3 pl-8 text-left font-medium text-gray-400 dark:border-gray-600 dark:text-gray-200">
              First name
            </th>
            <th class="border-b border-gray-200 p-4 pb-3 pl-8 text-left font-medium text-gray-400 dark:border-gray-600 dark:text-gray-200">
              Last name
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
            <td class="pl-8">
              {{ user.last_name }}
            </td>
            <td>
              {{ user.email }}
            </td>
          </tr>
          </tbody>
        </table>

        <Pagination class="pb-4 my-4 justify-center flex" :links="users.links" />
      </div>
      <div v-else>
        <p class="text-gray-200">No users found. This should be an impossible text to read.</p>
      </div>
    </div>

  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, Link} from '@inertiajs/vue3';
import Pagination from '@/Components/Pagination.vue';
import {ref, watch} from "vue";
import { router } from "@inertiajs/vue3";
import debounce from 'lodash/debounce';

const props = defineProps({
  users: Object,
  filters: Object,
});

let search = ref(props.filters.search);

watch(search, debounce(function(value) {
  router.get('/dashboard', {search: value}, {preserveState: true, preserveScroll: true, replace: true});
}, 1000));
</script>
<script>
export default {
  methods: {
    goToUser(userId) {
      this.$inertia.get('/users/' + userId);
    }
  }
};
</script>
