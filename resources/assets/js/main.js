import Vue from 'vue';
import VueResource from 'vue-resource';
import mailinglist from './components/MailingList.vue';

Vue.use(VueResource);

new Vue({
    el: 'body',
    components: {
        mailinglist
    }
});