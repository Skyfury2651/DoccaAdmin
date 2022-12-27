<script setup>
import { getButtonColor } from '@/colors.js';

const props = defineProps({
  text: {
    type: String,
    required: true,
  },
  color: {
    type: String,
    default: 'info',
  },
});
</script>

<template>
  <div class="group">
    <slot />
    <span
      class="hidden text-center py-2 px-6 absolute z-50 border rounded group-hover:block max-w-[40%] w-auto"
      :class="[getButtonColor(color), width]"
      >{{ text }}</span
    >
  </div>
</template>
