<template>
    <div style="margin-top: 0.75rem">
        <story-list :items="stories.data"></story-list>
        <pagination v-if="stories.meta && stories.meta.pagination" :value="stories.meta.pagination"></pagination>
    </div>
</template>

<script>
    import {mapState, mapActions, mapGetters} from 'vuex';
    import StoryList from '../components/StoryList';
    import Pagination from '../components/Pagination';

    export default {
        name: 'Home',
        metaInfo: {
            title: 'Home',
        },
        components: {
            StoryList,
            Pagination,
        },
        computed: {
            ...mapState('story', [
                'stories',
            ]),
            ...mapGetters('story', [
                'selectedProvider',
            ]),
        },
        methods: {
            ...mapActions('story', ['fetchProviders']),
        },
    };
</script>

<style scoped>

</style>
