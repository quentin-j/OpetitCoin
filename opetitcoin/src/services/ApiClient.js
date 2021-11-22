import axios from "axios"

export const apiClient = axios.create({

    baseURL: 'http://localhost/apotheose/project-site-de-notation/backend/wordpress/'

  
});

export const baseUrlSuffix = "wp-json/wp/v2"

export const authUrlSuffix = "wp-json/jwt-auth/v1"