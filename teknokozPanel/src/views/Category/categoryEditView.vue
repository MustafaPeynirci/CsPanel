<template>
  <div class="divNewItem animate__animated animate__fadeIn">
      <div class="descCstm">
          <h2><i class="fa-solid fa-lines-leaning"></i> Kategori > Düzenle</h2>
      </div>
      <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label"> Kategori Adı</label>
      <input type="email" class="form-control" id="exampleFormControlInput1" v-model="this.editCategory.name" >
    </div>
    <div class="mb-3">
      <label for="formFile" class="form-label">Resim</label>
      <input class="form-control" type="file" id="formFile" ref="file" @change="uploadFile" >
    </div>
    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">İçerik</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" v-model="this.editCategory.content" ></textarea>
    </div>
    <div class="newItemBtnGroup">
      <router-link
          to="/category"
          class="btn closeBtn"
      >
        İptal
      </router-link>
      <button class="btn kytBtn" @click="updateCategory">Düzenle</button>
    </div>
  </div>

</template>

<script>
import axios from "axios";
import router from "@/router";

export default {
  name: "categoryEditView",
  data(){
    return{
      editCategory:{
        name: '',
        image: '',
        content: '',
        image1: '',
      },
    }
  },
  methods:{
    updateCategory(){
      if (this.editCategory.image1 !== ''){
      }else {
        this.editCategory.image1 = this.editCategory.image.split('http://127.0.0.1:8000/images/categories/');
      }
      axios.postForm('http://127.0.0.1:8000/api/category/'+this.$route.params.id,
          {
            name: this.editCategory.name,
            content: this.editCategory.content,
            image1: this.editCategory.image1,
            _method: "PUT"
          }
          ,
          {
            headers: {
              Authorization: "Bearer " + localStorage.getItem('token'),
              'Content-Type': "multipart/form-data; charset=utf-8",
            }
          }).then(response =>{
        let timerInterval;
        this.$swal.fire({
          text: response.data,
          timer: 1000,
          toast:true,
          position:'top-end',
          icon:'success',
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
          position:'top-end',
          icon:'error',
          timerProgressBar: true,
          showConfirmButton:false,
          willClose: () => {
            clearInterval(timerInterval)
          }})
      })
    },
    uploadFile(e) {
      if(this.$refs.file.files[0] !== null){
        this.editCategory.image1  = this.$refs.file.files[0]
      }
    },
  },
  computed:{
    getEditCategory(){
      axios.get('http://127.0.0.1:8000/api/category/' + this.$route.params.id,
          {
            headers: {
              Authorization: "Bearer " + localStorage.getItem('token'),
            }
          }).then(response => {
          this.editCategory.name = response.data.name;
          this.editCategory.content = response.data.content;
          this.editCategory.image = response.data.image;
      })
    }
  },
  mounted() {
    this.getEditCategory;
  }
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