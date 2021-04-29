<template>
    <header>
        <div class="ContainerHeader">
            <div class="Container__up">
                <router-link :to="{name:'home'}">
                <h1>O'petitCoin</h1>
                </router-link>
                <div class="compte">
                    <div class="Connection">
                        <router-link v-if="!isConnected" :to="{ name: 'login'}">Vous avez un compte ? <i class="fas fa-restroom"></i></router-link>
                        <div v-if="isConnected" class="user">
                            <span class="username">Bonjour {{ username }} </span>
                            <img
                              v-on:click="toggleMenu"
                              class="logo"
                              src="../assets/image/logo.png"
                              />
                            <div v-show="menuShow" class="user-actions">
                                <router-link :to="{name: 'toilette-create'}"><a> Ajouter <span class="cut">un toilette </span><i class="fas fa-toilet"></i></a></router-link>                       
                                <a @click.prevent="disconnectUser"> Déconnexion <i class="fas fa-users-slash"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="Container__center HeaderIntro" >
                <div class="SearchCategoriesBar" >
                    <a class="MainMenu__item" v-on:click="toggleCatMenu">Lieux</a>
                    <div v-show="aaa">
                        <HeaderCat
                            v-for="place in placeData"
                            :key="place.id"
                            :name="place.name"
                            :catId="parseInt(place.id)"
                        />
                    </div>
                </div>
                <div class="SearchTypesBar">
                    <a class="MainMenu__item" v-on:click="toggleUtilMenu">Utilisateurs</a>
                    <div v-show="bbb">
                        <HeaderTax                            
                            v-for="utilisateur in utilisateurData"
                            :key="utilisateur.id"
                            :name="utilisateur.name"
                            :utilId="parseInt(utilisateur.id)" 
                        />
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>

<script>

import AuthenticationService from '../services/AuthenticationService'
import ToiletteService from '../services/ToiletteService'
import HeaderCat from './HeaderCat'
import HeaderTax from './HeaderTax'

export default {
  name: "Header",

  components: {
      HeaderCat,
      HeaderTax
  },

  data() {
      return {
          aaa: false,
          bbb: false,
          menuShow: false,
          placeData: [],
          utilisateurData: []
        
      };
  },

  created: function () {
      ToiletteService.getPlaceList ()
          .then ((response) => {
              this.placeData = response.data; 
          })
          .catch ((error) => {
              alert(error);
          });
      
      ToiletteService.getUtilisateurList ()
          .then ((response) => {
              this.utilisateurData = response.data; 
          })
          .catch ((error) => {
              alert(error);
          });
  },
  computed: {
      isConnected() {
          // on récupère l'état de connexion (booléen) depuis le state
          return this.$store.state.isUserConnected;
      },
      username() {
          return this.$store.state.username;
      },
  },
  methods: {
    disconnectUser() {
        AuthenticationService.disconnectUser()
    },

    toggleMenu() {
        this.menuShow = !this.menuShow;
    },

    toggleCatMenu() {
        this.aaa = !this.aaa;
    },

    toggleUtilMenu() {
      this.bbb = !this.bbb;
    }
  },
};
</script>

<style lang="scss">
@import "../assets/scss/variables";
@import "../assets/scss/mixins";

header {
    @include small-only {
        display: flex;
        flex-flow: column wrap;
        justify-content: space-around;
            
    }  
        
    .ContainerHeader {

        display: flex;
        flex-direction: column;
        background-image: url('../assets/image/backgroundHeader.png');
        background-repeat: no-repeat;                 
        line-height: 1.4;
 
        .Container__up {
            
            padding: 1em;
            display: flex;
            flex-direction: column;

            .logo {
                width: 10rem;
                height: 10rem;
                text-align: center;
                 @include small-only {
                            width: 5rem;
                            height: 5rem;
                        }
            }

            h1 {
                font-size: 3em;
                text-align: center;
                color: $TextHeader;
            }

            .compte {
                text-align: end;
                    
                .Connection {
                    text-align: end;

                    .user  {
                        color: $IsConnect;
                        margin: 1em;
                        font-size: 22px;        
                    }
                        
                    .username {
                        margin-right: 1em,
                    }

                    .user-actions {
                        display: flex;
                        justify-content: flex-end;
                        flex-direction: column; 
                                                                                                                                                      
                        a {
                            width: auto;                                                      
                            text-align: center;
                            align-self: flex-end;

                            .cut{
                        @include small-only {
                            display: none;
                        }
                       }

                            .fa-users-slash {
                                color: cyan;
                            }
                            .fa-toilet {
                                color: cyan;
                            }                                                                                                   
                        }
                                                                    
                    }
                    .fa-restroom {
                        color: cyan;
                    }
                    a {
                        padding: 0.2em;
                        border-radius: 5px;
                        border: $BackgroundHeader;
                        background-color: $NotConnect;
                        margin: 2em;
                        color: black;
                        font-size: 1em;
                         @include small-only {
                             margin: 1em;
                         }
                    }

                    i {
                        color: $TextConnect;
                        padding-left: 0.4em;
                    }
                }
            }
        }

        .Container__center {
            text-align: center;

            .MainMenu__item, a {
                color: #FFF;
                display: inline-block;
                flex-direction: row;
                padding: 0.5em;
                margin-top: 0.5em;
            }

            .MainMenu__item, a:hover {
                transition-duration: 0.5s;
                margin: 1em;
                color: black;
                border-radius: 15px;
                background-color: $ButtonBoxHeader;
            }

            .MainMenu__scrolling {
                color: #FFF;
                margin: 2em;
                border: 0px solid $BackgroundHeader;
                border-radius: 15px;
                padding: 0.5em;
                background-color: $ButtonBoxHeader;
            }

            .MainMenu__scrolling:hover {
                transition-duration: 0.5s;
                padding: 1em;
                color: black;
            }
        }

        .Container__down {

            p {

                padding: 2em;
                margin: 1em;
                text-align: center;
                background-color: rgba(155, 155, 155, 0.3);
                color: darken($NotConnect, 40%);

            }
        }
    }
}
   
</style>
