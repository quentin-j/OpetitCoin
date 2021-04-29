<template>
    <div class="CommentList CommentForm">
        <form @submit.prevent="addComment">
            <div class="label">
                <label for="commentaire">Commentaire:</label>
                <textarea type="text" name="commentaire" placeholder="Ajoutez le vôtre" id="commentaire" v-model="commentSubmit.content" ></textarea><br>

                <label class="field__input" for="scoreClean">Propreté</label>
                <input type="number" placeholder="maximum 5" min="0" max="5" class="field__input" v-model="commentSubmit.meta.score_clean" /><br>

                <label class="field__input" for="scoreClean">Équipement</label>
                <input type="number" placeholder="maximum 5" min="0" max="5" class="field__input" v-model="commentSubmit.meta.score_equipment" /><br>

                <label class="field__input" for="scoreClean">Confort</label>
                <input type="number" placeholder="maximum 5" min="0" max="5" class="field__input" v-model="commentSubmit.meta.score_confort" /><br>

                <input type="hidden"  v-if="commentSubmit.meta.result=(parseInt(commentSubmit.meta.score_confort) + parseInt(commentSubmit.meta.score_clean) + parseInt(commentSubmit.meta.score_equipment))/3" v-bind:value="commentSubmit.meta.result"  v-on:input="commentSubmit.meta.result" />
                    
            </div>
            <button class="button">Ajouter le commentaire</button>
        </form>                       
    </div>
</template>

<script>
import CommentService from "../services/CommentService"

export default {
    name: "CommentForm",
    data: function() {
        return {
            commentSubmit: {
                meta:{},
                content:''
            },
        };
    },
    methods: {
        addComment() {
            CommentService.createComment(this.$route.params.id, this.commentSubmit)
        },
    }
}
</script>

<style  lang="scss">
@import "../assets/scss/variables";
@import "../assets/scss/mixins";

.CommentForm {
    @include medium {
    min-width: 22em;
    max-width: 22em;   
    }
    @include small-only {
        width: 18em;
        margin: 0;
    }
    background-color: $ToilettePaper;
    color: $TextConnect;
    border-radius: 1em;
    padding: 1em;
    opacity: 0.88;
    margin-bottom: 1em;
    margin-left: 1em;

    Form {
        @include small-only {
            //margin: auto;
            width: 15em; 
        }
    }

    label {
        padding-bottom: 10em;
    }
    .field__input {
        margin-bottom: 1em;
    }

    input{
        border : 1px #970015 solid;
          border-radius: 5em;
          padding-left: 1.5rem;
        //margin-left: 2rem;
        @include small-only {
            //width   : 10rem;
            //height  : 4rem;
            font-size: 0.7em;
        }
    }
    textarea {

        display : block;

        padding : 10px;
        margin  : 10px 0;
        width   : 20rem;
        height  : 5rem;
        border-radius: 1em;

        resize  : none;
        overflow: auto;
        @include small-only {
            width   : 15rem;
            height  : 4rem;
            font-size: 1em;
        }
    }

    button {
     @include small-only {
            //width   : 20rem;
            height  : 6rem;
            font-size: 1em;
        }   
  

  padding      : 5px;
  
  font         : bold .6em sans-serif;
  border       : 2px solid #333;
  border-radius: 5px;
  background-color: #F0F;

-webkit-transform: rotate(-1.5deg);
   -moz-transform: rotate(-1.5deg);
    -ms-transform: rotate(-1.5deg);
     -o-transform: rotate(-1.5deg);
        transform: rotate(-1.5deg);
}
     button:hover{

   transition-duration: 1s;

   -webkit-transform: rotate(1.5deg);
   -moz-transform: rotate(1.5deg);
   -ms-transform: rotate(1.5deg);
   -o-transform: rotate(1.5deg);
        transform: rotate(1.5deg);
   padding: 1rem; 
     }
}
</style>