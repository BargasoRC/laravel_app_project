<template>

    <div>
        <br><br>
        <h1>TICKETS</h1>
        <div v-for="t in this.tickets" v-bind:key= t>{{t}}</div>
    </div>

</template>
<script>
export default{
    data(){
        return{
            tickets:[]
        }
    },
    mounted(){
        const data = this.$route.params.data;
        console.log('data',data);
        for(var i =0; i < data; i++){
            this.tickets.push(data[i]);
        }
    }
}
</script>