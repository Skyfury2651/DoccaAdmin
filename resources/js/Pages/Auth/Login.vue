<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />

        <div class="auth-form-wrapper px-4 py-5">
            <a
                href="#"
                class="noble-ui-logo d-block mb-2"
                >Noble<span>UI</span></a
            >
            <h5 class="text-muted fw-normal mb-4">
                Welcome back! Log in to your account.
            </h5>
            <form @submit.prevent="submit">
                <div class="mb-3">
                    <InputLabel
                        for="email"
                        value="Email address"
                        class="form-label"
                    />

                    <TextInput
                        id="email"
                        type="email"
                        class="form-control"
                        v-model="form.email"
                        required
                        autofocus
                        autocomplete="email"
                        placeholder="Email"
                    />

                    <InputError
                        class="mt-2"
                        :message="form.errors.email"
                    />
                </div>
                <div class="mb-3">
                    <InputLabel
                        for="password"
                        value="Password"
                        class="form-label"
                    />

                    <TextInput
                        id="password"
                        type="password"
                        class="form-control"
                        v-model="form.password"
                        required
                        autocomplete="current-password"
                        placeholder="Password"
                    />

                    <InputError
                        class="mt-2"
                        :message="form.errors.password"
                    />
                </div>
                <div>
                    <PrimaryButton
                        class="btn btn-primary me-2 mb-2 mb-md-0 text-white"
                        :disabled="form.processing"
                    >
                        Log in
                    </PrimaryButton>
                </div>
                <Link
                    :href="route('register')"
                    class="d-block mt-3 text-muted"
                >
                    Not a user? Sign up
                </Link>
            </form>
        </div>
    </GuestLayout>
</template>
