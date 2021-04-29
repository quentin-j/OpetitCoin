<template>
    <div>
        <div class="CommentTitle">
          <h2>Commentaires</h2>
        </div> 
        <div class="FullArticle__comment">  
            <CommentList v-for="comments in commentData"
              :key="comments.id"
              :author="comments.author_name"
              :content="comments.content.rendered"
              :scoreConfort="parseInt(comments.meta.score_confort)"
              :scoreClean="parseInt(comments.meta.score_clean)"
              :scoreEquipment="parseInt(comments.meta.score_equipment)"
              :result="parseInt(comments.meta.result)"
            />
        </div>
    </div>
</template>

<script>
import CommentList from "./CommentList";
import CommentService from "../services/CommentService";

export default {
    name: "CommentSection",

    components: {
        CommentList
    },

    data(){
        return{
            commentData: []
        }
    },

    created: function () {
        // created : Hook "le composant est créé"
        CommentService.getCommentList(this.$route.params.id)
        // si la requête se passe bien, on rentre dans le then
        .then((response) => {
          this.commentData = response.data;
        })
        // si axios a un souci avec la requête, on rentre dans le catch
        .catch( (error) => {
          alert(error);
        });
    }
}
</script>

<style lang="scss">

@import "../assets/scss/variables";
@import "../assets/scss/mixins";
.CommentTitle {
  margin-top: 2em;
  text-align: center;
  font-size: 2em;
  font-weight: bold;
  color: $TextConnect;
  padding-right: 1em;

  @include small-only {
    //padding: 0 3em;
    display: none;
  }
  
  h2 {
    @include small-only {
      text-align: start;
      padding-left: 2em;
    }

    overflow: hidden;
    white-space: nowrap;
    letter-spacing: .45em;
    animation: 
      typing 3.5s steps(40, end),
      blink-caret .75s step-end infinite;
  }
  @keyframes typing {
    from { width: 0 }
    to { width: 100% }
  }
}

</style>