<template>
    <div v-if="show">
        <div class="backdrop" @click="closeModal"></div>
        <div class="modal shadow-2xl bg-white flex rounded-md">
            <button @click="closeModal">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="18"
                    height="18"
                    viewBox="0 0 36 36"
                >
                    <title>ic_close_36px</title>
                    <g fill="#cecece">
                        <path
                            d="M28.5 9.62L26.38 7.5 18 15.88 9.62 7.5 7.5 9.62 15.88 18 7.5 26.38l2.12 2.12L18 20.12l8.38 8.38 2.12-2.12L20.12 18z"
                        />
                    </g>
                </svg>
            </button>
            <component :is="component"></component>
        </div>
    </div>
</template>

<script>
import { modalBus } from "../buses/buses.js";

import DragImageUpload from "./modal_components/DragImageUpload";

export default {
    data() {
        return {
            show: false,
            component: ""
        };
    },
    created() {
        modalBus.$on("modal", modal => {
            this.show = true;
            this.component = modal;
        });

        modalBus.$on("close-modal", () => {
            this.show = false;
            this.component = "";
        });
    },
    methods: {
        closeModal() {
            this.show = false;
            this.component = "";
        }
    },
    components: {
        addImage: DragImageUpload
    },
    mounted() {
        window.addEventListener("keyup", e => {
            if (e.keyCode == 27) {
                this.closeModal();
            }
        });
    }
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
    }
}
button {
    cursor: pointer;
    position: absolute;
    top: 10px;
    right: 10px;
    z-index: 99999;

    &:hover svg g {
        fill: rgb(59, 59, 59);
    }
}
</style>
