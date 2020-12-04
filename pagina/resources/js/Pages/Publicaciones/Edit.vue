<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edita la publicacion {{ publicacion }}
            </h2>
        </template>

    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
export default {
    components: {AppLayout},
    props: {
        publicacion: Object,
        errors: Object,
    },
}
</script>
