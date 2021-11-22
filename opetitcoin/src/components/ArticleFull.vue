<template>
    <main>
        <section>
            <div class="FullArticle">
                <div class="ProfilAndCommentForm">
                    <div class="Left">
                        <div class="Left__content">
                            <div class="FullArticle__info-author">                       
                                <span class="FullArticle__author">{{authName}}</span>
                            </div>
                            <div class="FullArticle__dateTime">a créé cet article le {{date.slice(0,10)}}
                            </div>                       
                            <div class="FullArticle__score">
                                <ScoreToilette />
                            </div>                                                
                        </div>                         
                    </div>
                    <div class="LeftCommentForm">
                        <CommentForm />
                    </div>
                </div>
                <div class="Right">
                    <div class="Right__Article-color">
                        <div class="PictureList" :style="{ backgroundImage: 'url(' + featuredMedia + ')'}">
                        </div>                        
                        <div class="FullArticle__description">
                            <h2>{{ title }}</h2>
                            <p v-html="content"></p>
                        </div>
                    </div>
                    <CommentSection />               
                </div>
                <div class="RightMobile">
                    <div class="RightMobile__Article-color">
                        <div class="PictureAndProfile">
                            <div class="PictureList" :style="{ backgroundImage: 'url(' + featuredMedia + ')'}">
                            </div>                       
                            <div class="RightMobile__content">
                                <div class="FullArticle__info-author">                       
                                    <span class="FullArticle__author">{{authName}}</span>
                                </div>
                                <div class="FullArticle__dateTime">a créé cet article le <br>
                                    {{date.slice(0,10)}}
                                </div>                       
                                <div class="FullArticle__score">
                                    <ScoreToilette />
                                </div>                                                
                            </div>
                        </div>
                        <div class="FullArticle__description">
                            <h2>{{ title }}</h2>
                            <p v-html="content"></p>
                        </div>
                    </div>
                    <div class="LeftCommentForm">
                        <CommentForm />
                    </div> 
                    <CommentSection />            
                </div>
            </div>
        </section>  
    </main>
</template>

<script>
import CommentSection from "./CommentSection";
import ScoreToilette from "./ScoreToilette";
import CommentForm from "./CommentForm";

export default {
    name: 'ArticleFull',
    components: {
       CommentSection,
       ScoreToilette,
       CommentForm
    },
    props: {
      title: String,
      content: String,
      featuredMedia: String,
      author: Number,
      date: String,
      authName: String,
      result: Number
    },
     data(){
       return{
         commentData: []
       }
     },
}     

</script>

<style  lang="scss">

