<template>
    <footer class="Footer">
        <div class="FooterLeft">
            <div class="LittleWords">
                <p>
                    Notre joyeuse équipe est fière de vous proposer l'application dont vous rêviez : un site de notation des toilettes ! Parce qu'on a tous besoin d'un endroit de qualité où faire nos besoins, nous avions dans un (petit) coin de nos têtes cette envie (pressante) de vous permettre de faire des commentaires notés sur ces lieux privilégiés dont la propreté, les équipements et le confort sont garants d'un agréable moment. &Agrave; vos papiers !
                </p>
            </div>
        </div>
        <div class="FooterRight">
            <div class="Footer__info">
                <nav>
                    <ul class="footer__links">
                        <li class="footer__links__item"><router-link :to="{ name: 'contact'}">Contact</router-link></li>
                        <li class="footer__links__item"><router-link :to="{ name: 'cgu'}">Mentions légales + CGU</router-link></li>
                        <li class="footer__links__item"><router-link :to="{ name: 'register'}">Formulaire d'inscription</router-link></li>
                    </ul>
                </nav>
            </div>
            <div class="footer__social social">
                <nav>
                    <div>
                        <ul class="social__links">
                            <li>
                                <a href="" class="social__links__item"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="" class="social__links__item"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="" class="social__links__item"><i class="fab fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>    
    </footer>
</template>

<script>
export default {
    name: 'Footer',
    props: {
      msg: String
    }
}

</script>

<style  lang="scss">
@import "../assets/scss/variables";
@import "../assets/scss/mixins";

.Footer {

    background-color: $BackgroundArticle;
    opacity: 0.88;
    color: #FFF;
    display: flex;
    flex-direction: row;


    @include small-only {
        display: flex;
        flex-flow: column wrap;   
        justify-content: cover;         
    }
    

    a {
        color: #FFF;
    }

    .FooterLeft {
        .LittleWords {
            border-right: 3px solid black;
            line-height: 1.4;
            padding: 1em 2em;
            margin-top: 1.2em;
            margin-bottom: 1.2em;
            text-align: justify;        
            @include small-only {
                display: none;
            }
        }
    }

    .FooterRight {
        padding-top: 1em;
        padding-bottom: 1em;
        margin-top: 1.2em;
        margin-bottom: 1.2em;
        display: flex;
        flex-direction: row;
        justify-content: space-around;

        .Footer__info {
            @include medium {
                .footer__links {
                    display: flex;
                    flex-flow: row;
                    padding-left: 2em;
                    padding-bottom: 0.7em;
                }             
            }

            .footer__links__item {

                margin-top: 0.5em;
                margin-right: 1em;
            }

            .footer__links__item, a:hover{
                color: #FF8E00;
                font-weight: bold;
            }
        }

        .footer__social {

            .social {
                margin-top: 0.5em;
                margin-bottom: 1em;
                padding-bottom: 1em;

                &__links {
                    display: flex;
                    justify-content: center;
                    li {
                        display: inline-block;
                        margin-right: 1em;
                        .social__links__item, i{
                            padding-top: 1em;
                        }

                        a {
                            color: #FFF;
                        }

                       .fa-facebook-f:hover{
                            color: #1773EA;
                        }

                        .fa-twitter:hover{
                            color: #1C9CEB;
                        }

                        .fa-instagram:hover{
                            color: #EF782A;
                        }
                    }
                }
            }
        }
    }
}
</style>