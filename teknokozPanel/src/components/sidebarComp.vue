<template>
 <div>

     <a class="navbar-brand " data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
         <i class="fa-solid fa-bars"></i>
     </a>


    <div class="sidebar d-flex flex-column bg-light">
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
                <span class="nav-link navlinkCstm" aria-current="page"> Özet Gösterge Paneli</span>
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


    <div class="canvasCstm offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
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
                <span class="nav-link navlinkCstm" aria-current="page"> Özet Gösterge Paneli</span>
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
@media only screen and (max-width: 556px) {
    .imgLogo {
        width: 60%;
    }
    .nav-item {
        font-size: 14px;
    }
    .canvasCstm {
        width: 60%;
    }
    .offcanvas.offcanvas-start{
        width: 60% !important;
    }
    .navbar-expand-lg {
        border-radius: 10px !important;
    }
}
@media (max-width: 768px) {
    .sidebar{
        display: none !important;
    }
    .canvasCstm {
        background-image: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%) !important;
        box-shadow: 0 6px 12px rgb(0 0 0 / 18%);
    }
    .btn-close:focus {
        box-shadow: none;
    }
    .navbar-brand {
        font-size: 25px;
    }
}
@media only screen and (min-width: 768px) {
    .navbar-brand {
        display: none !important;
    }
}
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
    justify-content: end !important;
}
.imgDiv {
    display: flex;
    justify-content: center;
}

</style>