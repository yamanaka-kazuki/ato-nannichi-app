<template>
    <div>
        <form class="d-flex justify-content-center mt-4">
            <div class="form-group">
                <input
                    type="text"
                    class="form-control form-control-lg"
                    id="title"
                    placeholder="目標を入力"
                />
            </div>
            <div class="form-group">
                <input
                    type="date"
                    class="form-control form-control-lg"
                    id="deadline"
                    placeholder="日付を選択"
                />
            </div>
            <button type="button" class="btn btn-outline-dark">追加</button>
        </form>
    </div>
</template>

<script>
export default {};
</script>

<style scoped>
#title {
    width: 450px;
}
.btn {
    height: 45px;
}
</style>
