<template>
    <div id="app-layout">
        <div class="columns is-variable is-0">
            <sidebar :menus="menus"></sidebar>
            <div class="column is-fullheight">
                <navigation>
                    <navbar-dropbox :value="selectedProvider" :items="providers"
                                    @change="changeProvider"></navbar-dropbox>
                </navigation>
                <div class="container is-fullhd">
                    <router-view></router-view>
                </div>
            </div>
        </div>
        <footer></footer>
    </div>
</template>

<script>
    import Navigation from '../components/Navigation';
    import NavbarDropbox from '../components/NavbarDropbox';
    import Sidebar from '../components/Sidebar';
    import Footer from '../components/Footer';
    import {mapGetters, mapState} from 'vuex';
    import menus from '../config/menus';

    export default {
        name: 'Layout',
        components: {
            Navigation,
            NavbarDropbox,
            Sidebar,
            Footer,
        },
        data() {
            return {
                menus,
            };
        },
        computed: {
            ...mapGetters('story', [
                'selectedProvider',
            ]),
            ...mapState('story', [
                'providers',
            ]),
        },
        mounted() {
            this.$store.dispatch('story/fetchProviders');
        },
        methods: {
            changeProvider(item) {
                this.$store.dispatch('story/changeProvider', {
                    provider: item,
                });
            },
        },
    };
</script>

<style scoped>

</style>
