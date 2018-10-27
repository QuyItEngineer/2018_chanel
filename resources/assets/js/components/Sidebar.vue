<template>
    <aside id="sidebar" class="column aside hero is-fullheight">
        <aside class="menu">
            <ul class="menu-list">
                <li v-for="menu in menus">
                    <router-link :to="menu.to" exact active-class="is-active">
                        <span class="icon"><i :class="menu.icon"></i></span>
                    </router-link>
                </li>
            </ul>
        </aside>
    </aside>
</template>

<script>
    export default {
        name: 'Sidebar',
        props: {
            menus: {
                type: Array,
                default: [],
            },
        },
    };
</script>

<style scoped lang="scss">
    @import "~bulma/sass/utilities/initial-variables";

    #sidebar {
        background-color: $black;
        flex: 0 0 50px;
    }

    .menu-list {
        line-height: 2.25;
        a {
            border-radius: 0;
        }
    }
</style>
