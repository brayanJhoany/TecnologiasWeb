<template>
   <div id="contacto" class="section section-contacts mt-5">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto">
                        <h2 class="text-center title">Contactenos</h2>
                        <h4 class="text-center description">Si tiene alguna pregunta o sugerencia  puede realizarla a continuación, esto nos ayudara a mejorar para brindar el mejor servicio que este en nuestras manos.</h4>
                        <form class="contact-form" action="/contacto" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nombre" class="bmd-label-floating">Nombre</label>
                                        <input name="nombre" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email" class="bmd-label-floating">Correo</label>
                                        <input name="email" type="email" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="body" class="bmd-label-floating">Mensaje</label>
                                <textarea name="body" type="text" class="form-control" rows="4" id="body"></textarea>
                            </div>
                             
                            <div class="row">
                                <div class="col-md-4 ml-auto mr-auto text-center">
                                    <button type="submit" id='btn-contact' class="btn btn-primary btn-raised">
                                    Enviar Mensaje
                                    </button>
                                </div>
                            </div>                         
                        </form>
                    </div>
                </div>
            
            </div>
</template>
<script>
import AuthLayout from "../../Layouts/AuthLayout";
export default {
    name: "Contacto",
    components: {AuthLayout},
    props: {
        errors: Object,
    },
    data() {
        return {
            form: {
                email: null,
                password: null,
            }
        }
    },
    methods: {
        login() {
            this.$inertia.post(this.route("login"), this.form).then(() => {

            })
        }
    }
}
</script>
