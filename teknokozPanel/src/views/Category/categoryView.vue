<template>
  <div class="container">
  <!-- Başlık -->
    <h2><i class="fa-solid fa-lines-leaning"></i> Kategori</h2>
  <!--             ARAMA VE EKLEME           -->
    <div class="tableSp">
    <input class="thSearch"  v-model="search" type="text" placeholder=" Kategori Ara..">
    <router-link
    to="/newCategory"
    class="thPlus btn"
    >
    <i class="fa-solid fa-plus"></i>
    Ekle
    </router-link>
    </div>
  <!--             TABLO                   -->
    <div class="divTable animate__animated animate__fadeIn">
    <table id="table" class="table table-striped">
    <thead>
    <tr>
    <th scope="col">Id</th>
    <th scope="col">Kategori</th>
    <th scope="col">İçerik</th>
    <th scope="col">Resim</th>
    </tr>
    </thead>
    <tbody>
<!--             TABLO LİSTELEME                   -->
    <tr v-for="category in filteredCategory">
    <th scope="row">{{category.id}}</th>
    <td>{{category.name}}</td>
    <td class="tdcontent">{{category.content}}</td>
    <td class="tdimg"><img class="img" :src="category.image" alt=""></td>
    <td class="tdbutton">
    <router-link
    :to="{ name: 'categoryEditView', params: { id: category.id } }"
    class="btn-edit btn"
    >
    <i class="fa-regular fa-pen-to-square"></i>
    </router-link>
    <button class="btn btn-del" @click="deleteItem(category.id)">
    <i class="fa-regular fa-trash-can"></i>
    </button>
    </td>
    </tr>
    </tbody>
    </table>
<!--             SAYFALANDIRMA                    -->
    <nav aria-label="Page navigation example ">
    <ul class="pagination justify-content-end">
    <li v-for="row in rows" class="page-item">
    <button :class=" row.active == true ? 'page-link active' : 'page-link'" :disabled="row.url ? false : true"  @click="getpagiItem(row.url)" v-html="row.label"> </button>
    </li>
    </ul>
    </nav>
    </div>
  </div>
</template>
<script>
import router from "@/router";
import axios from "axios";
export default {
  name: "categoryView",
  data(){
    return{
      categories:[],
      search:'',
      rows:'',
    }
  },
  methods:{
    deleteItem(id){

      this.$swal.fire({
        icon:"error",
        text: 'Silinen Veri Geri Alınamaz, Devam Etmek İster Misiniz?',
        showConfirmButton:false,
        showCancelButton:true,
        cancelButtonText:'İptal',
        denyButtonText:'Sil',
        showDenyButton:true,
        reverseButtons:true,
        buttonsStyling:true,
        cancelButtonColor:'none'
      }).then((result) => {
        if (result.isDenied) {
          axios.delete('http://127.0.0.1:8000/api/category/'+id,
              {
                headers: {
                  Authorization: "Bearer " + localStorage.getItem('token'),
                },
              }).then(response => {
            let timerInterval;
            this.$swal.fire({
              text: response.data,
              timer: 1000,
              toast:true,
              icon:'success',
              position:'top-end',
              timerProgressBar: true,
              showConfirmButton:false,
              willClose: () => {
                clearInterval(timerInterval)
              }})
            setTimeout(function(){
              window.location.reload();
            },1600)
          }).catch(error => {
            let timerInterval;
            this.$swal.fire({
              text: error.response.data.message,
              timer: 1000,
              toast:true,
              position:'top-end',
              showConfirmButton:false,
              timerProgressBar: true,
              willClose: () => {
                clearInterval(timerInterval)
              }})
          })
        }
        else if (result.isDenied) {
        }
      });

    },
    getpagiItem(e){
      axios.get(e,
          {
            headers: {
              Authorization: "Bearer " + localStorage.getItem('token'),
            }
          }).then(response => {
        this.categories = response.data.data;
        this.rows = response.data.links;
      })
    },
  },
  computed:{
    filteredCategory(){
      return this.categories.filter((category)=>{
        return category.name.match(this.search)
      })
    },
    getcategory(){
        axios.get('http://127.0.0.1:8000/api/category',
        {
          headers: {
            Authorization: "Bearer " + localStorage.getItem('token'),
          }
        }).then(response => {
          this.categories = response.data.data;
          this.rows = response.data.links;
    })
  }
  },
  mounted(){
    this.getcategory;
  }
}
</script>
<style scoped>
.divTable{
  overflow: auto;
}
.page-link{
  font-size: 13px;
  color: white;
  background-color: rgba(29, 156, 226, 0.83) !important;
}
.page-link:hover {
  background-color: #0d7cb9 !important;
}
.active>.page-link, .page-link.active {
  border-radius: 5px;
}
table{
  border-collapse: unset!important;
}
table tr{
  width: 100px;
  height: 50px;
}
table th{
  font-weight: 500;
}
table td{
  max-width: 150px;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.tdimg{
  text-align: center;
  overflow: unset;
}
.img{
  width: 60px;
  height: 35px;
  object-fit: cover;
  border-radius: 5px;
}
.tdbutton{
  width: 100px;
  text-align: center;
  border: none;
}
.btn{
  border: none;
  font-size: 18px;
  transition: transform .2s;
}
.tableSp{
  display: flex;
  justify-content: end;
}
.thSearch{
  width: 200px;
  height: 35px;
  border: none;
  border-radius: 5px;
  padding: 3px;
  text-align: center;
  border-left: 4px solid coral ;
  font-size: 13px !important;
}
.thPlus{
  border: none;
  background-color: #1d9ce2d4 !important;
  margin-left: 15px;
  font-size: 13px;
  padding: 8px 10px;
  color: white;
}
.thPlus:hover{
  background-color: #0d7cb9 !important;
}
.thSearch:focus{
  border-left: 4px solid #a1c4fd;
}
.thSearch:focus-visible{
  outline: none;
}
.btn-edit:hover{
  color: #ff7f50cf;
  border: none;
}
.btn-del:hover{
  color: #ff0000cc;
  border: none;
}
</style>