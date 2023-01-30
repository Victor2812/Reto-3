<template>
       
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="#" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline"></span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a href="#" class="nav-link align-middle px-0 text-white">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link px-0 align-middle text-white">
                                <i class="fs-4 bi-mortarboard"></i> <span class="ms-1 d-none d-sm-inline">Alumnos</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link align-middle px-0 text-white">
                            <i class="fs-4 bi-buildings"></i> <span class="ms-1 d-none d-sm-inline">Empresas</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link align-middle px-0 text-white">
                                <i class="fs-4 bi-person"></i> <span class="ms-1 d-none d-sm-inline">Tutores</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link align-middle px-0 text-white">
                                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Coordinadores</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link align-middle px-0 text-white">
                                <i class="fs-4 bi-bank"></i> <span class="ms-1 d-none d-sm-inline">Grados</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link align-middle px-0 text-white">
                                <i class="fs-4 bi-bar-chart"></i> <span class="ms-1 d-none d-sm-inline">Estadísticas</span>
                            </a>
                        </li>
                    </ul>
    
                </div>
            
    
</template>
<script>
import axios from "axios";

export default {

    async mounted(){
        this.$axios.get('')
    },
    name: 'sidebarView',
}
</script>