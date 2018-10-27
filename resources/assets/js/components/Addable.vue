<template>
    <div class="addable">
        <div class="row">
            <div class="col-md-12">
                <slot></slot>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-success">
                    +
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'addable',
        props: {
            itemSelector: '.addable-item',
        },
        mounted() {

        },
    };
</script>

<style scoped>

</style>
