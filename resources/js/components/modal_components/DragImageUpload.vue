<template>
    <div id="dropzone" v-if="user">
        <form
            action="http://www.torrentplease.com/dropzone.php"
            class="dropzone dz-clickable"
            id="dropzone"
        >
            <div class="dz-text">
                <p>Drop files here or click to upload.</p>
            </div>
        </form>

        <div v-if="uploadFinished" class="dz-upload">
            <div v-if="sucessfullyUploaded" class="dz-msg dz-success-msg">
                <p>Uploaded Successfully!</p>
            </div>
            <div v-if="!sucessfullyUploaded" class="dz-msg dz-error-msg">
                <p>Image Could not be Uploaded.</p>
            </div>
        </div>

        <p v-if="errorMessage" class="dz-error-msg">{{ errorMessage }}</p>
    </div>
    <div v-else>
        <p class="dz-error">Please login to add an image</p>
    </div>
</template>

<script>
import Dropzone from "dropzone";

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
                this.sucessfullyUploaded = true;
                // location.reload();
            });

            myDropzone.on("fail", () => {
                this.uploadFinished = true;
                this.sucessfullyUploaded = false;
            });
        }
    }
};
</script>

<style lang="scss">
#dropzone {
    height: 100%;
    width: 100%;
    position: relative;
    border: solid 1px #ccc;
    border-radius: 5px;
    z-index: -1;

    display: flex;
    justify-content: center;
    align-items: center;

    form {
        height: 100%;
        width: 100%;
    }

    .dz-text {
        font-size: 1.6rem;
        font-weight: normal;
        color: #ccc;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .dz-preview {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        overflow: hidden;

        img {
            height: 100%;
            width: 100%;
            object-fit: cover;
        }

        .dz-success-mark,
        .dz-error-mark,
        .dz-details,
        .dz-error-message {
            display: none;
        }
    }

    .dz-msg {
        position: absolute;
        z-index: 9999;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        display: block;
        color: #fff;
        border-radius: 15px;
        padding: 10px 30px;
    }

    .dz-error-msg {
        background-color: #f56565;
    }

    .dz-success-msg {
        background-color: green;
    }

    .dz-upload {
        position: absolute;
        z-index: 9999;
        color: #fff;
    }
}

@keyframes fadeIn {
    0% {
        opacity: 0;
    } // CSS properties at start
    100% {
        opacity: 1;
    } // CSS properties at end
}
</style>
