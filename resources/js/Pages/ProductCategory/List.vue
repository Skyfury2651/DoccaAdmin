<script setup>
import BaseButton from '@/Components/BaseButton.vue';
import BaseButtons from '@/Components/BaseButtons.vue';
import CardBox from '@/Components/CardBox.vue';
import CardBoxModal from '@/Components/CardBoxModal.vue';
import SectionMain from '@/Components/SectionMain.vue';
import SectionTitleLineWithButton from '@/Components/SectionTitleLineWithButton.vue';
import LayoutAuthenticated from '@/Layouts/LayoutAuthenticated.vue';
import { Inertia } from '@inertiajs/inertia';
import { mdiEye, mdiShape, mdiTrashCan } from '@mdi/js';
import { computed, ref, watch } from 'vue';

const { categories } = defineProps({
  categories: {
    type: Object,
  },
});
const { data } = categories;
const isModalDeleteActive = ref(false);
const deleteData = ref(null);
const categoryList = ref(data);

const setDeleteData = (category, index) => {
  deleteData.value = { ...category, index };
};

watch(isModalDeleteActive, (newValue) => {
  if (!newValue) {
    deleteData.value = null;
  }
});

const deleteCategory = () => {
  Inertia.delete(
    route('product.category.destroy', { id: deleteData.value.id }),
    {
      onSuccess: () => {
        removeCategoryFromList(deleteData.value.id);
      },
      onError: () => {
        // TODO: handle error delete
      },
      onFinish: () => {
        isModalDeleteActive.value = false;
      },
    }
  );
};

const removeCategoryFromList = (id) => {
  categoryList.value = categoryList.value.filter(
    (category) => category.id !== id
  );
};
</script>

<template>
  <LayoutAuthenticated>
    <SectionMain>
      <SectionTitleLineWithButton
        :icon="mdiShape"
        title="Category List"
        main
      >
        <BaseButton
          color="info"
          label="New Category"
          :rounded-full="true"
          :href="route('product.category.create')"
        />
      </SectionTitleLineWithButton>
      <CardBox
        class="mb-6"
        has-table
      >
        <CardBoxModal
          v-if="deleteData"
          v-model="isModalDeleteActive"
          title="Delete category"
        >
          Do you want to delete category
          <span class="text-red-500">{{ deleteData.name }}</span
          >?
          <template v-slot:actionButtons>
            <BaseButtons type="justify-center lg:justify-end">
              <BaseButton
                label="Yes"
                color="danger"
                @click="deleteCategory"
              />
              <BaseButton
                label="Cancel"
                outline
                color="info"
                @click="isModalDeleteActive = false"
              />
            </BaseButtons>
          </template>
        </CardBoxModal>
        <table>
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Slug</th>
              <th>Created by</th>
              <th>Updated by</th>
              <th>Created at</th>
              <th>Updated at</th>
              <th />
            </tr>
          </thead>
          <tbody>
            <tr
              v-for="(category, index) in categoryList"
              :key="category.id"
            >
              <td data-label="#">
                {{ index + 1 }}
              </td>
              <td data-label="Name">
                {{ category.name }}
              </td>
              <td data-label="Slug">
                {{ category.slug }}
              </td>
              <td data-label="Created by">
                {{ category.created_by.name }}
              </td>
              <td data-label="Updated by">
                {{ category.updated_by.name }}
              </td>
              <td
                data-label="Created at"
                class="lg:w-1 whitespace-nowrap"
              >
                <small
                  class="text-gray-500 dark:text-slate-400"
                  :title="category.created_at"
                  >{{ category.created_at }}</small
                >
              </td>
              <td
                data-label="Updated at"
                class="lg:w-1 whitespace-nowrap"
              >
                <small
                  class="text-gray-500 dark:text-slate-400"
                  :title="category.updated_at"
                  >{{ category.updated_at }}</small
                >
              </td>
              <td class="before:hidden lg:w-1 whitespace-nowrap justify-end">
                <BaseButtons
                  type="justify-end"
                  no-wrap
                >
                  <BaseButton
                    color="info"
                    :icon="mdiEye"
                    small
                    :href="route('product.category.edit', { id: category.id })"
                  />
                  <BaseButton
                    color="danger"
                    :icon="mdiTrashCan"
                    small
                    @click="
                      setDeleteData(category, index);
                      isModalDeleteActive = true;
                    "
                  />
                </BaseButtons>
              </td>
            </tr>
          </tbody>
        </table>
      </CardBox>
    </SectionMain>
  </LayoutAuthenticated>
</template>
