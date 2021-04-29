<template>
    <main class="Main-contact">   
        <h2>Nous contacter</h2>
        <form id="app" @submit="checkForm" action="opetitcoin7@gmail.com" method="post">      
            <div class="contact">
                <div class="field">
                    <label class="field__label">Prénom</label>
                    <input
                        class="field__input"
                        type="text"
                        placeholder="votre prénom"
                        v-model="nickname"
                    />
                </div>
                <div class="field">
                    <label class="field__label">Nom</label>
                    <input
                        class="field__input"
                        type="text"
                        placeholder="votre nom"
                        v-model="name"
                    />
                </div>
                <div class="field">
                    <label class="field__label">Adresse e-mail</label>
                    <input
                        class="field__input"
                        type="text"
                        placeholder="votre adresse email"
                        v-model="email"
                    />
                </div>
                <div class="field">
                    <label class="field__label">Commentaire</label>
                    <textarea
                        class="field__input"
                        placeholder="commentaire / signalement d'un abus"
                        v-model="message">
                    </textarea>
                </div>
            </div>          
            <button type="submit" value="Submit" class="button">Envoyer</button>
        </form> 
    </main>
</template>

<script>
export default {
    name: 'Contact',
   data(){
       return{
            errors: [],
            nickname: null,
            name: null,
            email: null,
            message: null
       }
      
    },
    methods: {
        checkForm: function (e) {
            if (this.name && this.nickname && this.email && this.message) {
                return true;
            }

            this.errors = [];

            if (!this.name) {
                this.errors.alert('Nom requis !');
            }
            if (!this.nickname) {
                this.errors.alert('Prénom requis !');
            }
            if (!this.email) {
                this.errors.alert('Email requis !')
            }
            e.preventDefault();
       }
   }
}
</script>

<style scoped lang="scss">
@import "../assets/scss/variables";
@import "../assets/scss/mixins";
@import "../assets/scss/forms";

input {
    width: 40%;
    margin  : auto;
    @include small-only {
        width: 65%;
    }
}
textarea {
    font    : .9em/1.5em "handwriting", sans-serif;

   border  : none;
   padding : 0 10px;
   margin  : auto;
   width   : 40%;
   background: none;
   @include small-only {
        width: 70%;

}
}
.contact {
        
    @include small-only {
        display: flex;
        flex-flow: column wrap;       
    }

} 

</style>