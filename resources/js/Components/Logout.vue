<template>
  <form @submit.prevent="logout">
    <button type="submit" class="dropdown-item text-danger">
      <i class="bx bx-power-off font-size-17 align-middle me-1 text-danger"></i> Logout
    </button>
  </form>
</template>
<script>
import axios from 'axios';
export default {
    methods: {
    logout() {
        axios.post('/logout')
        .then(() => {
          
        })
        .catch(error => {
            // Handle any errors that occur during logout
            console.error(error);
        });
    }
    }
}
</script>