<template>
    <router-link :to="{ name: 'utilisateur', params: {id: utilId}}" >
        <a class="MainMenu__item"> {{ name }} </a>
    </router-link>
</template>
<script>
export default {
  name: "HeaderTax",

  props: {
      name: String,
      utilId: Number
  }
}
</script>