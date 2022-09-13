import { createRouter, createWebHistory } from 'vue-router'
import login from "@/views/login";
import categoryView from "@/views/Category/categoryView";
import newCategoryView from "@/views/Category/newCategoryView";
import categoryEditView from "@/views/Category/categoryEditView";
import store from "@/store";
import errorView from "@/views/errorView";
import dashboard from "@/views/Dashboard";
const routes = [
  {
    path: '/login',
    name: 'login',
    component: login,
    beforeEnter(to, from, next){
      if(store.getters.isAuth){
        router.push('/')
      }else {
        next();
      }
    }
  },
  {
    path: '/',
    name: 'dashboard',
    component: dashboard,
    meta:{
      auth:true
    }
  },
  {
    path: '/category',
    name: 'categoryView',
    component: categoryView,
    meta:{
      auth:true
    },
  },
  {
    path: '/newCategory',
    name: 'newCategoryView',
    component: newCategoryView,
    meta:{
      auth:true
    }
  },
  {
    path: '/categoryEdit/:id',
    name: 'categoryEditView',
    component: categoryEditView,
    meta:{
      auth:true
    }
  },
  {
    path: '/err',
    name: 'errorView',
    component: errorView,
  },
  {
    path:'/:pathMatch(.*)*',
    component: errorView
  },

]
const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

router.beforeEach((to,from,next) => {
  if(to.meta.auth){
    if(store.getters.isRole == 'root'){
      next()
    }else if(store.getters.isAuth){
      next()
    }else {
      router.push("/login")
    }
  }else {
    next()
  }
})

export default router
