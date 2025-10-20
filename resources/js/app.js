import './bootstrap';
import 'bootstrap';
import { Alert } from 'bootstrap';
import $ from 'jquery';

console.log('ouro');


// Espera 4 segundos (4000 ms) e fecha o alerta automaticamente
$(document).ready(function () {
    // Espera 4 segundos (4000 ms) e esconde o alerta
    setTimeout(() => {
        $('#alerta-sucesso').fadeOut('slow', function () {
            $(this).remove(); // remove do DOM após sumir
        });
    }, 4000);
});