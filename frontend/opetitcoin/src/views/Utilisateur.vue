<template>
    <div class="ArticleList">
        <UtilisateurList v-for="toiletteUtilisateur in utilisateurData"
            :key="toiletteUtilisateur.id"
            :title="toiletteUtilisateur.title.rendered"
            :excerpt="toiletteUtilisateur.excerpt.rendered"
            :featuredMedia="toiletteUtilisateur.featured_media_url"
            :toiletteUtilisateurId="toiletteUtilisateur.id"
        />
    </div>
</template>

<script>
import UtilisateurList from '../components/UtilisateurList'
import ToiletteService from '../services/ToiletteService'

export default {
    name: 'Utilisateur',
    components: {
        UtilisateurList
    },

    data() {
        return{
            utilisateurData: []
        }
    },

    beforeMount: function(){
        ToiletteService.getUtilisateur(this.$route.params.id).then((response) => {

            console.log(response.data);
            this.utilisateurData = response.data
        })
    }
}
</script>

<style  lang="scss">

@import "../assets/scss/mixins";

.ArticleList {

    display: flex;
    flex-direction: row;
    flex-wrap: wrap;  
      
    @include small-only {
        display: flex;
        flex-flow: column wrap;
        //margin-left: 5em;
    }
}

 </style>