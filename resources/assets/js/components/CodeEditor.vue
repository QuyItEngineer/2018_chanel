<template>
    <div class="row">
        <div class="col-md-12">
            <input type="hidden" :name="name" :value="codeModel"/>
            <codemirror v-model="codeModel" :options="codeOptions"></codemirror>
            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="button" data-toggle="collapse"
                        data-target="#collapseExample"
                        aria-expanded="false" aria-controls="collapseExample">
                    Try
                </button>
                <div class="collapse" id="collapseExample">
                    <label>Params</label>
                    <codemirror v-model="tryParams" :options="tryParamOptions"></codemirror>
                    <label>Result</label>
                    <codemirror v-if="result" v-model="result" :options="tryParamOptions"></codemirror>
                    <button @click.prevent="executeScript">Execute</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                codeModel: '',
                tryParams: '',
                result: false,
                codeOptions: {
                    mode: {
                        name: 'php',
                        startOpen: true,
                    },
                },
                tryParamOptions: {
                    mode: {
                        name: 'javascript',
                        json: true,
                    },
                },
            };
        },
        props: {
            'code': String,
            'name': String,
        },
        mounted() {
            this.codeModel = this.code;
        },
        methods: {
            executeScript() {
                this.result = false;
                axios.post('/api/story_scripts/try', {
                    'params': JSON.parse(this.tryParams),
                    'script': this.codeModel,
                }).then(res => {
                    this.result = JSON.stringify(res.data);
                }).catch(error => {
                    this.result = JSON.stringify(error.response.data);
                });
            },
        },
    };
</script>

<style scoped>

</style>
