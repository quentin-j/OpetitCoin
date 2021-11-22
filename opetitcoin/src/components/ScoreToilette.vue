<template>
    <div class= "GlobalScore">
        <p>score global /5</p>                   
        <div class="score">                      
            <div v-for="p in 5" :key="p"> 
                <div v-if="p<=addResult()">
                    <i class="win fas fa-toilet-paper"></i>
                </div>
                <div class="nony" v-else>                    
                    <i class="fail fas fa-poo"></i>
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
            console.log(parseInt(cal_moyenne_total/this.commentsDatas.length));
             return Math.round(parseInt(cal_moyenne_total/this.commentsDatas.length));                
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
    .fail {
        color: $CouleurCacaEmoji;
    }
}
</style>