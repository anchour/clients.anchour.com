<template>
    <ul>
        <li v-for="row in list">
            <a :href="mailTo(row.email)">
                {{ row.name }}
            </a>
        </li>
    </ul>
</template>

<script>
    export default {
        data() {
            return {
                list: []
            }
        },
        ready() {
            this.$http.get('/api/mailing-list').then(this.setMailingList);
        },
        methods: {
            setMailingList(response) {
                console.log(response);
                this.$set('list', response.data);
            },
            mailTo(email) {
                if (! email) {
                    return false;
                }

                return 'mailto:' + email;
            }
        }
    }
</script>

