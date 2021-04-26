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
<!--                 <select name="lista_id[]" class="form-control " id="puestos" multiple="multiple" v-show="this.oldpuestos">
                    <option v-for="select in this.selects"  :value="select">{{select}}</option>
                </select> -->

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
                            <span><i class="circule circule-5"></i> Locales de Exterior</span>
                            <span><i class="circule circule-6"></i> Locales - Plataforma</span>
                            <span><i class="circule circule-7 mt-2"></i> Locales del Interior</span>
                            <span><i class="circule circule-8 mt-2"></i> Ambulantes</span>
                            <span><i class="circule circule-9 mt-2"></i> Kioskos Plataforma</span>
                            <span><i class="circule circule-10 mt-2"></i> Kioskos del Interior</span>
                            <span><i class="circule circule-11 mt-2"></i> Kioskos del Exterior</span>
                        </div>
                        <ul class="list-group list-group-horizontal-sm d-flex flex-wrap">
                            <li class="list-group-item redond pointer d-flex justify-content-center flex-column text-white"
                               v-for="puesto in puestos"
                                :class="verifyClassActive(puesto['id'])"
                               @click="choosepuesto($event, puesto)"
                               :style="{'background-color': puesto['color']}"
                            >
                                <!-- <span class="text-center"> -->
                                    {{ puesto['num_puesto'] }}
                                <!-- </span> -->
                                <!-- <span class="text-center"> -->
                                    {{ puesto['ubicacion'] }}
                                <!-- </span> -->
                            </li>
                        </ul>

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
            }
        },
        created: function() {
            if (this.oldpuestos) {
                const puestosArray = this.oldpuestos;
                puestosArray.forEach( puesto => this.habilidades.add(puesto) );

            }
        },
        mounted: function() {
            // Llena el input con las puestos selecionadas antes de recargar la pagina
            document.querySelector('#puestos').value = this.oldpuestos;
            console.log(this.oldpuestos);
            this.selects = this.oldpuestos;
        },
        methods: {
            choosepuesto(e, puesto) {
                // console.log(e.target.remove());
                if (e.target.classList.contains('bg-danger')) {
                    e.target.classList.remove('bg-danger');
                    this.habilidades.delete(puesto.id);
                } else {
                    e.target.classList.add('bg-danger');
                    this.habilidades.add(puesto.id);
                }
                // Agregar las puestos al input
                const stringHabilidades = [...this.habilidades];
                document.getElementById('puestos').value = stringHabilidades;

                this.selects = stringHabilidades;
                this.oldpuestos = stringHabilidades;
            },
            verifyClassActive(puesto) {
                return this.habilidades.has(puesto) ? 'bg-danger' : '';
            }
        },
    }
</script>
