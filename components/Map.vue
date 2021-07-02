<template>
  <v-row justify="center" align="center">
    <v-col v-for="(value,key) in cols" :key="key" cols="1" class="background-col">
      <div v-if="value.value !== ''">
        <img src="../assets/mario.png" style="width:50px">
      </div>
      <div v-else>
        <div v-if="value.y > 136 && value.y < 141">
          <div id="container">
            <div id="left">
              <div id="output" />
            </div>
            <div id="right" />
          </div>
          <img src="../assets/patate.png" style="width:50px">
        </div>
        {{ value.y }}
      </div>
    </v-col>
  </v-row>
</template>

<script>
export default {
  name: 'Map',

  data () {
    return {
      cols: [],
      potato: [{ name: 'test1' }, { name: 'test2' }]
    }
  },
  created () {
    this.generateMap()
  },
  mounted () {
    window.addEventListener('keyup', (e) => {
      const key = String.fromCharCode(e.keyCode)
      const found = this.cols.find(element => element.value === 'player')
      const valueToAdd = this.executeKeyUp(key, found)
      this.cols.map(function (element) {
        if (element.y === (found.y + valueToAdd)) {
          element.value = 'player'
        }
        if (element.y === found.y) {
          element.value = ''
        }
      })
    })
  },
  methods: {
    generateMap () {
      for (let i = 9; i < 141; ++i < 142) {
        this.cols.push({ y: i, value: '' })
      }
      this.cols[0] = { y: 9, value: 'player' }
    },
    executeKeyUp (event) {
      if (event === '%') {
        // left
        return -1
      }

      if (event === "'") {
        // right
        return 1
      }

      if (event === '&') {
        // top
        return -12
      }

      if (event === '(') {
        // bottom
        return +12
      }
      return 0
    }
  }
}

</script>

<style scoped>
.background-col {
  background-color: green;
  width: 80px;
  height: 80px;
}
#container {
  width: 50%;
}
#left, #right {
  width: 50%;
  float: left;
}

.success {
  color: green;
}
.error {
  color: red;
}
video {
  max-height: 40px;
}
</style>
