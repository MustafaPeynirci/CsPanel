<template>
  <div class="divNewItem animate__animated animate__bounceInDown">
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label"> Şifre Değiştir:</label>
      <input type="password" class="form-control" id="exampleFormControlInput1"  >
    </div>
    <div class="newItemBtnGroup">
      <router-link
          to="/"
          class="btn closeBtn"
      >
        İptal
      </router-link>
      <button class="btn kytBtn">Kaydet</button>
    </div>
  </div>
</template>

<script>
export default {
  name: "User.vue"
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
</style>