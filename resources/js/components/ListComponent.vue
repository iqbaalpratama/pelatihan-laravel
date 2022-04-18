<template>
    <ul>
        <li v-for="(item,index) in listData" :key="index">
            {{ item.title }}
            <button type="button" class="delete" @click="remove(index)">Hapus</button>
        </li>
    </ul>
</template>
<script>
export default {
    props:{
        listData:{
            type: Array,
            default: () => {
                return []
            }
        }
    },
    methods: {
        remove(index){
            this.$emit('emitDelete', index)
        }
    }
}
</script>