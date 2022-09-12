import { createStore } from 'vuex'
import axios from "axios";
import router from "@/router";
import authelp from "/src/store/authelp";
export default createStore({
  state: {
    token: '',
    role: '',
  },
  getters: {
    isAuth(state){
      return state.token !== '';
    },
    isRole(state){
      return state.role;
    },
  },
  mutations: {
    setToken(state,token){
      state.token = token;
    },
    setRole(state,role){
      state.role = role
    },
    clearToken(state){
      state.token = ''
      state.role = ''
    },
  },
  actions: {
    initAuth({commit,dispatch}){
      let token = localStorage.getItem('token')
      let role = localStorage.getItem('role')
      if(token){
        commit("setToken",token)
        commit("setRole",role)
      }else {
        router.push("/login")
        return false
      }
    },
    login({commit,dispatch,state},authData){
      return axios.post(
          'http://127.0.0.1:8000/oauth/token',
          {
            username: authData.email,
            password: authData.password,
            grant_type: authelp.grant_type,
            scope: '',
            client_id: authelp.client_id,
            client_secret: authelp.client_secret,
          }).then(response => {
            commit("setToken",response.data.access_token);
            localStorage.setItem('token',response.data.access_token)
            axios.get('http://127.0.0.1:8000/api/auth-user',
                {
                  headers: {
                    email: authData.email,
                    password: authData.password,
                    Authorization: "Bearer " + response.data.access_token
                  }
                }).then(response => {
              commit("setRole",response.data.role[0].name)
              localStorage.setItem('role',response.data.role[0].name)
            })
            dispatch("setTimeOut", +response.data.expires_in / 10)
      })

    },
    logOut({commit,dispatch,state}){
      commit("clearToken");
      localStorage.removeItem('token')
      localStorage.removeItem('role')
      router.replace("/login");
    },
    setTimeOut({dispatch}, expiresIn){
      setTimeout(()=>{
        dispatch("logOut")
      },expiresIn)
    },
  },
  modules: {
  }
})
