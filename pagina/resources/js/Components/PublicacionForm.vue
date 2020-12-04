<template>
    <form
        @submit.prevent="$emit('submit')"
        class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
    >
        <div class="mb-4">
            <text-input
                label="Titulo de la publicacion"
                v-model="form.titulo"
                :error="errors.titulo"
            />
        </div>
        <div class="mb-6">
            <text-area-input
                label="Contenido"
                v-model="form.contenido"
                :rows="6"
                :error="errors.contenido"
            />
        </div>




        <div class="mb-4">
            <text-input
                label="Nombre del autor "
                v-model="form.nombre_autor"
                :error="errors.nombre_autor"
            />
        </div>
        <div class="mb-4">
            <text-input
                label="Ingrese una categoria "
                v-model="form.categoria"
                :error="errors.categoria"
            />
        </div>

        <!--
        <div class="mb-6">
            <ImagenInput
                label="Seleccione una imagen para la publicacion"
                v-model="form.urlImagenPublicacion"
                :error="errors.urlImagenPublicacion"
            />
        </div>

        <div class="mb-6">
            <ImagenInput
                label="Seleccione una imagen para la publicacion"
                v-model="form.urlImagenAutor"
                :error="errors.urlImagenAutor"
            />
        </div>

        -->

        <div class="px-8 py-4 border-t border-gray-200 flex justify-center items-center">
            <slot name="buttons" />
        </div>
    </form>
</template>

<script>
import TextInput from "./TextInput";
import TextAreaInput from "./TexAreaInput";
import ImagenInput from "./ImagenInput";

export default {
    name: "PublicacionForm",
    components: {
        TextInput,
        TextAreaInput,
        ImagenInput,
    },
    props: {
        errors: Object,
        form: Object,
    },
    data(){
        return{
            categorias:[{ text: 'Seleccione una categoria', value: null }, 'Aventura', 'teatro', 'politica', 'deporte']

        }
    }
}
</script>
