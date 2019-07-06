<template>
    <div class="container py-2">
        <div class="row">
            <div class="col">
                <div class="alert alert-info" role="alert">
                    Command schedule is <b>{{ status ? 'enabled' : 'disabled' }}</b>.
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="btn-group w-100" role="group" aria-label="">
                    <button type="button" class="btn w-100" :class="{'btn-success': !status, 'btn-secondary': status}" :disabled="status" @click="updateCron">Enable</button>
                    <button type="button" class="btn w-100" :class="{'btn-danger': status, 'btn-secondary': !status}" :disabled="!status" @click="updateCron">Disable</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                status: false,
            }
        },
        created() {
            this.getCron();
        },
        methods: {
            getCron() {
                const self = this;

                axios.get('/cron/test')
                    .then(function (response) {
                        self.$set(self, 'status', response.data.value);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            updateCron() {
                const self = this;
                const enabled = !self.status;

                axios.put('/cron', {
                        name: 'test',
                        enabled: enabled
                    })
                    .then(function (response) {
                        self.$set(self, 'status', enabled);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        }
    }

</script>
