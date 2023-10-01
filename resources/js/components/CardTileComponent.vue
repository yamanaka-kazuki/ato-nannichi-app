<template>
    <div class="container mt-5">
        <div class="row">
            <div
                class="col-md-6 mb-2"
                v-for="(item, index) in items"
                :key="index"
            >
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ item.title }}</h5>
                        <p class="card-text">
                            あと{{ diffDate(item.deadline, dateToday) }}日
                        </p>
                        <div class="d-flex">
                            <a href="#" class="btn btn-success mr-2">管理</a>
                            <a href="#" class="btn btn-danger mr-2">削除</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 2列目のカードがない場合 -->
            <div class="col-md-6" v-if="items.length % 2 !== 0">
                <div class="clickable-card" @click="handleCardClick">
                    <div class="card border-dashed text-center">
                        <div class="card-body">
                            <h5 class="card-title">+</h5>
                        </div>
                    </div>
                </div>
            </div>
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
        handleCardClick() {
            alert('クリックされました');
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

<style>
.clickable-card {
    cursor: pointer;
}
</style>
