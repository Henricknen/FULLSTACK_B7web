<script>
export default {
    data() {
        return {
            msg: 'Olá, mundo'
        }
    }
}
</script>

<template>
    <div id = "app">
        <h1>{{ msg }}</h1>
    </div>
</template>

<style>
h1 {
    background-color:#FF0000;
    color: #FFF;
}
</style>