<template>
    <div class="container">
        <div class="search-container">
            <input type="text" id="searchBox" class="form-control" placeholder="Search for users..."
                   v-model="searchQuery"
                   @input="searchUser">
        </div>

        <div class="row user-details" id="userDetails">
            <div class="col-md-6" v-for="(user,index) in users">
                <div class="user-card">
                    <h3>{{ user.name }}</h3>
                    <p>Department: {{ user.department?.name }}</p>
                    <p>Designation: {{ user.designation?.name }}</p>
                    <p>Phone Number: {{ user.phone_number }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
.search-container {
    margin: 20px;
}

.user-details .user-card {
    border: 1px solid #ddd;
    padding: 20px;
    margin-bottom: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.user-details .col-md-6 {
    padding: 15px;
}
</style>

<script setup>
import {ref, onMounted} from 'vue';
import axios from 'axios';

const searchQuery = ref('');
const users = ref([])
const cancelTokenSource = ref('');

// cancelTokenSource.value = axios.CancelToken.source();
const fetchUsers = async (query = '') => {
    // if (cancelTokenSource.value!='') {
    //     cancelTokenSource.value.cancel('Operation canceled due to new request.');
    // }
    try {
        const response = await axios.get('/api/users', {
            params: {
                search: query,
            },
            // cancelToken: cancelTokenSource.value.token
        });
        users.value = response.data;
    } catch (error) {
        console.log(error);
    }
};
const searchUser = () => {
    fetchUsers(searchQuery.value);
};
onMounted(() => {
    fetchUsers()
});

</script>
