<template>
    <div>
        <div class="flex carousel" ref="carousel">
            <button class="carousel-btn prev-btn" @click="prev"><</button>
            <img
                v-for="image in images"
                :key="image.id"
                :src="imageSrc(image.image_path)"
                alt="#"
                ref="image"
            />
            <button class="carousel-btn next-btn" @click="next">></button>
        </div>
    </div>
</template>

<script>
export default {
    props: ["images"],
    data() {
        return {
            stepCount: 0
        };
    },
    methods: {
        imageSrc(path) {
            if (path.slice(0, 4) == "http") return path;
            return `${window.location.origin}/storage/${path}`;
        },
        next() {
            this.stepCount++;

            // gets width of carousel container and devides by image size (300px)
            const displayedItemsCount = Math.floor(
                this.$refs.carousel.getBoundingClientRect().width / 300
            );

            if (this.stepCount >= this.images.length - displayedItemsCount) {
                this.stepCount = 0;
            }

            this.transformImages();
        },
        prev() {
            this.stepCount--;

            const displayedItemsCount = Math.ceil(
                this.$refs.carousel.getBoundingClientRect().width / 300
            );

            if (this.stepCount < 0) {
                this.stepCount = this.images.length - displayedItemsCount;
            }
            this.transformImages();
        },
        transformImages() {
            console.log(this.stepCount);
            this.$refs.image.forEach(image => {
                image.style.transform = `translateX(-${this.stepCount * 100}%)`;
            });
        }
    }
};
</script>

<style scoped lang="scss">
img {
    height: 300px;
    width: 300px;
    object-fit: cover;

    margin-right: 5px;
    transition: all 0.6s;
}
.carousel-btn {
    position: absolute;
    height: 30px;
    width: 25px;
    background: rgba(0, 0, 0, 0.25);
    color: white;
    font-weight: bold;
    z-index: 999;
}

.prev-btn {
    top: 50%;
    left: 0;
}

.next-btn {
    top: 50%;
    right: 0;
}
.carousel {
    position: relative;
}
</style>
