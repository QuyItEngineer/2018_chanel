<template>
    <nav class="navbar" role="navigation" aria-label="dropdown navigation" @click="toggleMenu">
        <div class="navbar-item has-dropdown" :class="{'is-active': isActive}">
            <a class="navbar-link">
                {{value.name}}
            </a>

            <div class="navbar-dropdown">
                <a class="navbar-item" :key="item.id" v-for="item in items" @click="select(item)">
                    {{item.name}}
                </a>
            </div>
        </div>
    </nav>
</template>

<script>
    export default {
        name: 'NavbarDropbox',
        props: {
            items: {
                type: Array,
            },
            value: {
                type: Object,
            },
        },
        data() {
            return {
                isActive: false,
            };
        },
        computed: {
            selectedItemName() {
                return this.selectedItem.name || 'Please select';
            },
        },
        methods: {
            select(item) {
                this.toggleMenu();
                if (item !== this.value) {
                    this.$emit('changed', item);
                }
            },
            toggleMenu() {
                this.isActive = !this.isActive;
            },
        },
    };
</script>

<style scoped>

</style>
