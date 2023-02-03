<template>
    <div class="contenedor">
        <h1>{{ texts }}</h1>
    <!--<v-typical 
        class="blink"
        :steps="['TU MADRE EN TANGA']"
        :loop="Infinity"
        :wrapper="'h1'"
        >
        </v-typical>-->
    </div>
</template>

<script lang="ts">
import VTypical from "vue-typical";

export default {
    name: "error-component",
    components: {
        VTypical,
    },

    data() {
        return {
            texts: ''
        }
    },

    mounted() {
       fetch('/gay')
       .then(async response => {
        const data = await response.json();

        if (response.ok) {
            console.log(data);
        } else {
            console.log('an error occurred while fetching 403 frases');
        }
        
        var random = data[Math.floor(Math.random() * data.length)]['frase'];
        this.texts = random;
       });
        /*
        fetch('/gay').then(r => r.ok && r.json()).then(data => {
            this.texts = data;
        });*/
    }
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