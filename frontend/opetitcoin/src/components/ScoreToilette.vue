<template>
    <div class= "GlobalScore">
        <p>score global /5</p>                   
        <div class="score">                      
            <div v-for="p in 5" :key="p"> 
                <div v-if="p<=addResult()">
                    <i class="win fas fa-toilet-paper"></i>
                </div>
                <div v-else-if="p=[0]">
                    <p></p>
                </div>
                <div class="nony" v-else>                    
                    <i class="test-black fas fa-poo"></i><!--étoile vide à changer si posible pq vide ou background gris-->
                </div><!--fin de la condition-->
            </div>
        </div>
    </div>
</template>

<script>
import CommentService from "../services/CommentService"

export default {
    name: 'ScoreToilette',

    data() {
        return{
            commentsDatas: [],
        }
    },

    created: function () {
        CommentService.getCommentList(this.$route.params.id)
            .then((response) => {
                console.log(response.data);
                this.commentsDatas = response.data;
            })
            .catch( (error) => {
                alert(error);
            });
    },

    methods: {
        addResult (){
            let cal_moyenne_total = 0;

             for(let z = 0; z < this.commentsDatas.length; z++){
                cal_moyenne_total = cal_moyenne_total + parseInt(this.commentsDatas[z].meta.result[0]);
             }

             return parseInt(cal_moyenne_total/this.commentsDatas.length);                
        }
    }
}
</script>

<style lang="scss">

@import "../assets/scss/variables";
@import "../assets/scss/mixins";
.GlobalScore {
    font-size: 1.5em;    
    font-weight: bold;    
    color: $TextConnect;

    @include small-only {
        color: $TextHeader;
        //font-size: 3em;
        p {
            padding-bottom: 0.7em;
        }        
    }
}
.score {
    display: flex;
    flex-direction: row;
    @include medium {
        justify-content: center;
    }
    margin: auto;

     @include small-only {
         justify-content: center;
     }

     .win {
        color: $ToilettePaperBis;
    @include small-only {
       margin-left: 0.5em;       
 
   }
}

}
</style>