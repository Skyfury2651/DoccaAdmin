import { defineStore } from 'pinia';
import { usePage } from '@inertiajs/inertia-vue3';

export const useMainStore = defineStore('main', {
  state: () => ({
    /* Field focus with ctrl+k (to register only once) */
    isFieldFocusRegistered: false,

    /* Sample data (commonly used) */
    clients: [],
    history: [],
  }),
  getters: {
    getUser() {
      return usePage().props.value.auth.user;
    },
  },
  actions: {},
});
