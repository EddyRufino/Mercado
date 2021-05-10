<template>
    <div>

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
                            <div class="form-check form-check-inline" v-for="radio in nombreRadios">
                              <input class="form-check-input"
                                    type="radio"
                                    id="inlineRadio1"
                                    v-model="color"
                                    :value="radio.value"
                                >
                              <label class="form-check-label">
                                {{ radio.text }}
                              </label>
                            </div>
                        </div>
                        <ul class="list-group list-group-horizontal-sm d-flex flex-wrap">
                            <li class="list-group-item redond pointer d-flex justify-content-center flex-column text-white"
                               v-for="puesto in searchPuesto"
                               :class="verifyClassActive(puesto['id'])"
                               @click="choosepuesto($event, puesto)"
                               :style="{'background-color': puesto['color']}"
                            >
                                    {{ puesto['num_puesto'] }}
                                    {{ puesto['ubicacion'] }}
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
                color: '#5DD9F5',
                nombreRadios: [
                    {value: '#5DD9F5', text: 'Interior', color: '#5DD9F5'},
                    {value: '#49B3CB', text: 'Gruta - Interior', color: '#49B3CB'},
                    {value: '#30BF3B', text: 'Plataforma', color: '#30BF3B'},
                    {value: '#CD6B08', text: 'Mesa Redonda - Plataforma', color: '#CD6B08'},
                    {value: '#F662BC', text: 'Locales del Exterior', color: '#F662BC'},
                    {value: '#088A68', text: 'Locales - Plataforma', color: '#088A68'},
                    {value: '#0080FF', text: 'Locales del Interior', color: '#0080FF'},
                    {value: '#F7D358', text: 'Ambulantes', color: '#F7D358'},
                    {value: '#BF00FF', text: 'Kioskos Plataforma', color: '#BF00FF'},
                    {value: '#F6CED8', text: 'Kioskos del Interior', color: '#F6CED8'},
                    {value: '#812D00', text: 'Tiendas del Exterior', color: '#812D00'},
                ],
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
            // console.log(this.oldpuestos);
            this.selects = this.oldpuestos;
        },
        computed: {
            searchPuesto: function () {
                return this.puestos.filter((puesto) => puesto.color.includes(this.color));
            }
        },
        methods: {
            choosepuesto(e, puesto) {
                // console.log(e.target.remove());
                if (e.target.classList.contains('bg-danger')) {
                    e.target.classList.remove('bg-danger');
                    this.habilidades.delete(parseInt(puesto.id));
                } else {
                    e.target.classList.add('bg-danger');
                    this.habilidades.add(parseInt(puesto.id));
                }
                // Agregar las puestos al input
                // parseInt(this.habilidades);
                const stringHabilidades = [...this.habilidades];
                document.getElementById('puestos').value = parseInt(stringHabilidades);

                console.log(stringHabilidades);
                this.selects = stringHabilidades;
                this.oldpuestos = stringHabilidades;
            },
            verifyClassActive(puesto) {
                return this.habilidades.has(parseInt(puesto)) ? 'bg-danger' : '';
            }
        },
    }
</script>
