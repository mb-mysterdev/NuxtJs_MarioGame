<template>
  <div>
    <NuxtLink to="/newSprint">Ajouter un sprint</NuxtLink>
    <v-row>
      <old-sprint></old-sprint>
    </v-row>
  </div>
</template>

<script>

import oldSprint from "~/pages/oldSprint";
export default {
  components: { oldSprint }
}
</script>
