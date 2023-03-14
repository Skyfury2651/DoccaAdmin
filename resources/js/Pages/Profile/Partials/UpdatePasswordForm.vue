<template>
  <CardBox
    is-form
    @submit.prevent="submitPass"
  >
    <FormField
      label="Current password"
      help="Required. Your current password"
      :error="passwordForm.errors.current_password"
    >
      <FormControl
        v-model="passwordForm.current_password"
        :icon="mdiAsterisk"
        name="password_current"
        type="password"
        required
        autocomplete="current-password"
      />
    </FormField>

    <BaseDivider />

    <FormField
      label="New password"
      help="Required. New password"
      :error="passwordForm.errors.password"
    >
      <FormControl
        v-model="passwordForm.password"
        :icon="mdiFormTextboxPassword"
        name="password"
        type="password"
        required
        autocomplete="new-password"
      />
    </FormField>

    <FormField
      label="Confirm password"
      help="Required. New password one more time"
      :error="passwordForm.errors.password_confirmation"
    >
      <FormControl
        v-model="passwordForm.password_confirmation"
        :icon="mdiFormTextboxPassword"
        name="password_confirmation"
        type="password"
        required
        autocomplete="new-password"
      />
    </FormField>

    <template #footer>
      <BaseButtons>
        <BaseButton
          type="submit"
          color="info"
          label="Submit"
        />
      </BaseButtons>
    </template>
  </CardBox>
</template>

<script setup>
import { mdiAsterisk, mdiFormTextboxPassword } from '@mdi/js';
import CardBox from '@/Components/CardBox.vue';
import BaseDivider from '@/Components/BaseDivider.vue';
import FormField from '@/Components/FormField.vue';
import FormControl from '@/Components/FormControl.vue';
import BaseButton from '@/Components/BaseButton.vue';
import BaseButtons from '@/Components/BaseButtons.vue';
import { useForm } from '@inertiajs/vue3';

const passwordForm = useForm({
  current_password: '',
  password: '',
  password_confirmation: '',
});

const submitPass = () => {
  passwordForm.put(route('password.update'), {
    preserveScroll: true,
    onSuccess: () => passwordForm.reset(),
    onError: () => {
      if (passwordForm.errors.password) {
        passwordForm.reset('password', 'password_confirmation');
        // passwordInput.value.focus();
      }
      if (passwordForm.errors.current_password) {
        passwordForm.reset('current_password');
        // currentPasswordInput.value.focus();
      }
    },
  });
};
</script>

<style lang="scss" scoped></style>
