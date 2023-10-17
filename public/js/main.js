
    // Script para mostrar/ocultar los elementos según la opción seleccionada
    $(document).ready(function() {
        // Función para ocultar el mensaje flash con transición de salida
        setTimeout(function() {
            var flashMessage = document.getElementById('msg-flash');
            if (flashMessage) {
                flashMessage.classList.remove('entering');
                flashMessage.classList.add('exiting');
                setTimeout(function() {
                    flashMessage.style.display = 'none';
                }, 500); 
            }
        }, 5000);
        
        // $(document).ready(function() {
        $("input[name='opcion']").change(function() {
            if (this.value === "opcion1") {
                $("#fechaInput").show();
                $("#rangoFechaInicio").hide();
                $("#rangoFechaFin").hide();
                $("#multipleFechas").hide();

                $('#inputFecha').val('');

                // Configura el campo de entrada con el calendario, habilita la selección de múltiples fechas y establece el idioma en español
                $('#inputFecha').datepicker({
                    format: 'yyyy-mm-dd',
                    language: 'es',
                    clearBtn: true,
                    autoclose: true,
                    orientation: 'bottom',
                    todayHighlight: true
                });
            } else if (this.value === "opcion2") {
                $("#rangoFechaInicio").show();
                $("#rangoFechaFin").show();
                $("#multipleFechas").hide();
                $("#fechaInput").hide();

                $('#inputRangoFechaInicio').val(''); 
                $('#inputRangoFechaFin').val('');

                // Configura el campo de rango de fechas con el calendario y establece el idioma en español
                $('#inputRangoFechaInicio').datepicker({
                    format: 'yyyy-mm-dd',
                    language: 'es',
                    clearBtn: true,
                    autoclose: true,
                    orientation: 'bottom',
                    todayHighlight: true
                });

                $('#inputRangoFechaFin').datepicker({
                    format: 'yyyy-mm-dd',
                    language: 'es',
                    clearBtn: true,
                    autoclose: true,
                    orientation: 'bottom',
                    todayHighlight: true
                });
            } else if (this.value === "opcion3") {
                $("#multipleFechas").show();
                $("#fechaInput").hide();
                $("#rangoFechaInicio").hide();
                $("#rangoFechaFin").hide();

                $('#inputMultiplesFechas').val('');

                // Configura el campo de entrada con el calendario, habilita la selección de múltiples fechas y establece el idioma en español
                $('#inputMultiplesFechas').datepicker({
                    format: 'yyyy-mm-dd',
                    language: 'es',
                    multidate: true,
                    multidateSeparator: ', ',
                    clearBtn: true,
                    autoclose: true,
                    orientation: 'bottom',
                    todayHighlight: true
                });
            }
        });
    });