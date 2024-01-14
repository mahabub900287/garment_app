<script setup>
import FrontendLayout from "@/Layouts/FrontendLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

const form = useForm({
    name: "",
    username: "",
    email: "",
    password: "",
    last_name: "",
    password_confirmation: "",
});

const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>
<template>
    <FrontendLayout>
        <template #main>
            <Head title="Register" />
            <section class="ic-section-space ic-auth-info ic-login-wrap">
                <div class="container">
                    <div class="ic-info-content">
                        <div
                            class="left_content"
                            :style="'background-image: url(/assets/front/images/signup-bg.png);'"
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
                                <h2 class="title">Sign Up</h2>
                                <p class="sub-heading">
                                    Customize this piece to make it your own and
                                    discover how even a small change can make a
                                    big difference.
                                </p>
                            </div>
                            <form @submit.prevent="submit" class="ic-form">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <InputLabel
                                                for="name"
                                                value="First Name"
                                            />

                                            <TextInput
                                                id="name"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your name"
                                                v-model="form.name"
                                                required
                                                autofocus
                                                autocomplete="name"
                                            />

                                            <InputError
                                                class="mt-2"
                                                :message="form.errors.name"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <InputLabel
                                                for="name"
                                                value="Last Name"
                                            />
                                            <TextInput
                                                id="name"
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter your surname"
                                                v-model="form.last_name"
                                                required
                                                autofocus
                                                autocomplete="name"
                                            />

                                            <InputError
                                                class="mt-2"
                                                :message="form.errors.name"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <InputLabel
                                                for="username"
                                                value="Username"
                                            />

                                            <TextInput
                                                id="username"
                                                type="text"
                                                placeholder="Enter your username"
                                                class="form-control"
                                                v-model="form.username"
                                                required
                                                autocomplete="username"
                                            />

                                            <InputError
                                                class="mt-2"
                                                :message="form.errors.username"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <InputLabel
                                                for="email"
                                                value="Email"
                                            />

                                            <TextInput
                                                id="email"
                                                type="email"
                                                placeholder="Enter your email"
                                                class="form-control"
                                                v-model="form.email"
                                                required
                                                autocomplete="email"
                                            />

                                            <InputError
                                                class="mt-2"
                                                :message="form.errors.email"
                                            />
                                        </div>
                                    </div>
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
                                        autocomplete="new-password"
                                    />

                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.password"
                                    />
                                </div>
                                <div class="form-group">
                                    <InputLabel
                                        for="password"
                                        value="Confirm Password"
                                    />

                                    <TextInput
                                        id="password_confirmation"
                                        type="password"
                                        class="form-control"
                                        placeholder="Confirm Password"
                                        v-model="form.password_confirmation"
                                        required
                                    />

                                    <InputError
                                        class="mt-2"
                                        :message="
                                            form.errors.password_confirmation
                                        "
                                    />
                                </div>

                                <div class="form-check">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        value=""
                                        id="flexCheckDefault"
                                    />
                                    <label
                                        class="form-check-label"
                                        for="flexCheckDefault"
                                    >
                                        By registering, you accept our terms of
                                        use and our
                                        <a href="/signup">privacy policy.</a>
                                    </label>
                                </div>

                                <button type="submit" class="ic-btn w-100">
                                    Sign Up
                                </button>

                                <div class="ic_or">
                                    <p class="">OR</p>
                                </div>

                                <div class="ic__social--auth">
                                    <a href="#">
                                        <img
                                            :src="'assets/front/images/gmail.svg'"
                                            alt=""
                                        />
                                        Sign in with Gmail</a
                                    >
                                    <a href="#"
                                        ><img
                                            :src="'assets/front/images/faceb.svg'"
                                            alt=""
                                        />
                                        Sign in with Facebook</a
                                    >
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </template>
    </FrontendLayout>
</template>
