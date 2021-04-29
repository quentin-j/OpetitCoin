<template>

    <main>
        <section>
            <div class="ArticleList">
                <CategorieList v-for="toilettePlace in placeData"
                    :key="toilettePlace.id"
                    :title="toilettePlace.title.rendered"
                    :excerpt="toilettePlace.excerpt.rendered"
                    :featuredMedia="toilettePlace.featured_media_url"
                    :toilettePlaceId="toilettePlace.id"
                />
            </div>
        </section>
    </main>

</template>

<script>
import CategorieList from '../components/CategorieList'
import ToiletteService from '../services/ToiletteService'

export default {
    name: 'Categorie',

    components: {
        CategorieList
    },
    
    data() {
        return{
            placeData: []
        }
    },

    beforeMount: function(){
        ToiletteService.getPlace(this.$route.params.id).then((response) => {
            console.log(response.data);
            this.placeData = response.data
        })
    }
}
</script>

<style scoped lang="scss">

@import "../assets/scss/variables";
@import "../assets/scss/mixins";

.ArticleList {

    display: flex;
    flex-direction: row;
    flex-wrap: wrap;  
      
    @include small-only {
        display: flex;
        flex-flow: column wrap;
        margin-left: 5em;
    }
    
}
 </style>