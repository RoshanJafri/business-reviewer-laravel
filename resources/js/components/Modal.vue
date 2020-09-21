<template>
  <div v-if="show">
    <div class="backdrop" @click="closeModal"></div>
    <div class="modal shadow-2xl bg-white flex rounded-md">hello</div>
  </div>
</template>

<script>
import { modalBus } from "../buses/buses.js";

export default {
  data() {
    return {
      show: false,
      component: "",
    };
  },
  created() {
    modalBus.$on("modal", (modal) => {
      this.show = true;
      this.component = modal;
    });
  },
  methods: {
    closeModal() {
      this.show = false;
      this.component = "";
    },
  },
};
</script>

<style scoped lang="scss">
.backdrop {
  position: fixed;
  height: 100%;
  width: 100%;
  backdrop-filter: blur(3px);
  background-color: rgba(0, 0, 0, 0.45);
  z-index: 9999999;
}
.modal {
  position: fixed;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  width: 650px;
  height: 550px;
  z-index: 999999999;
  padding: 30px;

  @media only screen and (max-width: 800px) {
    width: 90%;
    height: 80%;
    padding: 15px;
  }
}
</style>