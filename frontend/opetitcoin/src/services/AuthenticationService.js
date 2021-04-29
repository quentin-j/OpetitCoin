import {
    apiClient,
    authUrlSuffix,
    baseUrlSuffix
} from "./ApiClient"

import router from '../routes'
import store from '../store'

export default {

    loginUser(login, password) {
        // objectif : récupérer un token à partir des identifiants de connexion
        apiClient.post(authUrlSuffix + '/token', {
            "username": login,
            "password": password
        })
            .then((response) => {
                console.log(response)
                console.log(response.data.data.token);

                // si les identifiants de connexion sont corrects
                if (response.data.success) {
                    // on stock le token
                    localStorage.setItem('token', response.data.data.token);
                    localStorage.setItem('username', response.data.data.displayName);
                    // on met à jour le store
                    store.commit('isUserConnectedMutation', true);
                    store.commit('updateUsername', response.data.data.displayName);
                    // on redirige l'utilisateur sur la home
                    router.push({
                        name: 'home'
                    })
                } else {
                    alert('Mauvais identifiants !')
                }
            })
            .catch((error) => {
                console.log(error)
            })
        this.isConnected();
    },

    isConnected() {
        // si on a un token en localStorage
        if (localStorage.getItem('token')) {
            console.log('utilisateur potentiellement connecté');
            // on vérifie ce token avec l'API
            // on return la promesse
            apiClient.post(authUrlSuffix + '/token/validate', {}, {
                    // permet d'ajouter le header Authentication à la requête
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                })
                .then(response => {
                    store.commit('isUserConnectedMutation', response.data.success)
                })
        } else {
            store.commit('isUserConnectedMutation', false);
        }
    },

    createUser(user) {
        apiClient.post(baseUrlSuffix + '/users/register', user)
        .then(() => {
            this.loginUser(user.username, user.password)
        })
    },

    disconnectUser() {
        localStorage.removeItem('token')
        localStorage.removeItem('username')
        store.commit('updateUsername', '')
        store.commit('isUserConnectedMutation', false)
    }
}