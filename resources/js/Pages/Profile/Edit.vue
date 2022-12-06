<script setup>
import { mdiAccount } from '@mdi/js';
import SectionMain from '@/Components/SectionMain.vue';
import UserCard from '@/Components/UserCard.vue';
import LayoutAuthenticated from '@/Layouts/LayoutAuthenticated.vue';
import SectionTitleLineWithButton from '@/Components/SectionTitleLineWithButton.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';

defineProps({
  mustVerifyEmail: Boolean,
  status: String,
});
</script>

<template>
  <LayoutAuthenticated>
    <SectionMain>
      <SectionTitleLineWithButton
        :icon="mdiAccount"
        title="Profile"
        main
      >
      </SectionTitleLineWithButton>

      <UserCard
        class="mb-6"
        :is-verified="mustVerifyEmail"
      />

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <UpdateProfileInformationForm />

        <UpdatePasswordForm />
      </div>
    </SectionMain>
  </LayoutAuthenticated>
</template>
