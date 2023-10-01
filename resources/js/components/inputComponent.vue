<template>
    <div class="container">
        <h2 class="text-center">ATO-NANNICHI</h2>
        <form class="d-flex justify-content-center mt-4" v-on:submit.prevent>
            <div class="form-group">
                <input
                    type="text"
                    class="form-control form-control-lg"
                    id="title"
                    placeholder="目標を入力"
                    v-model="item.title"
                />
            </div>
            <div class="form-group">
                <input
                    type="date"
                    class="form-control form-control-lg"
                    id="deadline"
                    placeholder="日付を選択"
                    v-model="item.deadline"
                />
            </div>
            <button type="button" class="btn btn-outline-dark" @click="addItem">
                追加
            </button>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            item: {},
        };
    },
    methods: {
        addItem() {
            axios.post('/api/items', this.item).then((res) => {
                alert('目標が追加されました。');
            });
        },
    },
};
</script>

<style scoped>
#title {
    width: 450px;
}
.btn {
    height: 45px;
}
</style>
