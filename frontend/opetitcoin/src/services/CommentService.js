import {
    apiClient,
    baseUrlSuffix
} from "./ApiClient"

import router from '../routes'

export default {

    getCommentList: function (id) {
        return apiClient.get(baseUrlSuffix + '/comments?post=' + id)
    },

    createComment: function (id, comment) {
        apiClient.post(
            baseUrlSuffix + '/comments?post=' + id,
            comment, {
                headers: {
                    Authorization: 'Bearer ' + localStorage.getItem('token')
                }
            })
            .then(() => {
                router.push({
                    name: 'home'
                })
            })
    }
}