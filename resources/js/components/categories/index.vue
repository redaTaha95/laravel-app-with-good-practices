<template>
    <select @change="onChange($event)" class="form-control">
        <option value="">Select a category</option>
        <option v-for="category in categories" v-bind:value="category.id">
            {{ category.name }}
        </option>
    </select>
</template>

<script>
    export default {
        data() {
            return {
                categories: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/categories/')
                .then(response => {
                    this.categories = response.data;
                });
        },
        methods: {
            onChange(event) {
                console.log(event.target.value)
                this.$router.push({name: "filterProductsByCategory", params: {"category_id": event.target.value}})
            }
        }
    }
</script>

<style scoped>

</style>
