<template>
    <div>
        <div class="checbox icheck">
            <label>
                <input type="checkbox" class="checkbox_channels" v-model="status" :checked="status"
                       v-on:click="change_checkbox(id, status = $event)"/>
            </label>

        </div>
    </div>
</template>

<script>
    export default {
        name: "IsVideoStatus",
        props: {
            channel_id: {
                type: String,
                default: ''
            },
            is_status: {
                type: String,
                default: ''
            }
        },
        data() {
            return {
                codeModel: '',
                id: '',
                status: '',
                isCheck: false,
                result: 'false',
                valueCheckbox: 'true'
            }
        },
        mounted() {
            this.id = this.channel_id;
            this.status = this.is_status == 'true' ? true : false;
        },
        methods: {
            change_checkbox(id, checkbox_status) {
                if( checkbox_status.target.checked ) {
                    //will change status = 1
                    this.status = true;
                    axios.post('/api/channel/is_video', {
                        channel_id: id,
                        is_check: this.status
                    }).then((res) => {
                        console.log(res.data.data);
                    }).catch((error) => {
                        console.log(error.data.data);
                    });
                } else {
                    //will change status = 0
                    this.status = false;
                    axios.post('/api/channel/is_video', {
                        channel_id: id,
                        is_check: this.status
                    }).then((res) => {
                        console.log(res.data.data);
                    }).catch((error) => {
                        console.log(error.data.data);
                    });
                }
            }
        }
    }
</script>

<style scoped>
    .checkbox_channels {
        transform: scale(1.5);
        margin: 6px;
    }
</style>