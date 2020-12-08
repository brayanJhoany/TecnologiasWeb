<template>
    <div>
        <header-inicio></header-inicio>
        <content-inicio></content-inicio>
        <footer-inicio class="footer"></footer-inicio>
    </div>
</template>

<script>



import HeaderInicio from "@/Pages/Inicio/HeaderInicio";
import ContentInicio from "@/Pages/Inicio/ContentInicio";
import FooterInicio from "@/Pages/Inicio/FooterInicio";
export default {
    name:"PaginaPrincipal",
    components: {FooterInicio, ContentInicio, HeaderInicio},
}
</script>

<style>
.footer {
  position: absolute;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: red;
  color: white;
  text-align: center;
}
.color {
  /* position: fixed; */
  /* left: 0;
  bottom: 0; */
  width: 100%;
  background-color: rgb(71, 158, 78);
  color: white;
  text-align: center;
}
.flex-container {
  display: flex;
  flex-direction: column;
  height: 100%;
}
</style>
