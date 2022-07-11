<template>

<Map v-on:idSet="retrieveData"/>

<div class="container-fluid p-4 d-flex justify-content-center">
    <div v-if="success" class="depCard">
        <div class="card cCard p-3 card-body-color animate__animated animate__fadeIn">
            <div class="card-body card-body-custom">
                <h5 class="card-header-color text-light animate__animated" v-bind:class="{animate__backInDown}">
                    {{states}}</h5>
                <ul class="text-light">
                    <li class="cRow animate__animated" v-bind:class="{animate__backInLeft}">
                        <dt>Total Population</dt>
                        <dd>{{total_population}}</dd>
                    </li>

                    <li class="cRow animate__animated" v-bind:class="{animate__backInLeft}">
                        <dt>Vaccinated Population</dt>
                        <dd>{{unvaccinated_population}}</dd>
                    </li>
                    <li class="cRow animate__animated" v-bind:class="{animate__backInLeft}">
                        <dt>Unvaccinated Population</dt>
                        <dd>{{vaccinated_population}}</dd>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="ratio ratio-16x9">
            <iframe class="shadow-1-strong rounded" src="https://www.youtube.com/embed/mfE-h57cHT4"
                title="YouTube video" allowfullscreen></iframe>
        </div>
    </div>
</div>

</template>

<script>

import Map from './components/Map.vue'

export default{
    name: 'App',
    components:{
        Map
    },
    data(){
        return{
            states:'',
            total_population:'',
            unvaccinated_population: '',
            vaccinated_population: '',
            success: false,
            animate__backInLeft:false,
            animate__fadeIn:false
        }
    },
    methods:{
        retrieveData(id){
            axios
            .get(`http://127.0.0.1:8000/api/population/${id}`)
            .then( response => {
                this.states = response.data.states;
                this.total_population = response.data.total_population;
                this.unvaccinated_population = response.data.unvaccinated_population;
                this.vaccinated_population = response.data.vaccinated_population;
                this.success = true;
                this.animate__backInLeft = true;
                this.animate__backInDown = true;
                setTimeout(this.removeClass, 900);
            })
            .catch( error => {
                console.log(error);
            });
        },
        removeClass(){
            this.animate__backInLeft = false;
            this.animate__backInDown = false;
        }
    }
}
</script>