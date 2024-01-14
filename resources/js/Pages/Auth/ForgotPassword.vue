<script setup>
import FrontendLayout from '@/Layouts/FrontendLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';

defineProps({
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <FrontendLayout>

        
        <template #main>
            <Head title="Forgot Password" />
            <section class="ic-section-space ic-auth-info ic-login-wrap">
                <div class="container">
                    <div class="ic-info-content">
                        <div class="left_content" :style="'background-image: url(/assets/front/images/login-bg.png);'">
                            <div class="logo">
                                <img :src="'/assets/front/images/logo/white-logo.png'" alt="">
                            </div>
                        </div>
                        <div class="right_content">
                            <div>
                                <h3>Forget Password</h3>
                                <div v-if="status" class="mb-4 font-medium text-sm text-green-600 text-info">
                                    {{ status }}
                                </div>
                                <form @submit.prevent="submit" class="ic-form">
                                    <div class="form-group">
                                        <InputLabel for="email" value="Email" />
                                        <TextInput id="email" type="email" class="form-control"
                                            placeholder="Enter your email" v-model="form.email" required autofocus
                                            autocomplete="username" />

                                        <InputError class="mt-2" :message="form.errors.email" />

                                    </div>
                                    <PrimaryButton class="ic-btn w-100" :class="{ 'opacity-25': form.processing }"
                                        :disabled="form.processing">
                                        Email Password Reset Link
                                    </PrimaryButton>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </template>
    </FrontendLayout>
</template>
