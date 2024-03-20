<script setup>
    import useDataLoggers from "../composables/datalogger";
    import { onMounted } from "vue";

    const {lecturas, getLecturas} = useDataLoggers()

    onMounted( ()=> getLecturas() )

</script>

<template>
    <table class=" table table-striped table-condensed table-sm" style="font-size: small;">
        <thead>
            <tr>
                <td>Estacion</td>
                <td>Lectura</td>
                <td>f_ED1</td>
                <td>f_ED2</td>
                <td>f_ED3</td>
                <td>f_ED4</td>
                <td>f_ED5</td>
                <td>f_ED6</td>
                <td>f_ED7</td>
                <td>f_ED8</td>
                <td></td>
            </tr>
        </thead>

        <tbody>
            <tr v-for="lectura in lecturas" :key="lectura.f_id_registro">

                <td>{{ lectura.f_nombre }}</td>
                <td>{{ lectura.f_fecha }}</td>
                <td>{{ lectura.f_ED1 }}</td>
                <td>{{ lectura.f_ED2 }}</td>
                <td>{{ lectura.f_ED3 }}</td>
                <td>{{ lectura.f_ED4 }}</td>
                <td>{{ lectura.f_ED5 }}</td>
                <td>{{ lectura.f_ED6 }}</td>
                <td>{{ lectura.f_ED7 }}</td>
                <td>{{ lectura.f_ED8 }}</td>
                <td>{{ lectura.f_situacion }}</td>
            </tr>
        </tbody>

    </table>

</template>
