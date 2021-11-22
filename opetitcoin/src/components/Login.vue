<template>
    <main class="Main-login">
        <h2>Connexion</h2>
        <form @submit.prevent="loginUser">
            <fieldset>
                <div class="login">
                    <div class="field">
                        <label class="field__label">Adresse e-mail</label>
                        <input class="field__input" type="text" placeholder="WalterCloset@opc.com" v-model="emailValue" />
                    </div>
                    <div class="field">
                        <label class="field__label">Mot de passe</label>
                        <input class="field__input" type="password" placeholder="Mot de passe" v-model="passwordValue" />
                    </div>
                </div>                 
            </fieldset> 
            <button class="button">Connexion</button>
        </form>
        <div class="register">
        <router-link :to="{name: 'register'}"><a>Vous n'avez pas de comptes ?</a></router-link>
        </div>
    </main>
</template>

<script>
import AuthenticationService from "../services/AuthenticationService";

export default {
    name:"Login",
    
    data: function () {
        return {
            emailValue: "",
            passwordValue: "",
        };
    },

    methods: {
        loginUser() {
            AuthenticationService.loginUser(this.emailValue, this.passwordValue);
        },
    },
};
</script>

<style scoped lang="scss">

@import "../assets/scss/mixins";
@import "../assets/scss/forms";

.register {
    padding-bottom: 2rem;

    a{
        font-size: 20px;
        text-decoration: underline;
        color: blue;
    }
}
</style>