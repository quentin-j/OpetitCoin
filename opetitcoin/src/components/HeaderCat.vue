<template>
    <router-link :to="{ name: 'place', params: { id: catId}}" >
        <a class="MainMenu__item">{{ name }}</a>
    </router-link>
</template>
<script>
export default {
  name: "HeaderCat",

  props: {
      name: String,
      catId: Number
  }
}
</script>