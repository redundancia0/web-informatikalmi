document.getElementById('opciones').addEventListener('change', function() {
    var opcionSeleccionada = this.value;

    //ocultar inputs
    document.getElementById('discoduros').style.display = 'none';
    document.getElementById('fuentesalimentacion').style.display = 'none';
    document.getElementById('memoriasram').style.display = 'none';
    document.getElementById('perifericos').style.display = 'none';
    document.getElementById('placasbase').style.display = 'none';
    document.getElementById('procesadores').style.display = 'none';
    document.getElementById('refrigeraciones_liquidas').style.display = 'none';
    document.getElementById('tarjetas_graficas').style.display = 'none';
    document.getElementById('tarjetas_sonidos').style.display = 'none';
    document.getElementById('torres').style.display = 'none';
    document.getElementById('ventiladores').style.display = 'none';

    // Muestra el input correspondiente a la opción seleccionada
    if (opcionSeleccionada === '1') {
        document.getElementById('discoduros').style.display = 'block';
    } else if (opcionSeleccionada === '2') {
        document.getElementById('fuentesalimentacion').style.display = 'block';
    } else if (opcionSeleccionada === '3') {
        document.getElementById('memoriasram').style.display = 'block';
    } else if (opcionSeleccionada === '4') {
        document.getElementById('perifericos').style.display = 'block';
    } else if (opcionSeleccionada === '5') {
        document.getElementById('placasbase').style.display = 'block';
    } else if (opcionSeleccionada === '6') {
        document.getElementById('procesadores').style.display = 'block';
    } else if (opcionSeleccionada === '7') {
        document.getElementById('refrigeraciones_liquidas').style.display = 'block';
    } else if (opcionSeleccionada === '8') {
        document.getElementById('tarjetas_graficas').style.display = 'block';
    } else if (opcionSeleccionada === '9') {
        document.getElementById('tarjetas_sonidos').style.display = 'block';
    } else if (opcionSeleccionada === '10') {
        document.getElementById('torres').style.display = 'block';
    } else if (opcionSeleccionada === '11') {
        document.getElementById('ventiladores').style.display = 'block';
    }
});