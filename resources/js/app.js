window.Vue = require("vue");
window.axios = require("axios");

import GameLink from "./components/GameLink";

const app = new Vue({
  el: "#app",

  components: {
    GameLink,
  },
});
