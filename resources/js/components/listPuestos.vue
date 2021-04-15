<template>
    <div>
        <ul class="list-group list-group-horizontal-sm d-flex flex-wrap">
            <li class="list-group-item"
               v-for="puesto in puestos"
                :class="verifyClassActive(puesto)"
               @click="choosepuesto($event)"
            >{{ puesto['num_puesto'] }}</li>
        </ul>

        <input type="text" name="num_puesto" id="puestos">
    </div>
</template>

<script>
    export default {
        props: ['puestos', 'oldpuestos'],
        data() {
            return {
                habilidades: new Set(),
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
            choosepuesto(e, puesto) {
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

                // console.log(this.puestos.splice(puesto, -1));
                // console.log(Vue.delete(this.puestos, this.puesto));
            },
            verifyClassActive(puesto) {
                return this.habilidades.has(puesto) ? 'bg-primary' : '';
            }
        },
    }
</script>
