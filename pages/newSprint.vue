<template>
  <div>
    <sprint></sprint>
    <groups></groups>
    <v-btn>Enregistrer</v-btn>
  </div>
</template>

<script>
import Groups from "~/components/Groups";
import Sprint from "~/components/Sprint";
export default {
  name: 'newSprint',
  components: { Sprint, Groups }
}
</script>
