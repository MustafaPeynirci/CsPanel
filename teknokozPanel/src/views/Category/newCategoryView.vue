<template>
  <form @submit.prevent="createNewCategory">
  <div class="divNewItem animate__animated animate__fadeIn">
      <div class="descCstm">
          <h2><i class="fa-solid fa-lines-leaning"></i> Kategori > Ekle</h2>
      </div>
      <div class="rowCstm">
      <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Kategori Adı</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" v-model="newCategory.name">
    </div>
    <div class="mb-3">
      <label for="formFile" class="form-label">Resim</label>
      <input class="form-control" type="file" id="formFile" ref="file" @change="uploadFile">
    </div>
    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">İçerik</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" v-model="newCategory.content"></textarea>
    </div>
    <div class="newItemBtnGroup">
      <router-link
          to="/category"
          class="btn closeBtn"
      >
        İptal
      </router-link>
      <button class="btn kytBtn" type="submit">Kaydet</button>
    </div>
  </div>
  </div>
  </form>
</template>

<script>
import axios from "axios";
import router from "@/router";

export default {
  name: "newCategoryView",
  data(){
    return{
      newCategory:{
        name: '',
        image1: null,
        content: '',
      }
    }
  },
   methods:{
    createNewCategory(){
      let formdata = new FormData();
      if (this.newCategory.image1 !== null){
        formdata.append('image1',this.newCategory.image1)
      }
      formdata.append('name', this.newCategory.name)
      formdata.append('content', this.newCategory.content)
      axios.post('http://127.0.0.1:8000/api/category',formdata
          ,{
            headers: {
              Authorization: "Bearer " + localStorage.getItem('token'),
              'Content-Type': "multipart/form-data; charset=utf-8",
            },
          }).then(response => {
            let timerInterval;
            this.$swal.fire({
              toast:true,
              text: response.data,
              timer: 1100,
              icon:'success',
              position:'top-end',
              timerProgressBar: true,
              showConfirmButton:false,
              willClose: () => {
                clearInterval(timerInterval)
              }})
        setTimeout(function(){
          router.push("/category");
        },1600)
      }).catch(error => {
        let timerInterval;
        this.$swal.fire({
          text: error.response.data.message,
          timer: 1000,
          toast:true,
          icon:'error',
          position:'top-end',
          timerProgressBar: true,
          showConfirmButton:false,
          willClose: () => {
            clearInterval(timerInterval)
          }})
      })
    },
    uploadFile(e) {
      if(this.$refs.file.files[0] !== null){
        this.newCategory.image1  = this.$refs.file.files[0]
      }else {
        this.newCategory.image1  = null
      }
    },
    },
}
</script>

<style scoped>
.newItemBtnGroup{
  text-align: end;
}
.divNewItem {
    padding: 50px 30px;
}
.btn{
  border: none;
  transition: transform .2s;
}
.kytBtn{
  font-size: 13px;
  color: white;
  background-color: rgba(29, 156, 226, 0.83) !important;
  padding: 8px 10px;
}
.closeBtn{
  font-size: 13px;
  margin: 8px;
}
.kytBtn:hover{
  background-color: #0d7cb9 !important;
}
.closeBtn:hover{
  color: #dc3545;
}
</style>