@import "../assets/scss/mixins";
@import "../assets/scss/variables";
.FullArticle {

    display: flex;

    @include small-only {
        // display: flex;
        // flex-flow: column wrap;
        //justify-content: space-around;
        margin: 0 0em 1em 1.25em;
        width: 90%;
    }
    
    .ProfilAndCommentForm {
        @include small-only {
            display: none;
        }
    }

    .Left {
        background-color: $BackgroundProfil;
        opacity: 0.88;
        border-radius: 0.8em;
        padding: 3em;
        margin: 0em 1em 27em 1em;

        &__content {
            width: 70%;
            text-align: center;
            line-height: 2em;
            margin: auto;
        }
        
        .FullArticle__info-author {
            font-size: 2em;
            font-weight: bold;
            color: $TextConnect;
        }

        .FullArticle__dateTime {
            font-size: 1.5em;
            color: $TextConnect;
        }
    }

    .RightMobile {
        @include medium {
        display: none;  
        }
        //width: 80%;
        
        .RightMobile__Article-color {
            display: flex;
            flex-direction: column;
            background-color: $BackgroundArticle;
            opacity: 0.88;
            border-radius: 0.8em;
            text-shadow: 2px 2px 4px #000000ab;
            text-align: center;
            width: 20em;
        
            .PictureAndProfile {
                display: flex;
                flex-direction: column;
            }

            .PictureList {
              
                background-size: contain;
                background-repeat: no-repeat;
                height: 9.5em;
                width: 9.5em;
                margin: 1em auto;
                padding: 1em;
            }

            .RightMobile__content {
                //width: 70%;
                text-align: center;
                line-height: 2em;
                margin-top: -5em;
                color: $TextHeader;
                padding-bottom: 1em;                              
                
                .FullArticle__info-author {
                    font-size: 1.5em;
                    font-weight: bold;
                    padding-bottom: 0.5em;
                    padding-top: 1em;
                    word-wrap: break-word;                    
                }

                .FullArticle__dateTime {
                    font-size: 1em;
                    line-height: 1em;
                    padding-bottom: 0.5em;
                }
            }
        }
                .FullArticle__description {
                    width: 90%;
                    margin: auto;           
                
                    h2 {
                        font-size: 2.5em;
                        font-weight: bold;
                        color: $TextHeader; 
                        word-wrap: break-word;               
                    }
                    p {
                        font-size: 1.2em;
                        color: $TextHeader;
                        padding-bottom: 1.2em;    
                        word-wrap: break-word;                
                    }
                }
                    
                .FullArticle__comment {
                    display: flex;
                    flex-flow: column wrap;
                    //margin-left: 5em;

                    h2{
                        text-align:center;
                        word-wrap: break-word;
                        font-size: 2em;
                    }
                }
            
        .CommentList {
            position: relative;
            background-color: rgba(243, 241, 239, 0.7);
            //padding: 3em;
            border-radius: 0.8em;
            //max-width: 65em;
            //min-width: 60em;
            //display: flex;
            //flex-direction: row;
            
            h4 {

                text-align: center;
            }

            &__author {

                margin: 1em 0em 2em 0em;
            }

            &__exerpt {

                margin: 2em 0;
                line-height: 1.2em;
                color: $TextConnect;
                font-size: 1.2em;p {
                    overflow: auto;
                    height: 7em;
                }
            }
        
        &__choice {

            margin-bottom: 2em;
        }

        .UserPicture {

        height: 4em;
        }

        .FullArticle__score {

        color: $TextConnect;
        text-align: left;
            p {
                padding-top: 0.5em;
                padding-bottom: 0.5em;
                font-size: 2em;
                font-weight: bold;
            }
        }

        .label {
        margin: 1em;
        line-height: 2em;
        }    
    }
    }
    
    
    

    
    .Right {

    @include medium {
        width: 70%;  
    }

    @include small-only {
        display: none;         
    }

        
        &__Article-color {
            display: flex;
            flex-direction: row;
            background-color: $BackgroundArticle;
            opacity: 0.88;
            border-radius: 0.8em;
            padding: 1em;
            text-shadow: 2px 2px 4px #000000ab;

            .PictureList {
                width: 40em;
                background-size: contain;
                background-repeat: no-repeat;
            }
        }

        .FullArticle__description {
            line-height: 1.5em;
            //margin: 3em;
            width: 45em;
            h2 {
                font-size: 3em;
                font-weight: bold;
                color: $TextHeader;
                line-height: 1.3em;
                padding-bottom: 1.2em;
            }
            p {
                text-align: justify;
                font-size: 1.2em;
                color: $TextHeader;
                padding-bottom: 1.2em;                    
            }
        }
            
        .FullArticle__comment {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            h2{
                text-align:center;
                font-size: 1.5em;
            }
        }

            .CommentList {
            position: relative;
            padding: 3em;
            border-radius: 0.8em;                
            h4 {
                text-align: center;
            }

            &__author {
                margin: 1em 0em 2em 0em;
            }

            &__exerpt {
                margin: 2em 0;
                line-height: 1.2em;
                color: $TextConnect;
                font-size: 1.2em;
                p {
                    overflow: auto;
                    height: 7em;
                }
            }

            &__choice {
                margin-bottom: 2em;
            }

            .UserPicture {
                height: 4em;
            }

            .FullArticle__score {
            color: $BackgroundArticle;
            text-align: left;
                p {
                    padding-top: 0.5em;
                    padding-bottom: 0.5em;
                    font-size: 1.5em;
                }
            }

            .label {
            margin: 1em;
            line-height: 2em;
            }    
        }
    }
    
}

</style>