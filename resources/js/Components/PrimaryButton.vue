<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
    class: {
        type: String,
        default: '',
    },
});
</script>

<template>
    <button
        :type="type"
        :class="class"
    >
        <slot />
    </button>
</template>
