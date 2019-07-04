<template>
    <div class="container">
        <div class="row mb-2">
            <div class="col">
                <button type="button" class="btn btn-info w-100" :disabled="loading" @click="getRecords()">
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" v-if="loading"></span>
                    <span v-else>Reload records</span>
                </button>
            </div>
        </div>
        <div class="row" v-if="records && records.total">
            <div class="col">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="record in records.data" :key="record.id">
                            <td colspan="2">{{ record.created_at }}</td>
                        </tr>
                    </tbody>
                </table>

                <pagination :data="records" @pagination-change-page="getRecords"></pagination>
            </div>
        </div>
        <div class="row" v-else>
            <div class="col">
                <div class="alert alert-dark" role="alert">
                    No records
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                records: {},
                loading: false
            }
        },
        created() {
            this.getRecords();
        },
        methods: {
            getRecords(page) {
                const self = this;

                if (_.isUndefined(page)) {
                    page = 1;
                }

                self.$set(self, 'loading', true);

                axios.get('/?page=' + page)
                    .then(function (response) {
                        self.$set(self, 'records', response.data);
                        self.$set(self, 'loading', false);
                    })
                    .catch(function (error) {
                        console.log(error);
                        self.$set(self, 'loading', false);
                    });
            }
        }
    }

</script>
