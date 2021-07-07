<template>
<!--      <v-col cols="2" v-for="sprint in getAllSprint">-->
<!--        <v-card-->
<!--        >{{ sprint }}</v-card>-->
<!--      </v-col>-->
</template>

<script>

import axios from 'axios';

export default {
name: "oldSprint",
  mounted () {
  console.log(this.getAllSprint())
  },
  methods: {
   async getAllSprint(){
        console.log(await axios.get('http://localhost:8000/sprint', {
          headers: {
            'Access-Control-Allow-Origin': '*',
          }}).then((resp) => {
          console.log(resp.data)
        }))
    }
  }
}
</script>
