import VueRouter from 'vue-router'
import Vue from 'vue'

Vue.use(VueRouter)

// on importe les composants nécessaires pour Vue Router
import ArticleList from './views/ArticleList'
import Login from './views/Login'
import ArticleCreate from './views/ArticleCreate'
import Article from './views/Article'
import Contact from './views/Contact'
import Register from './views/Register'
import Categorie from './views/Categorie'
import Utilisateur from './views/Utilisateur'
import CGU from './views/CGU'

const routes = [
  { 
    name: 'home',
    path: '/',
    component: ArticleList
  },
  
  { 
    name: 'login',
    path: '/login',
    component: Login
  },

  { 
    name: 'toilette-create',
    path: '/toilette/create',
    component: ArticleCreate
  },

  { 
    name: 'toilette',
    path: '/toilette/:id',
    component: Article
  },

  { 
    name: 'contact',
    path: '/contact',
    component: Contact
  },

  { 
    name: 'register',
    path: '/register',
    component: Register
  },

  {
    name: 'place',
    path: '/place/:id',
    component: Categorie

  },
  {
    name: 'utilisateur',
    path: '/toilette_utilisateurs/:id',
    component: Utilisateur
},
{
  name: 'cgu',
  path: '/cgu',
  component: CGU
},

]

export default new VueRouter({
    mode: "history",
    routes // raccourci pour `routes: routes`
})