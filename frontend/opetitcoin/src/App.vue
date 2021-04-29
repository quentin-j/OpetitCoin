<template>
    <div id="app">
        <Header />
        <router-view />
        <Footer />
    </div>
</template>

<script>
import AuthenticationService from "./services/AuthenticationService";
import Header from "./components/Header.vue";
import Footer from "./components/Footer.vue";

export default {
  name: "App",

  components: {
    Header,
    Footer,
  },

  beforeCreate: function () {
    AuthenticationService.isConnected();
  }
};

</script>

<style lang="scss">
@import "./assets/scss/variables";
@import "./assets/scss/mixins";


html {
    font-size: 16px;

body {
    background-color: $BackgroundHtml;
    background-image: url('./assets/image/backgroundHTML.png');
}

// * {
//     box-sizing: border-box;
// }

section {

    margin-top: 3em;
   }

a {
    text-decoration: none;
}
}





</style>

