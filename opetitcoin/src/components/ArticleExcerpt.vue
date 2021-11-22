<template>  
    <router-link :to="{ name: 'toilette', params: { id: toiletteID }}">       
        <article class="ExcerptUtil">
            <div class="PictureList" :style="{backgroundImage: 'url(' + featuredMedia + ')'}">
            </div>
            <h3>{{ title }}</h3>
            <div class="excerpt">
                <p v-html="excerpt"></p>
            </div>
        </article>        
    </router-link> 
</template>

<script>

export default {
    name: 'ArticleExcerpt',
    props: {
      toiletteID: Number,
      title: String,
      author: Number,
      excerpt: String,
      featuredMedia: String,
        },
  
}
</script>

<style lang="scss">

@import "../assets/scss/mixins";
@import "../assets/scss/variables";

.ExcerptUtil {

    background-color: rgba(243, 241, 239, 0.7);
    margin: 2em 2em 2em 4em;
    width: 16em;
    text-align: center;
    color: $TextConnect;
    @include small-only {
            //width: 80%;
        align-items: center;
        margin: 2em auto;
           
        }     
    
    .PictureList {   
        width: 15em;
        height: 15em;
        border-radius: 6px;
        background-repeat: no-repeat;
        background-size: contain;
        margin: 0.5em;
        @include small-only {
            width: 12em;
            height: 12em;
        }     
    }

    h3 {
        font-weight: bolder;
        margin-top: -4em;
    }

    h4 {
        font-weight: bolder;
        margin-top: 1em;
        padding-bottom: 1em;
    }

    .excerpt {
        margin-top: 1em;
        padding-bottom: 0.5em;
    }
}

</style>