<template>
  <div>
    <a :href="link" class="text-grey-darkest show-games" v-html="date" @click.prevent="showGames"></a>
    <game-modal :day-id="dayId" :show-modal="showModal"></game-modal>
  </div>
</template>
<script>
import GameModal from "./GameModal";

export default {
  components: {
    GameModal
  },

  data() {
    return {
      showModal: false
    };
  },

  computed: {
    link: function() {
      return `/game/${this.dayId}`;
    }
  },

  methods: {
    showGames: function() {
      this.showModal = !this.showModal;
    }
  },

  props: {
    dayId: {
      type: Number,
      required: true
    },
    date: {
      type: String,
      requried: true
    }
  }
};
</script>
