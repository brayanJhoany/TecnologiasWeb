<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edita la publicacion {{ publicacion}}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <publicacion-form :errors="errors" :form="form" @submit="submit">
                    <template #buttons>
                        <button
                            class="text-red-600 hover:underline"
                            type="button"
                            @click="showModal = true"
                        >
                            Eliminar Publicacion
                        </button>
                        <loading-button
                            :loading="processing"
                            class="ml-5 btn-indigo"
                            type="submit"
                        >
                            Editar Publicacion
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
    components: {LoadingButton, PublicacionForm, AppLayout},
    props: {
        publicacion: Object,
        errors: Object,
    },
    data() {
        return {
            processing: false,
            showModal: false,
            form: {
                titulo:this.publicacion.titulo,
                nombre_autor:this.publicacion.nombre_autor,
                contenido:this.publicacion.contenido,
                categoria:this.publicacion.categoria,
                urlImagenPublicacion:this.publicacion.urlImagenPublicacion,
                urlImagenAutor:this.publicacion.urlImagenAutor,
            }
        }
    },
    methods: {
        submit() {
            this.processing = true
            this.$inertia.put(this.route('projects.update', this.project.id), this.form)
                .then(() => this.processing = false)
        },
        destroy() {
            this.processing = true
            this.$inertia.delete(this.route('projects.destroy', this.project.id))
                .then(() => this.processing = false)
        }
    }
}
</script>
