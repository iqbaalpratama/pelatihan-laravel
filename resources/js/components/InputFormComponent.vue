<template>
    <form class="form">
        <input v-model="inputform"/>
        <button-component @emitClick="reset" text="Reset"/>
        <button-component @emitClick="addList" text="Submit"/>
    </form>
</template>

<script>
import ButtonComponent from './ButtonComponent.vue'
    export default {
  components: { ButtonComponent },
        data(){
            return {
                inputform: ''
            }
        },
        methods:{
            addList(){
                this.$emit('emitSubmit', this.inputform)
                this.inputform = ''
            },
            reset(){
                this.inputform = ''
            }
        }
    }
</script>
