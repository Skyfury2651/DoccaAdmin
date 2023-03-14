<script setup>
import CardBox from '@/Components/CardBox.vue';
import SectionMain from '@/Components/SectionMain.vue';
import SectionTitleLineWithButton from '@/Components/SectionTitleLineWithButton.vue';
import LayoutAuthenticated from '@/Layouts/LayoutAuthenticated.vue';
import { mdiTelevisionGuide } from '@mdi/js';
</script>

<template>
  <LayoutAuthenticated>
    <SectionMain>
      <SectionTitleLineWithButton
        :icon="mdiTelevisionGuide"
        title="Page title"
        main
      >
      </SectionTitleLineWithButton>
      <CardBox>
        <!-- Content here -->
      </CardBox>
    </SectionMain>
  </LayoutAuthenticated>
</template>
