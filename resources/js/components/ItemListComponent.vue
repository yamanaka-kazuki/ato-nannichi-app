<template>
    <div class="container mt-5 mx-auto" v-if="items">
        <form v-on:submit.prevent>
            <table class="table" style="width: 1000px; font-size: 18px">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>目標</th>
                        <th>期限まで</th>
                        <th colspan="2">アクション</th>
                    </tr>
                </thead>
                <tbody
                    v-for="(item, index) in items"
                    :key="index"
                    style="font-size: 20px"
                >
                    <td>{{ index + 1 }}</td>
                    <td class="text-left col-8">{{ item.title }}</td>
                    <td class="text-left col-4">
                        あと{{ diffDate(item.deadline, dateToday) }}日
                    </td>
                    <td style="width: 200px">
                        <button type="button" class="btn btn-success w-auto">
                            manage
                        </button>
                    </td>
                    <td style="width: 200px">
                        <button
                            type="button"
                            class="btn btn-danger w-auto"
                            @click="deleteItem(item.id)"
                        >
                            delete
                        </button>
                    </td>
                </tbody>
            </table>
        </form>
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
    props: {
        itemId: Number,
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
        deleteItem(id) {
            axios.post('api/items/delete/' + id).then((res) => {
                alert('目標が削除されました');
            });
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
