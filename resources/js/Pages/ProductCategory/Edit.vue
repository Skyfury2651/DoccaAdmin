<script setup>
import { mdiBallotOutline, mdiArrowLeft } from '@mdi/js';
import SectionMain from '@/Components/SectionMain.vue';
import BaseButton from '@/Components/BaseButton.vue';
import Form from './Partials/Form.vue';
import LayoutAuthenticated from '@/Layouts/LayoutAuthenticated.vue';
import SectionTitleLineWithButton from '@/Components/SectionTitleLineWithButton.vue';
import { useForm } from '@inertiajs/inertia-vue3';
import { goBack } from '@/Utils/utils';

const { category } = defineProps({
  category: {
    type: Object,
  },
});

const click = () => {
  goBack();
};

const form = useForm({
  name: category.name,
  slug: category.slug,
});

const submitForm = (value) => {
  form.patch(route('product.category.update', { id: category.id }), {
    onFinish: () => {
      // TODO: Handle success updated
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
        title="Edit Category"
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
