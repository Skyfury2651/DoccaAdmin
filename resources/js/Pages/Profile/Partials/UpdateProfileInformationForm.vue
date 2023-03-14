<script setup>
import FormFilePicker from '@/Components/FormFilePicker.vue';
import BaseButtons from '@/Components/BaseButtons.vue';
import FormControl from '@/Components/FormControl.vue';
import BaseButton from '@/Components/BaseButton.vue';
import FormField from '@/Components/FormField.vue';
import CardBox from '@/Components/CardBox.vue';

import { mdiAccount, mdiMail } from '@mdi/js';
import { useForm, usePage } from '@inertiajs/vue3';

const user = usePage().props.auth.user;

const profileForm = useForm({
  name: user.name,
  email: user.email,
});
</script>

<template>
  <CardBox
    is-form
    @submit.prevent="profileForm.patch(route('profile.update'))"
  >
    <!-- TODO: Upload avatar -->
    <!-- <FormField
        label="Avatar"
        help="Max 500kb"
      >
        <FormFilePicker label="Upload" />
      </FormField> -->

    <FormField
      label="Name"
      help="Required. Your name"
      :error="profileForm.errors.name"
    >
      <FormControl
        v-model="profileForm.name"
        :icon="mdiAccount"
        name="username"
        required
        autocomplete="username"
      />
    </FormField>
    <FormField
      label="E-mail"
      help="Required. Your e-mail"
      :error="profileForm.errors.email"
    >
      <FormControl
        v-model="profileForm.email"
        :icon="mdiMail"
        type="email"
        name="email"
        required
        autocomplete="email"
      />
    </FormField>

    <template #footer>
      <BaseButtons>
        <BaseButton
          color="info"
          type="submit"
          label="Submit"
        />
      </BaseButtons>
    </template>
  </CardBox>
</template>
