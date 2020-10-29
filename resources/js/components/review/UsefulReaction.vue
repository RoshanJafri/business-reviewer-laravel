<template>
  <div>
    <button type="button" @click="addReaction" class="flex py-1 px-1 rounded hover:bg-gray-200">

      <div v-if="isActive" class="flex">

        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 25 26">
            <title>grin-alt</title>
            <g fill="#F2994A">
                <path
                    d="M12.4 0.4c-6.85 0-12.4 5.55-12.4 12.4s5.55 12.4 12.4 12.4 12.4-5.55 12.4-12.4-5.55-12.4-12.4-12.4z m3.19 6.43c0.38-0.57 1.24-0.58 1.63 0 0.62 0.92 0.76 1.84 0.79 2.77-0.03 0.92-0.17 1.84-0.79 2.77-0.38 0.57-1.24 0.58-1.63 0-0.62-0.92-0.76-1.84-0.79-2.77 0.03-0.92 0.17-1.84 0.79-2.77z m-8 0c0.38-0.57 1.24-0.58 1.63 0 0.62 0.92 0.76 1.84 0.79 2.77-0.03 0.92-0.17 1.84-0.79 2.77-0.38 0.57-1.24 0.58-1.63 0-0.62-0.92-0.76-1.84-0.79-2.77 0.03-0.92 0.17-1.84 0.79-2.77z m4.81 14.77c-3.03 0-6.73-1.92-7.19-4.67-0.1-0.59 0.47-1.08 1.04-0.89 1.51 0.48 3.76 0.76 6.15 0.76s4.65-0.28 6.16-0.76c0.57-0.19 1.13 0.3 1.03 0.89-0.47 2.75-4.16 4.67-7.19 4.67z">
                </path>
            </g>
        </svg> 
        <span class="mx-2 text-sm">Useful</span>
        </div>


        <div v-else class="flex">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 25 26">
            <title>grin</title>
            <g fill="#BDBDBD">
                <path
                    d="M12.4 0.4c-6.85 0-12.4 5.55-12.4 12.4s5.55 12.4 12.4 12.4 12.4-5.55 12.4-12.4-5.55-12.4-12.4-12.4z m0 22.4c-5.52 0-10-4.49-10-10s4.48-10 10-10 10 4.49 10 10-4.49 10-10 10z m5.28-7.57c-1.29 0.42-3.22 0.66-5.28 0.66s-3.98-0.24-5.28-0.66c-0.5-0.16-0.97 0.27-0.89 0.77 0.4 2.35 3.56 4 6.17 4s5.77-1.65 6.17-4c0.08-0.49-0.39-0.92-0.89-0.77z m-9.28-3.23c0.89 0 1.6-0.72 1.6-1.6s-0.72-1.6-1.6-1.6-1.6 0.72-1.6 1.6 0.72 1.6 1.6 1.6z m8 0c0.89 0 1.6-0.72 1.6-1.6s-0.72-1.6-1.6-1.6-1.6 0.72-1.6 1.6 0.72 1.6 1.6 1.6z">
                </path>
            </g>
        </svg> 
          <span class="mx-2 text-sm">Useful</span>
        </div>

    </button>
</div>
</template>

<script>
export default {
  props: {
    reacted: {
      type: Boolean,
      required: true
    },
  },
  data() {
    return {
      isActive: this.reacted,
    }
  },
  methods:{
    addReaction() {
      this.$emit('reaction', 'useful');
      this.isActive = !this.isActive;
    }
  } 

}
</script>

<style>

</style>