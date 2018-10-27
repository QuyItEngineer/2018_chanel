<template>
    <div class="columns is-variable is-2 is-multiline">
        <div v-for="item in items" class="column is-12-mobile is-3-tablet is-2-desktop">
            <div class="card">
                <div class="card-image">
                    <figure class="image is-4by3">
                        <img :src="item.thumbnail" alt="Placeholder image">
                    </figure>
                </div>
                <div class="card-content">
                    <div class="content">
                        <p>{{item.name}}</p>
                        <small>{{item.author}}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'StoryList',
        props: {
            items: {
                type: Array,
            },
        },
    };
</script>

<style scoped lang="scss">
    .card {
        height: 250px;
    }
</style>
