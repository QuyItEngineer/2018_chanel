<template>
    <nav class="pagination" :class="{'is-rounded': isRounded}" role="navigation" aria-label="pagination">
        <a class="pagination-previous" v-if="value.current_page !== 1" @click="changePage(pageBeforeCurrent)">Previous</a>
        <a class="pagination-next" v-if="value.current_pages !== value.total_pages"
           @click="changePage(pageAfterCurrent)">Next page</a>
        <ul class="pagination-list">
            <li><a class="pagination-link" v-if="value.current_page !== 1">1</a></li>
            <li><span class="pagination-ellipsis" v-if="pageBeforeCurrent > 1">&hellip;</span></li>
            <li><a class="pagination-link" v-show="pageBeforeCurrent > -1" @click="changePage(pageBeforeCurrent)">{{pageBeforeCurrent}}</a>
            </li>
            <li><a class="pagination-link is-current" aria-current="page">{{value.current_page}}</a>
            </li>
            <li><a class="pagination-link" v-show="pageAfterCurrent > -1" @click="changePage(pageAfterCurrent)">{{pageAfterCurrent}}</a>
            </li>
            <li><span class="pagination-ellipsis" v-if="pageAfterCurrent < value.total_pages">&hellip;</span></li>
            <li><a class="pagination-link" v-if="value.current_pages !== value.total_pages"
                   @click="changePage(value.total_pages)">{{value.total_pages}}</a></li>
        </ul>
    </nav>
</template>

<script>
    export default {
        name: 'Pagination',
        props: {
            isRounded: {
                type: Boolean,
                default: true,
            },
            value: {
                type: Object,
                default: {
                    'total': 80,
                    'count': 15,
                    'per_page': 15,
                    'current_page': 1,
                    'total_pages': 6,
                },
            },
        },
        methods: {
            changePage(page) {
                this.$emit('change', page);
            },
        },
        computed: {
            pageBeforeCurrent() {
                if (this.value.current_page - 1 < 1) {
                    return -1;
                }
                return this.value.current_page - 1;
            },
            pageAfterCurrent() {
                if (this.value.current_page + 1 > this.value.total_pages) {
                    return -1;
                }
                return this.value.current_page + 1;
            },
        },
    };
</script>

<style scoped>

</style>
