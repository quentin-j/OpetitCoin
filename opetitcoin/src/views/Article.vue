<template>
    <div>
        <ArticleFull 
        :title="title"
        :content="content"
        :featuredMedia="featuredMedia"
        :author="author"
        :date="date"
        :authName="authData.name"
        />
    </div>
</template>

<script>
import ArticleFull from '../components/ArticleFull';
import ToiletteService from '../services/ToiletteService';

export default {
    components: {
        ArticleFull
    },
    
    name: "Article",

    data(){
        return{
            title: '',
            content: '',
            featuredMedia: '',
            author: 0,
            date: '',
            authData: []
        };
    },
    beforeMount: function (){
        ToiletteService.getToilette(this.$route.params.id).then((response) => {

          //console.log(response.data);
          this.title = response.data.title.rendered;
          this.content = response.data.content.rendered;
          this.author = parseInt(response.data.author);
          this.featuredMedia = response.data.featured_media_url;
          this.date = response.data.date;
      
          ToiletteService.getAuthor(this.author).then((response) => {
            
            this.authData = response.data;
          });    
        });
    }
}
</script>