<template>
    <div>
        <div class="flex carousel">
            <button class="carousel-btn prev-btn" @click="prev"><</button>
            <img
                v-for="image in carouselImages"
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
            stepCount: 0,
            carouselImages: []
        };
    },
    mounted() {
        this.carouselImages = this.images;

        if (this.images.length % 2 !== 0) {
            const placeHolderUrl = `${window.location.origin}/images/placeholder.png`;
            this.carouselImages.push({ id: 13812, image_path: placeHolderUrl });
        }
    },
    methods: {
        imageSrc(path) {
            if (path.slice(0, 4) == "http") return path;
            return `${window.location.origin}/storage/${path}`;
        },
        next() {
            this.stepCount++;
            if (this.stepCount >= this.carouselImages.length - 2)
                this.stepCount = 0;
            this.transformImages();
        },
        prev() {
            this.stepCount--;
            if (this.stepCount <= 0)
                this.stepCount = this.carouselImages.length - 1;
            this.transformImages();
        },
        transformImages() {
            this.$refs.image.forEach(image => {
                image.style.transform = `translateX(-${this.stepCount *
                    (300 + this.carouselImages.length * 5)}px)`;
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
