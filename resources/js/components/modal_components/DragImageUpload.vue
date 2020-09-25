<template>
    <div id="dropzone" v-if="user" ref="dropzone">
        <p class="text-gray-400">Click or drop images here</p>
        <p v-if="errorMessage" class="dropzone-err">{{ errorMessage }}</p>
        <p v-if="sucessfullyUploaded" class="dropzone-succ">
            Image uploaded successfully
        </p>
    </div>
    <div v-else>
        <p>Please login to add an image</p>
    </div>
</template>

<script>
import Dropzone from "dropzone";
import { modalBus } from "../../buses/buses.js";

export default {
    data() {
        return {
            sucessfullyUploaded: false,
            uploadFinished: false,
            errorMessage: "",
            user: currentUser
        };
    },
    mounted() {
        if (currentUser) {
            const url = `/businesses/${window.location.pathname
                .split("/")[2]
                .trim()}/images`;

            var myDropzone = new Dropzone("div#dropzone", {
                url,
                headers: {
                    "X-CSRF-TOKEN": csrfToken
                },
                paramName: "image",
                maxFilesize: 120,
                accept: (file, done) => {
                    if (file.size > 2000000) {
                        this.errorMessage =
                            "Image size is too big, please provide an image smaller than 2MB.";
                        done("fail");
                    }

                    if (file.type.split("/")[0] !== "image") {
                        this.errorMessage =
                            "This file can not be uploaded, please provide a valid image.";
                        done("fail");
                    }

                    done();
                }
            });

            myDropzone.on("success", () => {
                this.uploadFinished = true;
                this.$refs.dropzone.style.border = "solid 3px green";
                this.errorMessage = "";
                window.location.reload();
            });

            myDropzone.on("fail", () => {
                this.uploadFinished = true;
                this.sucessfullyUploaded = false;
            });
        }
    }
};
</script>

<style lang="scss" scoped>
#dropzone {
    height: 100%;
    width: 100%;
    position: relative;
    border: dotted 1px #ccc;
    border-radius: 5px;
    z-index: -1;
}

.dropzone-succ {
    background: green;
    padding: 5px 0;
    font-size: 1rem;
    border-radius: 15px;
    color: #fff;
    width: 70%;
    margin: 0 auto;
}
.dropzone-err {
    background: #eb5757;
    padding: 5px 0;
    font-size: 1rem;
    border-radius: 15px;
    color: #fff;
    width: 70%;
    margin: 0 auto;
}

p {
    display: inline-block;
    text-align: center;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    pointer-events: none;
}
</style>
