<script setup>
import Checkbox from "@/Components/Checkbox.vue";
import FrontendLayout from "@/Layouts/FrontendLayout.vue";
import InputError from "@/Components/InputError.vue";
import FacebookLogin from "@/Components/FacebookLogin.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email_or_username: "",
    password: "",
    remember: false,
});

const submit = () => {
    let login = form.post(route("login"), {
        onSuccess: (response) => {
            console.log("test");
            const user = response;
            console.log(user); // Display user information in the console
            form.reset("password");
        },
    });
};
</script>

<template>
    <FrontendLayout>
        <!-- Register Here -->
        <template #main>
            <Head title="Log In" />
            <section class="ic-section-space ic-auth-info ic-login-wrap">
                <div class="container">
                    <div class="ic-info-content">
                        <div
                            class="left_content"
                            :style="'background-image: url(/assets/front/images/login-bg.png);'"
                        >
                            <div class="logo">
                                <img
                                    :src="'/assets/front/images/logo/white-logo.png'"
                                    alt=""
                                />
                            </div>
                        </div>
                        <div class="right_content">
                            <div class="top-section">
                                <h2 class="title">Login</h2>
                                <p class="sub-heading">
                                    Customize this piece to make it your own and
                                    discover how even a small change can make a
                                    big difference.
                                </p>
                            </div>
                            <div
                                v-if="status"
                                class="mb-4 font-medium text-sm text-green-600 text-info"
                            >
                                {{ status }}
                            </div>
                            <form @submit.prevent="submit" class="ic-form">
                                <div class="form-group">
                                    <InputLabel for="email" value="Email" />
                                    <TextInput
                                        id="email"
                                        type="text"
                                        class="form-control"
                                        placeholder="Enter your email"
                                        v-model="form.email_or_username"
                                        required
                                        autofocus
                                        autocomplete="username"
                                    />

                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.email_or_username"
                                    />
                                </div>
                                <div class="form-group">
                                    <InputLabel
                                        for="password"
                                        value="Password"
                                    />
                                    <TextInput
                                        id="password"
                                        type="password"
                                        class="form-control"
                                        placeholder="Password"
                                        v-model="form.password"
                                        required
                                        autocomplete="current-password"
                                    />

                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.password"
                                    />
                                </div>

                                <div
                                    class="ic__account--ask d-flex justify-content-between"
                                >
                                    <p>
                                        Don’t have an account?
                                        <Link href="/register">Sign Up</Link>
                                    </p>

                                    <Link
                                        v-if="canResetPassword"
                                        :href="route('password.request')"
                                        class=""
                                    >
                                        Forgot Password?
                                    </Link>
                                </div>

                                <PrimaryButton
                                    class="ic-btn w-100"
                                    :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing"
                                >
                                    Sign In
                                </PrimaryButton>
                                <div class="ic_or">
                                    <p class="">OR</p>
                                </div>
                                <FacebookLogin></FacebookLogin>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </template>
    </FrontendLayout>
</template>
<script>
export default {
    methods: {
        redirectToGoogle() {
            window.location.href = "/auth/google";
        },
        redirectToFacebook() {
            window.location.href = "/auth/facebook";
        },
    },
};
</script>
