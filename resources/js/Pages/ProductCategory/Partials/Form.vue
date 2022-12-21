<script setup>
import { defineProps, defineEmits, computed } from 'vue';
import { mdiAccount, mdiLink } from '@mdi/js';
import CardBox from '@/Components/CardBox.vue';
import FormField from '@/Components/FormField.vue';
import FormControl from '@/Components/FormControl.vue';
import BaseButton from '@/Components/BaseButton.vue';
import BaseButtons from '@/Components/BaseButtons.vue';
import { generateSlug } from '@/Utils/string';

const props = defineProps({
  modelValue: {
    type: [Object],
    default: {
      name: '',
      slug: '',
    },
  },
});

const emit = defineEmits(['update:modelValue', 'submitForm']);
const computedValue = computed({
  get: () => props.modelValue,
  set: (value) => {
    emit('update:modelValue', value);
  },
});

const submit = () => {
  emit('submitForm', computedValue);
};

const changeName = () => {
  createSlug();
};

const createSlug = ($event) => {
  const value = $event ? props.modelValue.slug : props.modelValue.name;
  const lowerCase = value.toString().toLowerCase();
  props.modelValue.slug = generateSlug(lowerCase);
};
</script>

<template>
  <CardBox
    is-form
    @submit.prevent="submit"
  >
    <FormField label="Name">
      <FormControl
        v-model="computedValue.name"
        :icon="mdiAccount"
        @input="changeName"
      />
    </FormField>
    <FormField
      label="Slug"
      help="Auto generate from name"
    >
      <FormControl
        v-model="computedValue.slug"
        :icon="mdiLink"
        @blur="createSlug"
      />
    </FormField>

    <template #footer>
      <BaseButtons class="justify-center">
        <BaseButton
          type="submit"
          color="info"
          label="Submit"
          rounded-full
        />
        <BaseButton
          type="reset"
          color="info"
          outline
          label="Reset"
          rounded-full
        />
      </BaseButtons>
    </template>
  </CardBox>
</template>
