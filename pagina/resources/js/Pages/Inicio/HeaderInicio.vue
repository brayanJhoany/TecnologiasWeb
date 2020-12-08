<template>
  <header>
    <b-navbar toggleable="lg" type="dark" variant="info">
      <b-navbar-brand > {{ titulo }} </b-navbar-brand>

      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

      <b-collapse id="nav-collapse" is-nav>
        <b-navbar-nav>
          <!-- <b-nav-item href="#">Servicios></b-nav-item> -->
          <b-nav-item  href="contacto">Contacto</b-nav-item>
          <b-nav-item class="d-block d-sm-block d-md-none" @click="iniciarSesion"
            >Iniciar sesion</b-nav-item
          >
        </b-navbar-nav>

        <!-- Right aligned nav items -->
        <b-navbar-nav class="ml-auto">
          <b-button
            class="d-none d-sm-none d-md-block"
            variant="success"
            @click="iniciarSesion"
            >Iniciar sesion</b-button
          >
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>
  </header>
</template>
  
<script>
export default {
  name: "HeaderInicio",
  data() {
    return {
      titulo: "Blog personal",
    };
  },
  methods: {
     iniciarSesion() {
      this.$inertia.visit(this.route("login"));
    },
    IrContacto(){
      this.$inertia.visit(this.route("contacto"))
    }
  },
};
</script>
<style>
.color {
  /* position: fixed; */
  /* left: 0;
  bottom: 0; */
  width: 100%;
  background-color: rgb(71, 158, 78);
  color: white;
  text-align: center;
}

.button-login {
  background-color: #b450ef;
  box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.2),
    0 17px 50px 0 rgba(0, 0, 0, 0.19);
}

.style-title {
  font-family: serif;
  font-size: 30px;
}
</style>