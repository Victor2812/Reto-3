<template>
    <div class="contenedor">
    <v-typical 
        class="blink"
        :steps="['TU MADRE EN TANGA']"
        :loop="Infinity"
        :wrapper="'h1'"
    >
    </v-typical>
</div>
</template>

<script lang="ts">
import VTypical from 'vue-typical';

export default {
    name: "error-component",
    components: {
        VTypical,
    },
};
</script>

<style>
    .contenedor {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .blink::after {
        content: '|';
        animation: blink 1s infinite step-start;
    }

    @keyframes blink {
        50% {
            opacity: 0;
        }
    }
</style>