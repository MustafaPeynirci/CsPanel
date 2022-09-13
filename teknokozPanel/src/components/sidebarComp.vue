<template>
  <div>
    <!--  canvass buton        -->
    <a class="navbar-brand sidebar-c" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
    <i class="fa-solid fa-bars"></i>
    </a>
    <!--  sidebar   -->
    <div class="sidebar sidebar-a d-flex flex-column bg-light">
    <img src="../assets/compack.png" alt="" class="imgLogo">
    <hr class="hrCstm">
    <ul class="navbar-nav w-100 p-3">
    <router-link
    to="/"
    tag="li"
    class="nav-item d-flex p-2"
    exact
    active-class="active"
    >
    <i class="fa-solid fa-house"></i>
    <span class="nav-link navlinkCstm" aria-current="page"> Dashboard</span>
    </router-link>
    <router-link
    to="/category"
    tag="li"
    class="nav-item d-flex p-2"
    exact
    active-class="active"
    >
    <i class="fa-solid fa-lines-leaning"></i>
    <span class="nav-link navlinkCstm" aria-current="page"> Kategori</span>
    </router-link>
    <router-link
    to="/"
    tag="li"
    class="nav-item d-flex p-2"
    exact
    >
    <i class="fa-solid fa-gear"></i>
    <span class="nav-link navlinkCstm" aria-current="page"> Ayarlar</span>
    </router-link>
    <router-link
    to=""
    tag="li"
    class="nav-item d-flex p-2"
    exact
    @click="logout"
    >
    <i class="fa-solid fa-arrow-right-from-bracket"></i>
    <span class="nav-link navlinkCstm" aria-current="page"> Çıkış Yap</span>
    </router-link>
    </ul>
    </div>
    <!--  canvass  -->
    <div class="sidebar offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="imgDiv">
    <img src="../assets/compack.png" alt="" class="imgLogo">
    </div>
    <hr class="hrCstm">
    <ul class="navbar-nav w-100 p-3">
    <router-link
    to="/"
    tag="li"
    class="nav-item d-flex p-2"
    exact
    active-class="active"
    >
    <i class="fa-solid fa-house"></i>
    <span class="nav-link navlinkCstm" aria-current="page"> Dashboard</span>
    </router-link>
    <router-link
    to="/category"
    tag="li"
    class="nav-item d-flex p-2"
    exact
    active-class="active"
    >
    <i class="fa-solid fa-bars-staggered"></i>
    <span class="nav-link navlinkCstm" aria-current="page"> Kategori</span>
    </router-link>
    <router-link
    to="/"
    tag="li"
    class="nav-item d-flex p-2"
    exact
    >
    <i class="fa-solid fa-gear"></i>
    <span class="nav-link navlinkCstm" aria-current="page"> Ayarlar</span>
    </router-link>
    <router-link
    to=""
    tag="li"
    class="nav-item d-flex p-2"
    exact
    @click="logout"
    >
    <i class="fa-solid fa-arrow-right-from-bracket"></i>
    <span class="nav-link navlinkCstm" aria-current="page"> Çıkış Yap</span>
    </router-link>
    </ul>
    </div>
  </div>
</template>
<script>
import router from "@/router";
import axios from "axios";
export default {
    name: "sidebarComp",
    methods:{
        logout(){
            let timerInterval;
            this.$swal.fire({
                text: 'Çıkış Yapılıyor...',
                timer: 800,
                toast:true,
                position:'top-end',
                icon:'error',
                timerProgressBar: true,
                showConfirmButton:false,
                willClose: () => {
                    clearInterval(timerInterval)
                }
            }).then(e=>{
                this.$store.dispatch("logOut");
            });
        },
    }
}
</script>
<style scoped>
.active{
  background-color: #0d6efd40;
  border-radius: 10px;
  color: aliceblue;
}
.sidebar{
  height: calc(100vh) !important;
  align-items: center;
  overflow: auto;
  background-image: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);
  box-shadow: 0 6px 12px rgb(0 0 0 / 18%);
}
a{
  width: 100%;
  color: #212529;
  text-decoration: none;
  padding: 5px 10px !important;
  align-items: center;
}
.sidebar>ul>li:hover{
  background-color: #eee;
  color: #212529;
  border-radius: 6px;
}
.imgLogo {
  width: 50%;
}
.hrCstm {
  width: 100%;
  margin: unset;
}
.navlinkCstm {
  padding: 8px 10px;
}
.navlinkCstm:hover {
  color: aliceblue;
}
.offcanvas-header {
  align-self: end !important;
}
.imgDiv {
  display: flex;
  justify-content: center;
}
.offcanvas{
  width: 50% !important;
}
.sidebar-c{
  display:  none!important;
}
@media only screen and (max-width: 768px) {
  .sidebar-a{
    display: none !important;
  }
  .sidebar-c{
    display: flex !important;
    flex-direction: row;
  }
}
</style>