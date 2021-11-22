<template>
    <div>
        <main>
            <section>
                <div class="ArticleListTitle">
                    <h3>Pour voir toutes les toilettes répertoriées, c'est par ici. Vous êtes bien assis ?</h3> 
                </div>
                <div class="ArticleList">              
                    <ArticleExcerpt
                      v-for="toilette in toiletteListData"
                      :key="toilette.id"
                      :author="toilette.author"
                      :title="toilette.title.rendered"
                      :excerpt="toilette.excerpt.rendered"
                      :featuredMedia="toilette.featured_media_url"
                      :toiletteID="toilette.id"      
                    />        
                </div>      
            </section>       
        </main>
    </div>
</template>

<script>

import ArticleExcerpt from "./ArticleExcerpt";
import ToiletteService from "../services/ToiletteService";

  export default {
    data: function () {
      return {
        // ici, on récupèrera les articles depuis l'API
        toiletteListData: [],
      };
    },

  name: "ArticleList",
  components: {
    ArticleExcerpt,
  },

  created: function () {
    // created : Hook "le composant est créé"
    ToiletteService.getToiletteList()
    // si la requête se passe bien, on rentre dans le then
    .then((response) => {
      this.toiletteListData = response.data;
    })
    // si axios a un souci avec la requête, on rentre dans le catch
    .catch( (error) => {
      alert(error);
    });
  },
};
</script>

<style lang="scss">

@import "../assets/scss/mixins";
@import "../assets/scss/variables";

.ArticleListTitle {
  margin: auto;
  font-size: 1.5em;
  color: $TextConnect;
  background-color: rgba(255, 255, 255, 0.6);
  width: 61%;
  padding: 0.5em;
  @include small-only {
    //font-size: 3em;
    display: none;
    width: 60%;
    text-align: center;
    font-size: 1em;
    
  }
}

.ArticleList {

    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    // align-items: center;  
      
    @include small-only {
        display: flex;
        flex-direction: column;
        margin: auto;
    }
    
}

 </style>