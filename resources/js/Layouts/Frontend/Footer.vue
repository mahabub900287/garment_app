<script setup>
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm, usePage } from "@inertiajs/vue3";

const settings = usePage().props.settings;
const form = useForm({
    email: "",
});
import { useToast } from "primevue/usetoast";
const toast = useToast();
const submit = () => {
    let newsletter = form.post(route("front.newsletter"), {
        onSuccess: (response) => {
            toast.add({
                severity: "success",
                summary: "success",
                detail: "Newsletter Subscribed Successfully",
                life: 3000,
            });
            form.reset("email");
        },
    });
};
</script>
<template>
    <a href="#" class="back-to-top"><i class="ri-arrow-drop-up-line"></i></a>
    <footer class="ic-footer-heads">
        <div class="container">
            <div class="ic-newsletter">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="ic-news-content">
                            <h1 class="color-gray2">Newsletter</h1>
                            <p class="color-gray2">
                                Subscribe to our weekly Newsletter and receive
                                latest discounts and coupons.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <form
                            @submit.prevent="submit"
                            class="ic-forms-newsletter"
                        >
                            <TextInput
                                type="email"
                                placeholder="Enter your email"
                                v-model="form.email"
                                required
                                autofocus
                            />
                            <PrimaryButton
                                :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing"
                            >
                                Subscribe
                            </PrimaryButton>
                            <Toast />
                        </form>
                    </div>
                </div>
            </div>
            <div class="ic-main-footer-content pt-35">
                <div class="ic-footer-content-left">
                    <img
                        :src="'/assets/front/images/logo/footer-logo.png'"
                        class="mb-15"
                        alt="footer logo"
                    />
                    <p class="color-gray2 mb-40">
                        Voltranex llc helps you save money while shopping online
                        and in-store at your favorite retailers. Whether you're
                        looking for a promo code, a coupon, a free shipping
                        offer or the latest sales,
                    </p>
                    <ul class="social-media">
                        <li>
                            <a href="#"><i class="ri-facebook-fill"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="ri-linkedin-fill"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="ri-instagram-line"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="ri-twitter-line"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="ic-footer-content-right">
                    <div class="ic-footer-items">
                        <h3 class="color-white">Discover Offer</h3>
                        <ul>
                            <li>
                                <Link :href="route('front.category')"
                                    >Explore Categories</Link
                                >
                            </li>
                            <!-- <li>
                                <a href="#">Special Bargains</a>
                            </li>
                            <li>
                                <a href="#">Price Comparisons</a>
                            </li> -->
                            <li>
                                <Link :href="route('front.top-deals')"
                                    >Top Deals</Link
                                >
                            </li>
                            <!-- <li>
                                <a href="#">Cashback offers</a>
                            </li> -->
                        </ul>
                    </div>
                    <div class="ic-footer-items">
                        <h3 class="color-white">Engage With Us</h3>
                        <ul>
                            <li>
                                <Link :href="route('front.submit.coupon')"
                                    >Submit a Coupon</Link
                                >
                            </li>
                            <li>
                                <Link :href="route('front.communitycoupon')"
                                    >Community Hub</Link
                                >
                            </li>
                            <!-- <li><a href="">Provide Feedback</a></li> -->
                            <li>
                                <Link :href="route('front.help')"
                                    >Help Lobby</Link
                                >
                            </li>
                            <li>
                                <Link :href="route('front.contact')"
                                    >Contact Us</Link
                                >
                            </li>
                        </ul>
                    </div>
                    <div class="ic-footer-items">
                        <h3 class="color-white">Our Business</h3>
                        <ul>
                            <li>
                                <Link :href="route('front.about')"
                                    >About Us</Link
                                >
                            </li>
                            <!-- <li><a href="#">Careers</a></li> -->
                            <li>
                                <Link :href="route('front.blog')"
                                    >Our Blog</Link
                                >
                            </li>
                            <li>
                                <Link :href="route('front.pricecomparison')"
                                    >Price Comparisons</Link
                                >
                            </li>
                            <li>
                                <Link :href="route('front.productPrice')"
                                    >Product Price</Link
                                >
                            </li>
                            <!-- <li><a href="#">Our Partnerships</a></li> -->
                        </ul>
                    </div>
                    <div class="ic-footer-items">
                        <h3 class="color-white">Legal</h3>
                        <ul>
                            <li>
                                <Link :href="route('front.privacypolicy')"
                                    >Privacy Policy</Link
                                >
                            </li>
                            <li>
                                <Link :href="route('front.tram-and-condition')"
                                    >Terms & Conditions</Link
                                >
                            </li>
                            <!-- <li>
                                <a href="">Disclosure Policy</a>
                            </li>
                            <li><a href="#">Cookies Policy</a></li> -->
                        </ul>
                    </div>
                    <div class="ic-footer-items">
                        <h3 class="color-white">General Info</h3>
                        <ul>
                            <li>
                                <Link :href="route('user.home')"
                                    >My Profile</Link
                                >
                            </li>
                            <li><Link :href="route('front.faq')">FAQ</Link></li>
                            <li>
                                <Link :href="route('front.community')"
                                    >Community</Link
                                >
                            </li>
                            <!-- <li>
                                <a href="">Site Map</a>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="ic-copyright">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 order-2 order-md-1">
                    <p class="color-white text-center text-md-start pb-md-0">
                        All Rights Reserved @
                        <a href="" class="color-white">Voltranex LLC</a>
                        Design & Developed By.
                        <a
                            href="https://itclanbd.com/"
                            target="_blank"
                            class="text-info"
                        >
                            ITclan BD
                        </a>
                    </p>
                </div>
                <div
                    class="col-lg-6 col-md-6 order-1 order-md-2 mb-3 mb-md-0 text-md-end text-center"
                >
                    <a href="#"
                        ><img
                            :src="'/assets/front/images/payment.png'"
                            class="img-fluid"
                            alt="payment image"
                    /></a>
                </div>
            </div>
        </div>
    </div>
</template>
