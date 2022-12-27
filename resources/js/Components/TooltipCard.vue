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
  width: {
    type: String,
    default: 'w-1/3',
  },
});
</script>

<template>
  <div class="group">
    <slot />

    <span
      class="tooltip-text hidden text-center py-2 px-6 absolute z-50 border rounded -mt-16 group-hover:block"
      :class="[getButtonColor(color), width]"
      >{{ text }}</span
    >
  </div>
</template>
