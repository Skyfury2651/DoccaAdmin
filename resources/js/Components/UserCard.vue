<script setup>
import { computed } from 'vue';
import { mdiCheckDecagram, mdiAlertDecagram } from '@mdi/js';
import BaseLevel from '@/Components/BaseLevel.vue';
import UserAvatarCurrentUser from '@/Components/UserAvatarCurrentUser.vue';
import CardBox from '@/Components/CardBox.vue';
import FormCheckRadio from '@/Components/FormCheckRadio.vue';
import PillTag from '@/Components/PillTag.vue';
import { useMainStore } from '@/stores/main';

const { profile } = defineProps({
  isVerified: Boolean,
});

const mainStore = useMainStore();

const user = computed(() => mainStore.getUser);
</script>

<template>
  <CardBox>
    <BaseLevel type="justify-around lg:justify-center">
      <UserAvatarCurrentUser class="lg:mx-12" />
      <div class="space-y-3 text-center md:text-left lg:mx-12">
        <h1 class="text-2xl">
          Howdy, <b>{{ user.name }}</b
          >!
        </h1>
        <div class="flex justify-center md:block">
          <PillTag
            v-if="isVerified"
            label="Verified"
            color="info"
            :icon="mdiCheckDecagram"
          />
          <PillTag
            v-else
            label="Not Verified"
            color="danger"
            :icon="mdiAlertDecagram"
          />
        </div>
      </div>
    </BaseLevel>
  </CardBox>
</template>
