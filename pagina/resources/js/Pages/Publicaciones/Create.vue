<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Crea una nueva publicación
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
               <publicacion-form :errors="errors" :form="form" @submit="submit">
                   <template #buttons>
                       <loading-button
                           :loading="processing"
                           class="btn-indigo"
                           type="submit"
                       >
                           Crear publicación
                       </loading-button>
                   </template>
               </publicacion-form>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import PublicacionForm from "@/Components/PublicacionForm";
import LoadingButton from "@/Components/LoadingButton";
export default {
    name:"create",
    components: {LoadingButton, PublicacionForm, AppLayout},
    props: {
        errors: Object,
    },
    data(){
        return{
            processing: false,
            form:{
                titulo:null,
                nombre_autor:null,
                contenido:null,
                categoria:null,
            }
        }
    },
    methods:{
        submit() {
            this.processing = true;
            console.log("titulo: "+ this.form.titulo)
            console.log("Nombre del autor: "+ this.form.nombre_autor)
            console.log("contenido: "+ this.form.contenido)
            console.log("Categoria: "+ this.form.categoria)

            //this.$inertia.post(this.route('publicaciones.store'), this.form)
            //    .then(() => this.processing = false);
        }
    }
}
</script>
