<template>
  <div>
    <NuxtLink to="/newSprint">Ajouter un sprint</NuxtLink>
    <v-row>
      <old-sprint></old-sprint>
    </v-row>
  </div>
</template>

<script>

import OldSprint from "~/oldSprint";
export default {
  components: { OldSprint }
}
</script>
