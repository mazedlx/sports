<template>
  <div ref="modal" tabindex="-1" @keydown.esc="close">
    <div v-if="show" class="fixed pin z-50 overflow-auto flex bg-white" @click="close">
      <div class="relative p-8 bg-white w-full max-w-md m-auto flex-col flex" v-html="html"></div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      html: "",
      show: this.showModal
    };
  },

  computed: {
    link: function() {
      return `/game/${this.dayId}`;
    }
  },

  methods: {
    close: function() {
      this.show = false;
    },
    async fetchData() {
      try {
        const response = await axios.get(this.link);
        this.html = response.data;
        this.show = true;
        this.$refs.modal.focus();
      } catch (error) {}
    }
  },

  props: {
    dayId: {
      type: Number,
      required: true
    },
    showModal: {
      type: Boolean,
      required: true
    }
  },

  watch: {
    showModal: {
      immediate: true,
      handler(value) {
        if (value) {
          this.fetchData();
        }
      }
    }
  }
};
</script>
