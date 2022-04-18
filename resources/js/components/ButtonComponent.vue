<template>
    <button class="btn-info" type="button" @click="emitClick">{{ text }}</button>
</template>
<script>
export default {
    props:{
        text: {
            type: String,
            default: ''
        }
    },
    methods:{
        emitClick(){
            this.$emit('emitClick')
        }
    }
}
</script>