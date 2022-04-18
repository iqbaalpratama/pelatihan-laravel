<template>
    <div class="container">
        <h1>To-Do</h1>
        <input-form-component @emitSubmit="addList"/>
        <list-component :listData="list" @emitDelete="deleteList"/>
    </div>
</template>

<script>
import InputFormComponent from './InputFormComponent.vue'
import ListComponent from './ListComponent.vue'
export default {
  components: { InputFormComponent, ListComponent },
    data(){
        return {
            list: [
                {
                    title: "menyapu"
                },
                {
                    title: "mengepel"
                }
            ],
            input: ''
        }
    },
    methods:{
        addList(data){
            let newList = {
                title: data
            }
            this.list.push(newList)
        },
        deleteList(index){
            this.list.splice(index,1)
        }
    }
}
</script>
