<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Lista de Publicaciones
            </h2>
        </template>

        <b-container fluid="md" class="mb-10">
            <b-row class="mt-2">
                <b-col md="12">
                    <b-form-select
                        v-model="form.trashed"
                        :options="options"
                    ></b-form-select>
                </b-col>
                <b-col class="mt-2" md="12">
                    <b-input
                        v-model="form.search"
                        type="text"
                        placeholder="Titulo"
                    >
                    </b-input>
                </b-col>
                <b-col class="mt-2" md="4">
                    <b-button @click="reset">reset</b-button>
                </b-col>
                <b-col class="mt-2" md="8">
                    <b-button :href="route('publicaciones.create')">
                        Crear publicación
                    </b-button>
                </b-col>
            </b-row>
            <b-row>
                <b-col  md="12">
                    <div class="bg-white rounded shadow overflow-x-auto">
                        <table class="w-full whitespace-no-wrap ml-6">
                            <tr class="text-left font-bold">
                                <th class=" text-center ml-6 pt-4 pb-4">
                                    titulo
                                </th>
                                <th class=" text-center ml-6 pt-4 pb-4">
                                    categoria
                                </th>
                                <th class=" text-center ml-6 pt-4 pb-4">
                                    nombre del autor
                                </th>
                                <th class=" text-center ml-6 pt-4 pb-4">
                                    acciones
                                </th>
                            </tr>
                            <publicacion
                                v-for="project in publicaciones.data"
                                :key="project.id"
                                :publicacion="project"
                            />
                        </table>
                    </div>
                </b-col>
                <b-col  md="12">
                    <pagination :links="publicaciones.links"/>
                </b-col>
            </b-row>
        </b-container>

        <!-- 
        <div class="py-6 ">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-5 mb-6 flex justify-between items-center">
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                Estados
                            </label>
                                <div class="relative ">
                                    <select
                                        
                                        v-model="form.trashed"
                                        class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    >
                                        <option value="with">Con borrados</option>
                                        <option value="only">Sólo borrados</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                    </div>
                                </div>

                        </div>
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                Busca por titulo de la publicación
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                v-model="form.search"
                                type="text"
                                placeholder="Titulo"
                            />
                        </div>
                        <button
                            class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-3 mt-5 px-4 rounded"
                            type="button"
                            @click="reset"
                        >
                            Restablecer filtros
                        </button>
                        <inertia-link
                            class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-3 mt-5 px-4 rounded"
                            :href="route('publicaciones.create')"
                        >
                            <span>Crear</span>
                            <span class="hidden md:inline">Publicacion</span>
                        </inertia-link>
                    </div>

                    <div class="bg-white rounded shadow overflow-x-auto">
                        <table class="w-full whitespace-no-wrap ml-6">
                            <tr class="text-left font-bold">
                                <th class=" text-center ml-6 pt-4 pb-4">titulo</th>
                                <th class=" text-center ml-6 pt-4 pb-4">categoria</th>
                                <th class=" text-center ml-6 pt-4 pb-4">nombre del autor</th>
                                <th class=" text-center ml-6 pt-4 pb-4">acciones</th>
                            </tr>
                                <publicacion
                                    v-for="project in publicaciones.data"
                                    :key="project.id"
                                    :publicacion="project"
                                />
                               
                        </table>
                    </div>

                </div>
                <pagination :links="publicaciones.links"/>
            </div>
        </div> -->
    </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";
import Pagination from "@/Components/Pagination";
import debounce from "lodash/debounce";
import pickBy from "lodash/pickBy";
import mapValues from "lodash/mapValues";
import Publicacion from "@/Components/Publicacion";
export default {
    data() {
        return {
            fields: ["titulo", "categoria", "nombre_autor"],
            options: [
                { value: null, text: "Seleccione una opción" },
                { value: null, text: "Solo elementos borrados" },
                { value: null, text: "Todos" }
            ],
            form: {
                search: this.filters.search,
                trashed: this.filters.trashed
            }
        };
    },
    components: { Publicacion, AppLayout, Pagination },
    props: {
        publicaciones: Object,
        filters: Object
    },
    watch: {
        form: {
            handler: debounce(function() {
                let query = pickBy(this.form);
                this.$inertia.replace(this.route("publicaciones.index", query));
            }, 500),
            deep: true
        }
    },
    methods: {
        reset() {
            this.form = mapValues(this.form, () => null);
        }
    }
};
</script>
