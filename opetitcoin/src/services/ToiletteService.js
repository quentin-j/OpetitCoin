import {
    apiClient,
    baseUrlSuffix
} from "./ApiClient"

import router from '../routes'

export default {

    // affichage des lists

    /**
     * get toilette list
     */
    getToiletteList: function () {
        return apiClient.get(baseUrlSuffix + '/toilette?per_page=40')
    },
    
    /**
     * get list of place Taxonomies
     */
    getPlaceList: function () {
        return apiClient.get(baseUrlSuffix + '/place')
    }, 

    /**
     * get list of Taxonomies toilette_utilisateurs
     */
    getUtilisateurList: function () {
        return apiClient.get(baseUrlSuffix + '/toilette_utilisateurs')
    },

    // affichage ciblé

    /**
     * get a toilette article
     */
    getToilette: function (id) {
        return apiClient.get(baseUrlSuffix + '/toilette/' + id)
    }, 

     /**
     * get toilette list whith place = [id]
     */
    getPlace: function (id) {
        return apiClient.get(baseUrlSuffix + '/toilette?place=' + id)
    }, 

    /**
     * get toilette list whith toilette_utilisateurs = [id]
     */
    getUtilisateur: function (id) {
        return apiClient.get(baseUrlSuffix + '/toilette?toilette_utilisateurs=' + id)
    },

    /**
     * get the author of the toilette article
     */
    getAuthor: function (author) {
        return apiClient.get(baseUrlSuffix+'/users/'+parseInt(author))
    },

    // create a toilette article
    createToilette: function (toilette) {
        apiClient.post(
            baseUrlSuffix + '/toilette',
            toilette,
            {
                headers: {
                Authorization: 'Bearer ' + localStorage.getItem('token')
                }
            })
            .then(() => {
                router.push({
                name: 'home'
                }) 
            })
    },

    // upload a picture for toilette article
    uploadPicture: function (toilette) {
     
        let fd = new FormData()
        fd.append('file',toilette.featured)
        return apiClient.post(baseUrlSuffix + '/media',
        fd,
        {
            headers: {
            'Content-Disposition':'attachment; filename="'+toilette.featured.name +'"',
             Authorization: 'Bearer ' + localStorage.getItem('token'),
            'Content-Type':toilette.featured.type
            },
        })

    },    
}