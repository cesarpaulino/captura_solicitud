
/* ------------------ Validar telefono ------------------- */

function validartelefono(input) {
    input.value = input.value.replace(/\D/g, '').slice(0, 10);
}


/* ------------------ Validar folio ------------------- */

function validarfolio (input) {
    input.value = input.value.replace(/\D/g, '').slice(0, 10);
}

/* ------------------ Validar Oficio ------------------- */

function validaroficio(input) {
    input.value = input.value.replace(/\D/g, '').slice(0, 10);
}

/* ------------------ Validar numero de tabla ------------------- */

function validarntabla(input) {
    input.value = input.value.replace(/\D/g, '').slice(0, 10);
}

/* ------------------ Validar numero Progresivo ------------------- */

function validarprog(input) {
    input.value = input.value.replace(/\D/g, '').slice(0, 10);
}

/* ------------------ Validar mac address ------------------- */

function autoFormatoMAC(input) {
    // Obtener el valor del campo de entrada
    let mac = input.value;

    // Eliminar cualquier carácter no válido (solo permite números y letras A-F)
    mac = mac.replace(/[^0-9A-Fa-f]/g, '');

    // Aplicar el autoformato: agregar ":" cada 2 caracteres
    let macFormateada = '';
    for (let i = 0; i < mac.length; i++) {
        if (i > 0 && i % 2 === 0 && i < 12) {
            macFormateada += ':'; // Agregar ":" cada 2 caracteres
        }
        macFormateada += mac[i];
    }

    // Limitar la longitud a 17 caracteres (formato completo de MAC)
    macFormateada = macFormateada.substring(0, 17);

    // Actualizar el valor del campo de entrada
    input.value = macFormateada.toUpperCase(); // Convertir a mayúsculas

    // Validar la MAC
    validarMAC(input);
}

function validarMAC(input) {
    // Obtener el valor del campo de entrada
    const mac = input.value;

    // Expresión regular para validar una dirección MAC
    const regexMAC = /^([0-9A-Fa-f]{2}[:]){5}([0-9A-Fa-f]{2})$/;

    // Validar el formato
    if (regexMAC.test(mac)) {
        input.classList.remove('invalido');
        input.classList.add('valido');
        document.getElementById('resultado').textContent = "✅ Formato de MAC válido.";
    } else {
        input.classList.remove('valido');
        input.classList.add('invalido');
        document.getElementById('resultado').textContent = "❌ Formato de MAC inválido.";
    }
}      

/* ------------------ Validar mac IP ------------------- */

function autoFormatoIP(input) {
    // Obtener el valor del campo de entrada
    let ip = input.value;

    // Eliminar cualquier punto adicional que el usuario haya ingresado
    ip = ip.replace(/[^0-9.]/g, ''); // Solo permite números y puntos

    // Dividir la IP en segmentos
    const segmentos = ip.split('.');

    // Aplicar el autoformato
    let ipFormateada = '';
    for (let i = 0; i < segmentos.length; i++) {
        if (i > 0) {
            ipFormateada += '.'; // Agregar un punto entre segmentos
        }
        if (segmentos[i].length > 3) {
            segmentos[i] = segmentos[i].substring(0, 3); // Limitar a 3 dígitos por segmento
        }
        ipFormateada += segmentos[i];
    }

    // Actualizar el valor del campo de entrada
    input.value = ipFormateada;

    // Validar la IP
    validarIP(input);
}

function validarIP(input) {
    // Obtener el valor del campo de entrada
    const ip = input.value;

    // Expresión regular para validar una dirección IPv4
    const regexIP = /^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/;

    // Validar el formato
    if (regexIP.test(ip)) {
        input.classList.remove('invalido');
        input.classList.add('valido');
        document.getElementById('resultadoip').textContent = "✅ Formato de IP válido.";
    } else {
        input.classList.remove('valido');
        input.classList.add('invalido');
        document.getElementById('resultadoip').textContent = "❌ Formato de IP inválido.";
    }
}

/* ------------------ Validar mac IP ------------------- */



/* ------------------ Documento que carga areas ------------------- */

$(document).ready(function() {
    $("#direccion").change(function() {
        let id = $(this).val();
        let nombre = $("#direccion option:selected").data("nombre");
        $("#nombre_direccion").val(nombre);
        cargarOpciones("./php/get_subdirecciones.php", id, "#subdireccion");
    });


    $("#subdireccion").change(function() {
        let id = $(this).val();
        let nombre = $("#subdireccion option:selected").data("nombre");
        $("#nombre_subdireccion").val(nombre);
        cargarOpciones("./php/get_subareas.php", id, "#subarea");
    });


    $("#subarea").change(function() {
        let id = $(this).val();
        let nombre = $("#subarea option:selected").data("nombre");
        $("#nombre_subarea").val(nombre);
        cargarOpciones("./php/get_departamentos.php", id, "#departamento");
    });


    $("#departamento").change(function() {
        let id = $(this).val();
        let nombre = $("#departamento option:selected").data("nombre");
        $("#nombre_departamento").val(nombre);
        cargarOpciones("./php/get_secciones.php", id, "#seccion");
    });


    $("#seccion").change(function() {
        let nombre = $("#seccion option:selected").data("nombre");
        $("#nombre_seccion").val(nombre);
    });


    function cargarOpciones(url, id, selector) {
        if (id) {
            $.post(url, { id: id }, function(data) {
                $(selector).html(data).prop("disabled", false);
            });
        } else {
            $(selector).html("<option value=''>Seleccione</option>").prop("disabled", true);
        }
    }
});


/* ------------------ Imprimir Tabla ------------------- */


function imprimirTabla() {
    var contenido = document.getElementById('tablaRegistros').outerHTML;
    var ventana = window.open('', '', 'width=800,height=600');
    ventana.document.write('<html><head><title>Impresión</title></head><body>');
    ventana.document.write(contenido);
    ventana.document.write('</body></html>');
    ventana.document.close();
    ventana.print();
}


/* -----------------  function filtrar  ---------------------- */


function filtrar() {
var input, filtro, tabla, tr, td, i, j, txtValue;
input = document.getElementById("buscar");
filtro = input.value.toUpperCase();
tabla = document.getElementById("tablaRegistros");
tr = tabla.getElementsByTagName("tr");


for (i = 1; i < tr.length; i++) { // Comienza en 1 para omitir encabezado
    let encontrado = false;
    td = tr[i].getElementsByTagName("td");


    for (j = 0; j < td.length; j++) { // Recorre todas las columnas
        if (td[j]) {
            txtValue = td[j].textContent || td[j].innerText;
            if (txtValue.toUpperCase().indexOf(filtro) > -1) {
                encontrado = true;
                break; // Si encuentra coincidencia, no sigue revisando
            }
        }
    }
tr[i].style.display = encontrado ? "" : "none"; // Muestra u oculta la fila
}
}


