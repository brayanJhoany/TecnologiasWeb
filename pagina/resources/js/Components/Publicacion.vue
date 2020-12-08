<template>
    <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
        <td class="border-t">
            {{ publicacion.titulo }}
                <svg
                    v-if="publicacion.deleted_at"
                    class="flex-shrink-0 w-3 h-3 fill-gray-400 ml-2" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                >
                    <path d="M6 2l2-2h4l2 2h4v2H2V2h4zM3 6h14l-1 14H4L3 6zm5 2v10h1V8H8zm3 0v10h1V8h-1z" />
                </svg>
        <td class="border-t text-c">
            {{ publicacion.categoria }}
        </td>
        <td class="border-t">
            {{ publicacion.nombre_autor }}
        </td>


        <td class="border">
            <b-button class="mr-4"  size="md" variant="primary" @click="verPublicacion(publicacion)">Ver</b-button>
            <b-button class="mr-4" variant="warning" @click="editarPublicacion(publicacion)" >Editar</b-button>
            <b-button  variant="danger" @click="deletePublicacion(publicacion)" >Eliminar</b-button>
        </td>


  <!-- modal para editar una publicación bootstrap-->
        <div>
            <b-modal v-model="openModal" hide-footer>
                <template #modal-title>
                  Editar publicacion
                </template>

                <b-form>
                    <b-form-group
                        id="titulo-publicacion"
                        label="Ingrese el titulo de la publicacion"
                        label-for="titulo"
                    >
                        <b-form-input
                            id="titulo"
                            v-model="form.titulo"
                            required

                            placeholder="Enter email"
                        ></b-form-input>
                    </b-form-group>
                    <b-form-textarea
                        id="contenido"
                        v-model="form.contenido"
                        placeholder="Escriba el contenido de la publicación"
                        rows="3"
                        max-rows="6"
                    ></b-form-textarea>

                    <b-form-group
                        id="categoria-publicacion"
                        label="Ingrese la categoria de la publicacion"
                        label-for="categoria"
                    >
                        <b-form-input
                            id="categoria"
                            v-model="form.categoria"
                            required
                            placeholder="ingrese la categoria"
                        ></b-form-input>
                    </b-form-group>

                    <b-form-group
                        id="nombre_autor-publicacion"
                        label="Ingrese el autor de la publicacion"
                        label-for="nombre_autor"
                    >
                        <b-form-input
                            id="nombre_autor"
                            v-model="form.nombre_autor"
                            required
                            placeholder="ingrese el autor"
                        ></b-form-input>
                    </b-form-group>

                    <b-form-group
                        id="numeroDeLecturas-publicacion"
                        label="Ingrese el numero de lecturas  de la publicacion"
                        label-for="numeroDeLecturas"
                    >
                        <b-form-input
                            id="numeroDeLecturas"
                            v-model="form.numeroDeLecturas"
                            required
                            type="number"
                            placeholder="ingrese numero de lecturas"
                        ></b-form-input>
                    </b-form-group>
                    <b-form-group
                        id="numDeVotaciones-publicacion"
                        label="Ingrese el numero de votaciones  de la publicacion"
                        label-for="numDeVotaciones"
                    >
                        <b-form-input
                            id="numDeVotaciones"
                            v-model="form.numDeVotaciones"
                            required
                            type="number"
                            placeholder="ingrese numero de votaciones"
                        ></b-form-input>
                    </b-form-group>
                    <div class="text-center" >
                        <b-button @click="update(form)"> actualizar publicacion</b-button>
                    </div>
                </b-form>
            </b-modal>
        </div>

    <!-- modal para ver la informacion-->
        <div>
            <b-modal v-model="openModalView" hide-footer>
                <template #modal-title>
                   Publicacion.
                </template>

                <b-form>
                    <b-form-group
                        id="titulo-publicacionV"
                        label="Titulo de la publicacion"
                        label-for="titulo"
                    >
                        <b-form-input
                            id="titulo"
                            v-model="form.titulo"
                            disabled

                            placeholder="Enter email"
                        ></b-form-input>
                    </b-form-group>
                    <b-form-textarea
                        id="contenido"
                        v-model="form.contenido"
                        disabled
                        placeholder="Contenido de la publicación"
                        rows="3"
                        max-rows="6"
                    ></b-form-textarea>

                    <b-form-group
                        id="categoria-publicacionV"
                        label="Categoria de la publicacion"
                        label-for="categoria"
                    >
                        <b-form-input
                            id="categoria"
                            v-model="form.categoria"
                            disabled
                            placeholder="ingrese la categoria"
                        ></b-form-input>
                    </b-form-group>

                    <b-form-group
                        id="nombre_autor-publicacionV"
                        label="Autor de la publicacion"
                        label-for="nombre_autor"
                    >
                        <b-form-input
                            id="nombre_autor"
                            v-model="form.nombre_autor"
                            disabled
                            placeholder="ingrese el autor"
                        ></b-form-input>
                    </b-form-group>

                    <b-form-group
                        id="numeroDeLecturas-publicacionV"
                        label="Numero de lecturas  de la publicacion"
                        label-for="numeroDeLecturas"
                    >
                        <b-form-input
                            id="numeroDeLecturas"
                            v-model="form.numeroDeLecturas"
                            disabled
                            type="number"
                            placeholder="ingrese numero de lecturas"
                        ></b-form-input>
                    </b-form-group>
                    <b-form-group
                        id="numDeVotaciones-publicacionV"
                        label="Numero de votaciones  de la publicacion"
                        label-for="numDeVotaciones"
                    >
                        <b-form-input
                            id="numDeVotaciones"
                            v-model="form.numDeVotaciones"
                            disabled
                            type="number"
                            placeholder="ingrese numero de votaciones"
                        ></b-form-input>
                    </b-form-group>

                </b-form>

            </b-modal>
        </div>


    </tr>



</template>

<script>
import PublicacionForm from "@/Components/PublicacionForm";
import LoadingButton from "@/Components/LoadingButton";
export default {
    name: "Publicacion",
    components: {LoadingButton, PublicacionForm},
    data(){
        return{
            openModal:false,
            openModalView:false,
            form: {
                titulo: null,
                contenido:null,
                categoria:null,
                nombre_autor:null,
                numeroDeLecturas:null,
                numDeVotaciones:null,
            }
        }
    },
    props: {
        publicacion: Object,
        errors:Object
    },
    methods:{
        editarPublicacion(data){
            console.log(data)
            this.form= Object.assign({}, data);
            this.openModal=true
        },
        update(data){
            console.log(data);
            data._method = 'PUT';
            this.$inertia.post('/publicaciones/' + data.id, data)
            this.reset();
            this.openModal=false;
        },
        verPublicacion(data){
            console.log(data);
            this.form= Object.assign({}, data);
            this.openModalView=true;
        },
        reset () {
            this.form = {
                titulo: null,
                contenido:null,
                categoria:null,
                nombre_autor:null,
                numeroDeLecturas:null,
                numDeVotaciones:null,
            }
        },
        deletePublicacion(data){
            if (!confirm('¿Estas seguro que quieres eliminar La publicacion')) return;
            data._method = 'DELETE';
            this.$inertia.post('/publicaciones/' + data.id, data)
            this.reset();
        }

    }

}
</script>
