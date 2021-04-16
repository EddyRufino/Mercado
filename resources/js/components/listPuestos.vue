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
        <select name="lista_id[]" class="form-control selectpicker" id="puestos" multiple="multiple">
            <!-- <option v-for="select in selects"  :value="select">{{select}}</option> -->
            <option>{{chose}}</option>
        </select>
        <!-- <input type="text" name="lista_id[]" id="puestos"> -->
        <!-- var Util = { -->
        <!-- <input type="text" v-model="chose"> -->

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
              Agregar puestos
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
                        <ul class="list-group list-group-horizontal-sm d-flex flex-wrap">
                            <li class="list-group-item"
                               v-for="puesto in puestos"
                                :class="verifyClassActive(puesto)"
                               @click="choosepuesto($event)"
                               v-model="chose"
                            >{{ puesto['num_puesto'] }}</li>
                        </ul>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
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
                chose: '',
            }
        },
        created: function() {
            if (this.oldpuestos) {
                const puestosArray = this.oldpuestos.split(',');
                puestosArray.forEach( puesto => this.habilidades.add(puesto) );
            }

        },
        mounted: function() {
            // Llena el input con las puestos selecionadas antes de recargar la pagina
            document.querySelector('#puestos').value = this.oldpuestos;

        },
        methods: {
            choosepuesto(e) {
                // console.log(e.target.remove());
                if (e.target.classList.contains('bg-primary')) {
                    e.target.classList.remove('bg-primary');
                    this.habilidades.delete(e.target.textContent);
                } else {
                    e.target.classList.add('bg-primary');
                    this.habilidades.add(e.target.textContent);
                }
                // Agregar las puestos al input
                const stringHabilidades = [...this.habilidades];
                document.getElementById('puestos').value = stringHabilidades;


                // console.log(document.querySelector('.filter-option-inner-inner').value = stringHabilidades);
                // document.getElementById('exampleFormControlSelect1').value = stringHabilidades;
                this.selects = stringHabilidades;
                // console.log(this.selects);
                // console.log(this.puestos.splice(puesto, -1));
                // console.log(Vue.delete(this.puestos, this.puesto));
            },
            verifyClassActive(puesto) {
                return this.habilidades.has(puesto) ? 'bg-primary' : '';
            }
        },
    }
</script>
