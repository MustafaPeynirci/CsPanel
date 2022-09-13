<template>
    <div class="views">
        <div class="side-bar" v-if="isAuth">
            <sidebarComp/>
        </div>
        <div class="router-view animate__animated animate__fadeIn">
            <router-view/>
        </div>
    </div>
</template>
<script>
import router from "@/router";
import axios from "axios";
import sidebarComp from "@/components/sidebarComp";
export default {
    components: {
        sidebarComp
    },
    data(){
      return{
      }
    },
  created() {
    this.$store.dispatch("initAuth")
  },
  computed:{
      isAuth(){
        return this.$store.getters.isAuth
      },
  },
}
</script>
<style>
body{
  background: #DDE7F2 ;
  font-family: "Open Sans" !important;
  animation-duration: 2s;
}
.views{
  display: flex;
  flex-direction: row;
}
.side-bar{
  width: 300px;
}
.router-view{
  width: 100%;
  padding: 25px;
}
@media only screen and (max-width: 768px) {
 .views{
   display: flex;
   flex-direction: column;
 }
}
</style>
