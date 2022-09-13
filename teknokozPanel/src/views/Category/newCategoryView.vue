<template>
  <div class="container">
<!--  BAŞLIK  -->
    <h2><i class="fa-solid fa-lines-leaning"></i> Kategori > Ekle</h2>
<!--  FORM-->
    <form @submit.prevent="createNewCategory">
    <div class="animate__animated animate__fadeIn">
    <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Kategori Adı</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" v-model="newCategory.name">
    </div>
    <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">İçerik</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" v-model="newCategory.content"></textarea>
    </div>
    <div class="mb-3">
    <label for="formFile" class="form-label">Resim</label>
    <div class="img-input">
    <img :src="this.image == null ? require('@/assets/defauldimage.png') : this.image" class="img" alt="Resim Ekle">
    <input class="form-control change-img-input" type="file" id="formFile" ref="file" @change="uploadImage" >
    </div>
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
  </form>
  </div>
</template>
<script>
import router from "@/router";
import axios from "axios";
export default {
  name: "newCategoryView",
  data(){
    return{
      newCategory:{
        name: '',
        image1: null,
        content: '',
      },
      image: null,
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
    // uploadFile(e) {
    //   if(this.$refs.file.files[0] !== null){
    //     this.newCategory.image1  = this.$refs.file.files[0]
    //   }else {
    //     this.newCategory.image1  = null
    //   }
    // },
     uploadImage(e){
       const image = e.target.files[0];
       const reader = new FileReader();
       reader.readAsDataURL(image);
       reader.onload = e =>{
         this.previewImage = e.target.result;
         this.image = this.previewImage;
         this.newCategory.image1  = this.$refs.file.files[0]
       };
     },
    },
}
</script>
<style scoped>
.newItemBtnGroup{
  text-align: end;
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
.img{
  width: 200px;
  max-width: 200px;
  height: 150px;
  border-radius: 5px;
  object-fit: cover;
  background-repeat: no-repeat;
  box-shadow: 0 6px 12px rgb(0 0 0 / 18%);
}
.img-input{
  display: flex;
  justify-content: start;
}
.change-img-input{
  margin: 25px;
  width: 75%;
  align-self: center;
}
@media only screen and (max-width: 768px) {
  .img-input{
    display: flex;
    flex-direction: column;
    align-items: center;
  }
}
</style>