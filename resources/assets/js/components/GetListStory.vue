<template>
    <div v-if="isShow">
        {{label}}: {{count}}

        <button type="button" class="btn btn-xs btn-success" aria-label="Left Align" v-if="!isLoading"
                @click.prevent="fetch">
            <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
        </button>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                count: 0,
                isLoading: false,
            };
        },
        props: {
            isShow: Boolean,
            requestParams: Object,
            endpoint: String,
            label: String,
        },
        mounted() {
            this.fetch();
        },
        methods: {
            fetch() {
                this.isLoading = true;
                axios.get(this.endpoint, {
                    params: this.requestParams,
                }).then((res) => {
                    this.count = res.data.data.meta.pagination.total;
                    this.isLoading = false;
                }).catch((error) => {
                    this.$toasted.show(error.message);
                    this.isLoading = false;
                });
            },
        },
    };
</script>

<style scoped>

</style>
