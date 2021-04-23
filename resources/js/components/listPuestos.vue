<template>
    <div>
<!--         <ul class="list-group list-group-horizontal-sm d-flex flex-wrap">
            <li class="list-group-item"
               v-for="puesto in puestos"
                :class="verifyClassActive(puesto)"
               @click="choosepuesto($event)"
            >{{ puesto['num_puesto'] }}</li>
        </ul> -->

<!--         <select name="lista_id[]" id="puestos" class="selectpicker" multiple="multiple">
            <option v-for="select in selects"  :value="select">{{select}}</option>
        </select> -->

        <!-- this.selects != 0   this.oldpuestos-->

        <div class="d-flex justify-content-center align-items-start flex-column">
            <div class="row col-md-12">
              <!--   <select name="lista_id[]" class="form-control " id="puestos" multiple="multiple" v-show="this.selects != 0">
                    <option v-for="select in this.selects"  :value="select">{{select}}</option>
                </select> -->
                <span v-for="name in this.names" class="bg-secondary m-1 pt-1 pb-1 pr-2 pl-2 rounded">
                    {{name.num_puesto}}{{name.ubicacion}}
                </span>
                <input type="hidden" v-for="select in this.selects" :value="select" name="lista_id[]" id="puestos">

            </div>


            <!-- var Util = { -->
            <div class="row col-md-12">


                    <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                  Elegir puestos
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Listado de Puestos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="d-flex justify-content-around mb-3 row">
                            <span><i class="circule circule-1"></i> Interior</span>
                            <span><i class="circule circule-2"></i> Gruta - Interior</span>
                            <span><i class="circule circule-3"></i> Plataforma</span>
                            <span><i class="circule circule-4"></i> Mesa Redonda - Plataforma</span>
                            <span><i class="circule circule-5"></i> Local Exterior</span>
                        </div>
                        <ul class="list-group list-group-horizontal-sm d-flex flex-wrap">
                            <li class="list-group-item pointer d-flex justify-content-center flex-column text-white"
                                v-for="puesto in puestos"
                                :class="verifyClassActive(puesto)"
                                @click="choosepuesto($event, puesto)"
                                :style="{'background-color': puesto['color']}"
                            >
                            <!-- <a href="#"> -->
                                <!-- <span class="text-center text-white"> -->
                                    {{ puesto['num_puesto'] }}
                                    <!-- <i class="nav-icon fas fa-home"></i> -->
                                <!-- </span> -->
                                <!-- <span class="text-center text-white" > -->
                                    {{ puesto['ubicacion'] }}
                                <!-- </span> -->
                            <!-- </a> -->
                            </li>
                        </ul>
<!-- genderless -->
                        <input type="hidden" name="lista_id[]" id="puestos">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['puestos', 'oldpuestos'],
        data() {
            return {
                habilidades: new Set(),
                selects: [],
                names: [],
            }
        },
        created: function() {
            if (this.oldpuestos) {
                const puestosArray = this.oldpuestos;
                puestosArray.forEach( puesto => this.habilidades.add(puesto) );
                // console.log(this.puestosArray);
            }
        },
        mounted: function() {
            // Llena el input con las puestos selecionadas antes de recargar la pagina
            document.querySelector('#puestos').value = this.oldpuestos;
            // console.log(this.oldpuestos);
        },
        methods: {
            choosepuesto(e, puesto) {
                // console.log(puesto);
                if (e.target.classList.contains('bg-primary')) {
                    e.target.classList.remove('bg-primary');
                    this.habilidades.delete(puesto.id);
                    this.names.splice(this.names.indexOf(puesto), 1);
                } else {
                    e.target.classList.add('bg-primary');
                    this.habilidades.add(puesto.id);
                    this.names.push(puesto);
                }
                // e.target.textContent
                // Agregar las puestos al input
                const stringHabilidades = [...this.habilidades];
                document.getElementById('puestos').value = stringHabilidades;

                this.selects = stringHabilidades;

            },
            verifyClassActive(puesto) {
                return this.habilidades.has(puesto) ? 'bg-primary' : '';
            }
        },
    }
</script>
