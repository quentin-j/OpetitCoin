<template>
    <main class="Main-register">
        <h2>Créer un compte</h2>
        <form @submit.prevent="addUser">
            <fieldset>
                <div class="register">
                    <div class="field">
                        <label class="field__label">Pseudo</label>
                        <input class="field__input" type="text" placeholder="PQNATOR" v-model="user.username" />
                    </div>
                    <div class="field">
                        <label class="field__label">Adresse e-mail</label>
                        <input class="field__input" type="text" placeholder="WC@OPC.com" v-model="user.email" />
                    </div>           
                    <div class="field">
                        <label class="field__label">Mot de passe</label>
                        <input class="field__input" type="password" placeholder="Entrez votre mot de passe" v-model="user.password" />
                    </div>
                    <div class="field">
                        <label class="field__label">Confirmation du mot de passe</label>
                        <input class="field__input" type="password" placeholder="Confirmez votre mot de passe" v-model="password_confirmation" />
                    </div>
                </div> 
            </fieldset>
                <div>
                    <div class="confirm">
                        <router-link :to="{name: 'cgu'}">
                            <label class="field__CGU">conditions générales d'utilisation </label>
                        </router-link>
                        <div class="borderCheck">
                            <input type="checkbox" id="checkbox" v-on:click="toggleButton" />
                        </div>
                        <div class="confirmButton" v-show="ccc">
                            <button class="button" >Créer le compte</button>
                        </div>
                    </div>
                </div>
        </form>
    </main>
</template>

<script>
import AuthenticationService from '../services/AuthenticationService';

export default {
    data() {
        return {
            user: {
                username:'',
                passord:'',
                email:''

            },
            password_confirmation: '',
            ccc: false
        };
    },
    methods: {
        addUser() {
            AuthenticationService.createUser(this.user)
        },
        toggleButton(){
            this.ccc = !this.ccc;
        }
    },
   

}
</script>

<style scoped lang="scss">
@import "../assets/scss/variables";
@import "../assets/scss/mixins";
@import "../assets/scss/forms";

.confirm{
    margin: 2rem;
    

     .field__CGU {
        font-size: 20px;
        text-decoration: underline;
        color: blue;
        margin: 1rem;
        @include small-only {
            font-size: 1.1em;            
            }       
    }

    
    #checkbox {
        width: 2em;
        height: 2em;       
    }

    .confirmButton {
        margin-top: 2rem;
    }
}

</style>