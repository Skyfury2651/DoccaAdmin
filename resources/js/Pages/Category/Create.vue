<script setup>
import { mdiBallotOutline, mdiArrowLeft } from '@mdi/js';
import SectionMain from '@/Components/SectionMain.vue';
import BaseButton from '@/Components/BaseButton.vue';
import Form from './Partials/Form.vue';
import LayoutAuthenticated from '@/Layouts/LayoutAuthenticated.vue';
import SectionTitleLineWithButton from '@/Components/SectionTitleLineWithButton.vue';
import { useForm } from '@inertiajs/inertia-vue3';
import { goBack } from '@/Utils/utils';

const click = () => {
  goBack();
};

const form = useForm({
  name: '',
  slug: '',
});

const submitForm = (value) => {
  form.post(route('category.store'), {
    onFinish: () => {
      // TODO: Handle success created
    },
    onError: (error) => {
      console.log(error);
    },
  });
};
</script>

<template>
  <LayoutAuthenticated>
    <SectionMain>
      <SectionTitleLineWithButton
        :icon="mdiBallotOutline"
        title="Create Category"
        main
      >
        <BaseButton
          :icon="mdiArrowLeft"
          label="Back"
          color="info"
          outline
          rounded-full
          @click="click"
        />
      </SectionTitleLineWithButton>

      <Form
        v-model="form"
        @submitForm="submitForm"
      ></Form>
    </SectionMain>
  </LayoutAuthenticated>
</template>
