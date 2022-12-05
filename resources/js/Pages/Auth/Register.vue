<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Register" />

        <div class="auth-form-wrapper px-4 py-5">
            <a
                href="#"
                class="noble-ui-logo d-block mb-2"
                >Noble<span>UI</span></a
            >
            <h5 class="text-muted fw-normal mb-4">Create a free account.</h5>
            <form @submit.prevent="submit">
                <div class="mb-3">
                    <InputLabel
                        for="name"
                        value="Name"
                        class="form-label"
                    />

                    <TextInput
                        id="name"
                        type="text"
                        class="form-control"
                        v-model="form.name"
                        required
                        autocomplete="name"
                        placeholder="Name"
                    />

                    <InputError
                        class="mt-2"
                        :message="form.errors.name"
                    />
                </div>

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
                <div class="mb-3">
                    <InputLabel
                        for="password_confirmation"
                        value="Confirm Password"
                        class="form-label"
                    />

                    <TextInput
                        id="password_confirmation"
                        type="password"
                        class="form-control"
                        v-model="form.password_confirmation"
                        required
                        autocomplete="new-password"
                        placeholder="Confirm Password"
                    />

                    <InputError
                        class="mt-2"
                        :message="form.errors.password_confirmation"
                    />
                </div>
                <div>
                    <PrimaryButton
                        class="btn btn-primary me-2 mb-2 mb-md-0 text-white"
                        :disabled="form.processing"
                    >
                        Sign up
                    </PrimaryButton>
                </div>
                <Link
                    :href="route('login')"
                    class="d-block mt-3 text-muted"
                >
                    Already registered?
                </Link>
            </form>
        </div>
    </GuestLayout>
</template>
