//importamos vue
require('./bootstrap');
import { createApp } from 'vue';
//importamos la app de App.vue
import App from './App.vue';

//creamos la aplicacion y se le pasa el modulo principal
//montamos la app y como parametro sera el contenedor a donde se cargara la app

createApp(App).mount('#app');

