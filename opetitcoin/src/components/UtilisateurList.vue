<template>
    <router-link :to="{ name: 'toilette', params: { id: toiletteUtilisateurId }}">
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
    name: 'UtilisateurList',

    props: {
        title: String,
        excerpt: String,
        featuredMedia: String,
        toiletteUtilisateurId: Number
    }
}
</script>
<style lang="scss">

@import "../assets/scss/variables";
@import "../assets/scss/mixins";

.ExcerptUtil {

    background-color: rgba(243, 241, 239, 0.7);    
    display: flex;
    flex-direction: column;
    justify-content: center;
    margin: 2em;
    width: 300px;
    text-align: center;
    @include small-only {
        //width: 16em;
        margin: 2em auto;
    }
    
    .PictureList {
        width: 15em;
        height: 15em;
        border-radius: 6px;
        background-repeat: no-repeat;
        background-size: contain;
        padding: 1em;
        margin: 1em;
        @include small-only {
            width: 12em;
            height: 12em;
        }        
    }

    h3 {
        font-weight: bolder;
        margin-top: -4em;
        padding-top: 1em;
    }

    h4 {
        font-weight: bolder;
        margin-top: 1em;
        padding-bottom: 1em;
    }

    .excerpt {
        margin-top: 1em;
    }

    .score { 
        display: flex;
        margin-top: 2em;
        margin-left: 7em;
        margin-bottom: 1em;

        .win {
            color: $ToilettePaper;
        margin-bottom: 5px;
        }

        .loose {
            color: grey;
            margin-bottom: 5px;
        }
    }
}

</style>