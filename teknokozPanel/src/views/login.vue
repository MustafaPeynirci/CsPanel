<template>
    <section class="gradient-form" >
        <div class="container py-5 ort">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-xl-10">
                    <div class="card cardCstm">
                        <div class="row g-0">
                            <div class="col-lg-6 d-flex responNone">
                                <img src="../assets/login.png" class="loginImg" alt="login">
                            </div>
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">

                                    <div class="text-center">
                                        <img src="../assets/compack.png"
                                             style="width: 185px;" alt="logo">
                                    </div>

                                    <form  @submit.prevent="auth">

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example11">Kullanıcı Adı</label>
                                            <input v-model="user.email" type="email" id="email" class="form-control" placeholder="Kullanıcı Adı"/>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example22">Şifre</label>
                                            <input v-model="user.password" type="password" id="password" class="form-control" placeholder="Şifre"/>
                                        </div>

                                        <div class="text-center pt-1 mb-5 pb-1 loginCstm">
                                            <button class="btn btn-primary btn-block fa-lg mb-3 loginBtnCstm" type="submit">Giriş</button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>


export default {
  name: "login",
  data(){
    return{
      user: {
        email: null,
        password: null,
      },
    }
  },
  methods: {
    auth(){
      let timerInterval;
      this.$swal.fire({
        timer: 900,
        width: '70%',
        text:'Yönlendiriliyorsunuz!',
        color:'white',
        timerProgressBar: true,
        showConfirmButton:false,
        background:'none',
        position:'top',
        willClose: () => {
          clearInterval(timerInterval)
        }
      }).then(e=>{
          this.$store.dispatch('login',{...this.user}).then(response => {
          this.$router.push("/");
      }).catch(err =>{
            let timerInterval;
            this.$swal.fire({
              text: 'Kullanıcı Adı veya Şifresi Yanlış!',
              timer: 1000,
              toast:true,
              icon:'error',
              position:'top-end',
              timerProgressBar: true,
              showConfirmButton:false,
              willClose: () => {
                clearInterval(timerInterval)
              }})
      });
      })
    }
  }
}
</script>

<style scoped>
section{
    position: relative;
}
.ort{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
}
.f-size12 {
    font-size: 12px;
}
.container{
  margin-top: auto;
}
.loginCstm {
    font-size: 13px;
    display: flex;
    justify-content: end;
}
.loginBtnCstm {
    padding: 15px;
    font-size: 13px;
    background-color: rgb(73,94,257);
}
.loginImg {
    width: 100%;
    object-fit: cover;
    border-radius: 20px 0px 0px 20px;
}
.cardCstm {
    border-radius: 20px;
    box-shadow: 0 1px 20px rgb(0 0 0 / 18%);
}
@media (min-width: 768px) {
    .gradient-form {
        height: 100vh !important;
    }
}
@media (min-width: 769px) {
    .gradient-custom-2 {
        border-top-right-radius: .3rem;
        border-bottom-right-radius: .3rem;
    }

}
@media only screen and (max-width: 992px) {
    .responNone {
        display: none !important;
    }
    .ort{
        position: unset;
        top: unset;
        left: unset;
        transform: unset;
    }

}
</style>