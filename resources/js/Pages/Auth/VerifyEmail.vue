<script setup>
import { computed } from 'vue';
import FrontendLayout from '@/Layouts/FrontendLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    status: {
        type: String,
    },
});

const form = useForm({});

const submit = () => {
    form.post(route('verification.send'));
};

const verificationLinkSent = computed(() => props.status === 'verification-link-sent');
</script>

<template>
    <FrontendLayout>
        <template #main>

            <Head title="Email Verification" />

            <!-- <div class="mb-4 text-sm text-gray-600">
                        Thanks for signing up! Before getting started, could you verify your email address by clicking on the link
                        we just emailed to you? If you didn't receive the email, we will gladly send you another.
                    </div>

                    <div class="mb-4 font-medium text-sm text-green-600" v-if="verificationLinkSent">
                        A new verification link has been sent to the email address you provided during registration.
                    </div>

                    <form @submit.prevent="submit">
                        <div class="mt-4 flex items-center justify-between">
                            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Resend Verification Email
                            </PrimaryButton>

                            <Link
                                :href="route('logout')"
                                method="post"
                                as="button"
                                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                >Log Out</Link
                            >
                        </div>
                    </form> -->
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
                                <div class="mb-4 text-sm text-gray-600">
                                    Thanks for signing up! Before getting started, could you verify your email address by
                                    clicking on the link
                                    we just emailed to you? If you didn't receive the email, we will gladly send you
                                    another.
                                </div>

                                <div class="mb-4 font-medium text-sm text-green-600" v-if="verificationLinkSent">
                                    A new verification link has been sent to the email address you provided during
                                    registration.
                                </div>
                                <form @submit.prevent="submit">
                                    <PrimaryButton class="ic-btn w-100" :class="{ 'opacity-25': form.processing }"
                                        :disabled="form.processing">
                                        Resend Verification Email
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
