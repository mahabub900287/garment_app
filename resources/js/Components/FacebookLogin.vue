<template>
    <div class="ic__social--auth">
        <a href="/auth/google"> <img :src="'assets/front/images/gmail.svg'" alt="">
            Sign in with Gmail</a>
        <a @click="loginWithFacebook" :style="'cursor: pointer'"><img :src="'assets/front/images/faceb.svg'" alt=""> Sign in
            with Facebook</a>
    </div>
</template>
  
<script>
import "https://connect.facebook.net/en_US/sdk.js";
import { onMounted } from "vue";

export default {
    setup() {
        onMounted(() => {
            // Initialize Facebook SDK
            window.fbAsyncInit = function () {
                FB.init({
                    appId: '822187999192846',
                    cookie: true,
                    xfbml: true,
                    version: 'v17.0'
                });
            };

            (function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "https://connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        });

        // Function to trigger Facebook login
        const loginWithFacebook = () => {
            FB.login(
                function (response) {
                    if (response.authResponse) {
                        // The user has logged in and authorized your app
                        // You can now call the server to handle the login callback
                        handleFacebookCallback();
                    } else {
                        console.log('User cancelled login or did not fully authorize.');
                    }
                },
                { scope: 'public_profile,email' } // Specify the permissions you need
            );
        };

        // Function to handle the login callback on the server (Laravel)
        const handleFacebookCallback = () => {
            // Redirect the user to the Laravel route that handles the callback
            window.location.href = '/auth/facebook';
        };

        return {
            loginWithFacebook,
            handleFacebookCallback,
        };
    },
};

</script>