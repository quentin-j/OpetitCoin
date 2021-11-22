<template>     
    <article class="CommentList">
        <div class="CommentList__author">
            <h2>{{ author }}</h2>
        </div>
        <div class="CommentLeft">
            <time class="CommentList__date" datetime="09/02/2021"></time>       
            <div class="FullArticle__score">
                <div class="CPE">
                <p>Confort</p>
                <div class="CommentScore">                        
                    <div v-for="i in 5" :key="i"> 
                        <div v-if="i<= scoreConfort"> <!--si i est < et égal à score_confor alors tu affiche le pq qu'il y a plus bas-->
                            <i class="win fas fa-toilet-paper"></i>
                        </div><!--fin de la boucle-->
                        <div class="nony" v-else><!--si il reste des pq vide<5 alors affiche les pq gris-->
                            <i class="test-black fas fa-poo"></i><!--étoile vide à changer si posible pq vide ou background gris-->
                        </div><!--fin de la condition-->
                    </div>
                </div>
                <p>Propreté</p>
                <div class="CommentScore">                        
                    <div v-for="j in 5" :key="j"> 
                        <div v-if="j<= scoreClean">
                            <i class="win fas fa-toilet-paper"></i>
                        </div>
                        <div class="nony" v-else>
                            <i class="test-black fas fa-poo"></i>
                        </div>
                    </div>
                </div>
                <p>Équipement</p>
                <div class="CommentScore">                        
                    <div v-for="k in 5" :key="k"> 
                        <div v-if="k<= scoreEquipment"> 
                            <i class="win fas fa-toilet-paper"></i>
                        </div>
                        <div class="nony" v-else>
                            <i class="test-black fas fa-poo"></i>
                        </div>
                    </div>
                </div>
                </div>
                <div class="glob">
                <div class="GlobalCommentTitle">
                    <p class="globalP">Global</p>
                </div>
                <div class="CommentScore">                        
                    <div v-for="l in 5" :key="l"> 
                        <div v-if="l<= result">
                            <i class="win fas fa-toilet-paper"></i>
                        </div>
                        <div class="nony" v-else>
                            <i class="test-black fas fa-poo"></i>
                        </div>
                    </div>                
                </div>
                </div>
            </div>
        </div> 
        <div class="commentRight">
            <div class="CommentList__exerpt">
                <p v-html="content"></p>
            </div>
            <!--TODO V2 routes ok-->
            <!-- <div class="abus">
                <i class="fas fa-exclamation-triangle"></i>
                <router-link :to="{name: 'contact'}">
                <a href="#">Signaler un abus</a>
                </router-link>
            </div> -->
        </div>     
    </article>
</template>

<script>
    
export default {
    name: "CommentList",
    props: {
        author: String,
        content: String,
        scoreConfort: Number,
        scoreClean: Number,
        scoreEquipment: Number,
        result: Number
    }
}
</script>

<style  lang="scss">

@import "../assets/scss/variables";
@import "../assets/scss/mixins";
.CommentList {


    background-color: rgba(255, 255, 255, 0.6);
    @include medium {
        margin: 1em;
        width: 33.6em;
    }
    @include small-only {
        width: 19em;
        border-bottom: 2px dashed black;
        padding-left: 1em;
    }

    .CommentList__author {
    h2 {
        font-size: 3em;
        font-weight: bold;
        color: $TextConnect;  
    }
    }

    .GlobalCommentTitle {
        width: 4.5em;
        background-color: $BackgroundArticle;
        color: #ffd700;
        margin-top: 0.5em;
        margin-bottom: 0.2em;
        margin-left: 1em;
        font-weight: bold;
        opacity: 0.88;
        border-radius: 2em;

        @include small-only {
            width: 6em;
        }
    }

    .CommentLeft {
        margin: auto;
//     @include small-only {
//         padding: 0 3em;
//         margin: 0;
//     }

        .FullArticle__score{
             @include medium {
                 display: flex;
                    justify-content: space-around;
                }
                
            .CommentScore{
                display: flex;
               

                i, .win {
                    color: $ToilettePaperBis;
                    font-size: 1.5em;
                }
                .test-black {
                    color: $CouleurCacaEmoji;
                    font-size: 1.3em;
                }
            }
            
        }
    }

    // TODO V2

// .commentRight {
//     @include small-only {
//         p {
//             font-size : 1.5em;
//             line-height: 1.2em;
//             text-align: justify;
//         }
//     }
    // .abus {
//     position: absolute;
//     bottom: 0;
//     padding-bottom: 0.5em;
//     padding-right: 1em;
//     width: 70%;
//     @include small-only {
//         font-size : 1.5em;
//     }
// }
//}
}
</style>
