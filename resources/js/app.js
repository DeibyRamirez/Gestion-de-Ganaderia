import { Chart, registerables } from 'chart.js';
Chart.register(...registerables);


import './bootstrap';

import './indicador_sidebar';

import './Duracion_mensaje';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
