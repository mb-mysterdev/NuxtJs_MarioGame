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
    this.startWebcam()
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
    startWebcam () {
      const output = document.getElementById('output')
      const right = document.getElementById('right')
      const log = function (message, className) {
        const row = document.createElement('div')
        if (className) {
          row.classList.add(className)
        }
        output.appendChild(row)
      }

      const getWebcams = function () {
        return navigator.mediaDevices.enumerateDevices()
          .then((devices) => {
            devices.forEach((device) => {
              log(device.kind + ': LABEL = "' + device.label +
                '" ID = ' + device.deviceId)
            })

            return devices.filter((device) => {
              return device.kind === 'videoinput'
            })
          })
      }

      const startWebcamStream = function (webcamDevice) {
        const constraints = {
          audio: false,
          video: {
            optional: [{
              sourceId: webcamDevice.deviceId
            }]
          },
          deviceId: {
            exact: webcamDevice.deviceId
          }
        }

        log('Starting webcam stream with device ID = ' + webcamDevice.deviceId)

        const successCallback = function (stream) {
          const video = document.createElement('video')
          video.autoplay = true
          setVideoStream(video, stream)

          const row = document.createElement('div')
          right.appendChild(row)
          right.appendChild(video)
        }

        navigator.mediaDevices.getUserMedia(constraints)
          .then(successCallback)
      }

      var setVideoStream = function (video, stream) {
        try {
          video.srcObject = stream
        } catch (error) {
          video.src = window.URL.createObjectURL(stream)
        }
      }

      log('Start')
      getWebcams()
        .then((webcamDevices) => {
          webcamDevices.forEach((webcamDevice) => {
            startWebcamStream(webcamDevice)
          })
        })
    },
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
