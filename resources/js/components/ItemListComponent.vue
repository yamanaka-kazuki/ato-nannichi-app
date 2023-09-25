<template>
    <div class="container mt-5" v-if="items">
        <div class="mt-2 gap-3 row" v-for="(item, index) in items" :key="index">
            <p class="text-left col-8">{{ item.title }}</p>
            <p class="text-left col-4">
                あと{{ diffDate(item.deadline, dateToday) }}日
            </p>
        </div>
    </div>
</template>

<script>
import moment from 'moment';

export default {
    data() {
        return {
            items: [],
            dateToday: '',
        };
    },
    methods: {
        getItems() {
            axios.get('api/items').then((res) => {
                this.items = res.data;
            });
        },
        diffDate: function (deadline, today) {
            return moment(deadline).diff(today, 'days');
        },
    },
    filters: {
        moment: function (date) {
            return moment(date).format('YY/MM/DD HH:mm');
        },
    },
    mounted() {
        this.getItems();
        this.dateToday = moment(new Date()).format('YYYY/MM/DD');
    },
};
</script>

<style></style>
