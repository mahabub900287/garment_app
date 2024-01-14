<template>
    <div class="modal-overlay" v-if="showModal">
        <div class="modal-content">
            <h1>Delete Account</h1>
            <p>
                Deleting your account will wipe out all the information related
                to your account. Yes, everything. If you’re sure you want to
                leave us forever, then proceed. We’ll miss you!
            </p>
            <div class="modal-actions mt-3">
                <button @click="cancelDelete" class="btn btn-outline-info me-2">
                    Cancel
                </button>
                <button @click="confirmDelete" class="btn btn-outline-danger">
                    Delete Account
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        showModal: Boolean, // Prop to control the visibility of the modal
    },
    methods: {
        confirmDelete() {
            this.$emit("delete-account"); // Emit event to parent component to handle account deletion
        },
        cancelDelete() {
            this.$emit("cancel-delete"); // Emit event to parent component to handle cancel action
        },
    },
};
</script>

<style>
.modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 999999;
    background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    max-width: 500px;
}

/* Add more styles as needed */
</style>
