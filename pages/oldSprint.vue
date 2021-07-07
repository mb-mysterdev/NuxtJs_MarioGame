<template>
      <v-col cols="2">
        <v-card
        >anciensprint</v-card>
      </v-col>
</template>

<script>
import axios from 'axios';

export default {
name: "oldSprint",
  mounted () {
  console.log(axios.get(''))
  }
}
</script>
