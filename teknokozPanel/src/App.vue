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
}
.container {
    padding: 50px 30px;
}
.descCstm {
    padding: 0px 40px 40px 0px;
}
@media only screen and (min-width: 768px) and (max-width: 992px){
    .side-bar{
        width: 300px !important;
    }
}
@media only screen and (max-width: 768px) {
    .containerCstm {
        padding: 50px 30px 50px 0px !important;
    }
    .side-bar{
        width: unset !important;
    }
    .divNewItem, .divTable, .containerCstm {
        padding: 80px 30px 30px 0px !important;
    }
}
</style>
