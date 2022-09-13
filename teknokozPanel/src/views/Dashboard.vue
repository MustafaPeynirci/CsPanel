<template>
  <div class="container cstmpage animate__animated animate__fadeIn">
    <h2><i class="fa-solid fa-house"></i> Dashboard</h2>
    <div class="row ">
    <div class="col-xl-3 col-sm-6 col-12 mb-4">
    <div class="card">
    <div class="card-body">
    <div class="d-flex justify-content-between px-md-1">
    <div class="align-self-center">
    <i class="fa-solid fa-bars-staggered fa-2x text-info"></i>
    </div>
    <div class="text-end">
    <h3>278</h3>
    <p class="mb-0">Kategori</p>
    </div>
    </div>
    </div>
    </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12 mb-4">
    <div class="card">
    <div class="card-body">
    <div class="d-flex justify-content-between px-md-1">
    <div class="align-self-center">
    <i class="fa-solid fa-dolly fa-2x text-info"></i>
    </div>
    <div class="text-end">
    <h3>278</h3>
    <p class="mb-0">Ürün</p>
    </div>
    </div>
    </div>
    </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12 mb-4">
    <div class="card">
    <div class="card-body">
    <div class="d-flex justify-content-between px-md-1">
    <div class="align-self-center">
    <i class="fa-solid fa-blog fa-2x text-info"></i>
    </div>
    <div class="text-end">
    <h3>278</h3>
    <p class="mb-0">Blog</p>
    </div>
    </div>
    </div>
    </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12 mb-4">
    <div class="card">
    <div class="card-body">
    <div class="d-flex justify-content-between px-md-1">
    <div class="align-self-center">
    <i class="fa-solid fa-code-branch fa-2x text-info"></i>
    </div>
    <div class="text-end">
    <h3>278</h3>
    <p class="mb-0">Şubeler</p>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <h3>Hızlı İşlemler</h3>
    <div class="row">
    <div class="col-xl-3 col-sm-6 col-12 mb-4">
    <div class="card">
    <div class="card-body">
    <div class="d-flex justify-content-between px-md-1">
    <div class="align-self-center">
    <i class="fa-solid fa-list fa-2x text-info"></i>
    </div>
    <div class="text-end">
    <router-link to="/newcategory">
    <i class="fa-solid fa-arrow-right fa-2x text-info"></i>
    </router-link>
    <p class="mb-0">Kategori Ekle</p>
    </div>
    </div>
    </div>
    </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12 mb-4">
    <div class="card">
    <div class="card-body">
    <div class="d-flex justify-content-between px-md-1">
    <div class="align-self-center">
    <i class="fa-solid fa-dolly fa-2x text-info"></i>
    </div>
    <div class="text-end">
    <router-link to="/newcategory">
    <i class="fa-solid fa-arrow-right fa-2x text-info"></i>
    </router-link>
    <p class="mb-0">Ürün Ekle</p>
    </div>
    </div>
    </div>
    </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12 mb-4">
    <div class="card">
    <div class="card-body">
    <div class="d-flex justify-content-between px-md-1">
    <div class="align-self-center">
    <i class="fa-solid fa-blog fa-2x text-info"></i>
    </div>
    <div class="text-end">
    <router-link to="/newcategory">
    <i class="fa-solid fa-arrow-right fa-2x text-info"></i>
    </router-link>
    <p class="mb-0">Blog Ekle</p>
    </div>
    </div>
    </div>
    </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12 mb-4">
    <div class="card">
    <div class="card-body">
    <div class="d-flex justify-content-between px-md-1">
    <div class="align-self-center">
    <i class="fa-solid fa-code-branch fa-2x text-info"></i>
    </div>
    <div class="text-end">
    <router-link to="/newcategory">
    <i class="fa-solid fa-arrow-right fa-2x text-info"></i>
    </router-link>
    <p class="mb-0">Şube Ekle</p>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
  </div>
</template>
<script>
import router from "@/router";
import axios from "axios";
export default {
    name: "homeView",
    components:{
    },
    data(){
      return{
      }
    },
    methods:{
    }
}
</script>
<style scoped>
</style>