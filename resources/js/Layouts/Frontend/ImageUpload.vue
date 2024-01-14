<script>
import { onMounted } from "vue";
import axios from "axios";
import { Head, useForm, usePage } from "@inertiajs/vue3";
export default {
    mounted() {
        // upload image
        const fileInput = document.getElementById("fileUpload");
        const imgElement = document.getElementById("userImg");
        if (fileInput && imgElement) {
            fileInput.addEventListener("change", (event) => {
                const file = event.target.files[0];
                const reader = new FileReader();
                reader.onload = function (e) {
                    imgElement.src = e.target.result;
                    localStorage.setItem("userImage", e.target.result);
                };
                reader.readAsDataURL(file);
            });
        }
        if (localStorage.getItem("userImage")) {
        }
    },
    methods: {
        handleImageChange(event) {
            const user = usePage().props.auth.user;
            const file = event.target.files[0];
            const formData = new FormData();
            formData.append("avatar", file);

            // Make a POST request to your backend API endpoint to update the image in the database
            axios
                .post("update-image/" + user.id, formData, {
                    headers: {
                        "Content-Type": "multipart/form-data",
                    },
                })
                .then((response) => {
                    // Handle the response if needed
                    console.log("Image updated successfully:", response.data);
                })
                .catch((error) => {
                    // Handle the error if something goes wrong
                    console.error("Error updating image:", error);
                });
        },
    },
};
</script>
<template>
    <!-- user info -->
    <div class="card user-info">
        <div class="user-image">
            <img
                :src="
                    $page.props.auth.user.avatar != null
                        ? '/storage/user/' + $page.props.auth.user.avatar
                        : '/images/user_default.png'
                "
                id="userImg"
                alt="user image"
            />
            <div class="edit-image">
                <label for="fileUpload">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                    >
                        <path
                            d="M12 20H21"
                            stroke="#00AEB6"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                        <path
                            d="M16.5 3.50001C16.8978 3.10219 17.4374 2.87869 18 2.87869C18.2786 2.87869 18.5544 2.93356 18.8118 3.04017C19.0692 3.14677 19.303 3.30303 19.5 3.50001C19.697 3.697 19.8532 3.93085 19.9598 4.18822C20.0665 4.44559 20.1213 4.72144 20.1213 5.00001C20.1213 5.27859 20.0665 5.55444 19.9598 5.81181C19.8532 6.06918 19.697 6.30303 19.5 6.50001L7 19L3 20L4 16L16.5 3.50001Z"
                            stroke="#00AEB6"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </svg>
                </label>
                <input
                    type="file"
                    id="fileUpload"
                    name="avatar"
                    @change="handleImageChange"
                    style="display: none"
                />
            </div>
        </div>
        <h2 class="user-name">
            {{
                $page.props.auth.user.name.charAt(0).toUpperCase() +
                $page.props.auth.user.name.slice(1) +
                ($page.props.auth.user.last_name
                    ? " " +
                      $page.props.auth.user.last_name.charAt(0).toUpperCase() +
                      $page.props.auth.user.last_name.slice(1)
                    : "")
            }}
        </h2>
        <h4 class="user-gmail">{{ $page.props.auth.user.email }}</h4>
        <div class="user-earn-info">
            <div class="reward mb-sm-2 mb-3">
                <h4>Approved Rewards</h4>
                <h4><span class="price">$0.00</span></h4>
            </div>
            <div class="savings">
                <h4>Lifetime Savings</h4>
                <h4><span class="price">$0.00</span></h4>
            </div>
        </div>
    </div>
</template>
