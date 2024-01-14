<template>
    <Toast/>
</template>
<script>

export default {
    methods: {
        showSuccessToast(message) {
            this.$refs.toast.add({
                severity: 'success',
                summary: message,
                life: 3000, // Set the toast life (duration) in milliseconds
            });
        }
    },
}
</script>