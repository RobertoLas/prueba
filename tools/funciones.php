<script>
    function checkRut(rut) {

        if (rut.value.length <= 1) {
            alerta.classList.remove('alert-success', 'alert-danger');
            alerta.classList.add('alert-info');
            mensaje.innerHTML = 'Ingrese un RUT en el siguiente campo de texto para validar si es correcto o no';
        }

        // Obtiene el valor ingresado quitando puntos y guión.
        var valor = clean(rut.value);

        // Divide el valor ingresado en dígito verificador y resto del RUT.
        cuerpo = valor.slice(0, -1);
        dv = valor.slice(-1).toUpperCase();

        // Separa con un Guión el cuerpo del dígito verificador.
        rut.value = format(rut.value);

        // Si no cumple con el mínimo ej. (n.nnn.nnn)
        if (cuerpo.length < 7) {
            rut.setCustomValidity("RUT Incompleto");
            alerta.classList.remove('alert-success', 'alert-danger');
            alerta.classList.add('alert-info');
            mensaje.innerHTML = 'Ingresó un RUT muy corto, el RUT debe ser mayor a 7 Dígitos. Ej: x.xxx.xxx-x';
            return false;
        }

        // Calcular Dígito Verificador "Método del Módulo 11"
        suma = 0;
        multiplo = 2;

        // Para cada dígito del Cuerpo
        for (i = 1; i <= cuerpo.length; i++) {
            // Obtener su Producto con el Múltiplo Correspondiente
            index = multiplo * valor.charAt(cuerpo.length - i);

            // Sumar al Contador General
            suma = suma + index;

            // Consolidar Múltiplo dentro del rango [2,7]
            if (multiplo < 7) {
                multiplo = multiplo + 1;
            } else {
                multiplo = 2;
            }
        }

        // Calcular Dígito Verificador en base al Módulo 11
        dvEsperado = 11 - (suma % 11);

        // Casos Especiales (0 y K)
        dv = dv == "K" ? 10 : dv;
        dv = dv == 0 ? 11 : dv;

        // Validar que el Cuerpo coincide con su Dígito Verificador
        if (dvEsperado != dv) {
            rut.setCustomValidity("RUT Inválido");

            alerta.classList.remove('alert-info', 'alert-success');
            alerta.classList.add('alert-danger');
            mensaje.innerHTML = 'El RUT ingresado: ' + rut.value + ' Es <strong>INCORRECTO</strong>.';

            return false;
        } else {
            rut.setCustomValidity("RUT Válido");

            alerta.classList.remove('d-none', 'alert-danger');
            alerta.classList.add('alert-success');
            mensaje.innerHTML = 'El RUT ingresado: ' + rut.value + ' Es <strong>CORRECTO</strong>.';
            return true;
        }
    }


    function enviarSeleccionado(valor) {
        document.getElementById('id_region_change').value = valor
        let datos = new FormData(document.getElementById('form'))
        fetch('controlador.php', {
            method: 'POST',
            body: datos,
        })
            .then(response => response.json())
            .then(data => {
                // Manejar la respuesta de la solicitud fetch
                console.log(data);
                document.getElementById("id_comuna").innerHTML = "";
                data.map((comuna) => {

                    let opt = document.createElement("option");
                    opt.value = comuna.id;
                    opt.innerText = comuna.nombre;
                    document.getElementById("id_comuna").appendChild(opt)
                })

            })
            .catch(error => {
                // Manejar errores de la solicitud fetch
                console.error('Error:', error);
            });
    }


    function procesarFormulario(event) {
        event.preventDefault(); 
        document.getElementById('id_region_change').value = null
        // Evitar el envío del formulario por defecto
        // Obtener los valores de los campos del formulario
        let nombre = document.getElementById('nombre_apellido').value;
        let alias = document.getElementById('alias').value;
        let rut = document.getElementById('rut').value;
        let email = document.getElementById('email').value;
        let id_region = document.getElementById('id_region').value;
        let id_comuna = document.getElementById('id_comuna').value;
        let candidato = document.getElementById('candidato').value;

        let camposFaltantes = [];

        if (nombre.trim() === '') {
            camposFaltantes.push('Nombre Completo');
        }

        if (alias.length < 6 || !(/^[a-zA-Z0-9]+$/.test(alias))) {
            camposFaltantes.push('Alias');
        }

        if (validarRut(rut) !== false) {
            camposFaltantes.push(validarRut(rut));
        }
        if (validarEmail(email) !== false) {
            camposFaltantes.push(validarEmail(email));
        }



        // // Procesar los datos como desees
        let checkboxesContainer = document.getElementById('cheboxs');

        let checkboxes = checkboxesContainer.querySelectorAll('input[type="checkbox"]');
        let checkboxesSeleccionados = 0;
        let checkBoxEnviar = [];
        for (let i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                checkBoxEnviar.push(parseInt(checkboxes[i].value))
                checkboxesSeleccionados++;
            }
        }
        if (checkboxesSeleccionados < 2) {
            camposFaltantes.push('Debe seleccionar al menos dos opciones en "Como se enteró de Nosotros');
            // alert('Debe seleccionar al menos dos opciones en "Como se enteró de Nosotros".');
        }



        if (camposFaltantes.length > 0) {
            alert('Los siguientes campos son requeridos o tienen errores:\n\n' + camposFaltantes.join(', '));
            return false; // Evita que se envíe el formulario si hay campos faltantes
        } else {
            console.log('Nombre:', nombre);
            console.log('Alias:', alias);
            console.log('RUT:', rut);
            console.log('Email:', email);
            console.log('ID Región:', id_region);
            console.log('ID Comuna:', id_comuna);
            console.log('Candidato:', candidato);
            console.log('checkbox:', checkBoxEnviar)


            let data = {
                "nombre": nombre,
                "alias": alias,
                "rut": rut,
                "email": email,
                "id_region": id_region,
                "id_comuna": id_comuna,
                "candidato": candidato,
                "checkBoxEnviar": checkBoxEnviar
            };

            // let data = {
            //     "nombre": "Roberto Espinoza",
            //     "alias": "Roerto123",
            //     "rut": "19330182-5",
            //     "email": "roberto.espinoza.espinoza@gmail.com",
            //     "id_region": 6,
            //     "id_comuna": 65,
            //     "candidato": 1,
            //     "checkbox": [13, 14]
            // }

            console.log(data);


            var jsonData = JSON.stringify(data);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'controlador.php', true);
            xhr.setRequestHeader('Content-Type', 'application/json');

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // La solicitud se ha completado correctamente
                    var response = xhr.responseText;
                    alert(response);
                    // location.reload();
                }else{
                    // alert(response);
                }
            };

            xhr.send(jsonData);

            
        }



        // Ejemplo: Mostrar los datos en la consola


        // Si deseas enviar los datos al servidor, puedes hacerlo a través de una solicitud AJAX (por ejemplo, utilizando fetch)
        // ...
    }

    function validarRut(rut) {
        // Eliminar espacios en blanco y guiones del RUT
        rut2 = rut.replace(/\s|-/g, '');
        // console.log(rut);
        if (rut2.trim() === '') {
            return false; // Permitir campo vacío
        }

        // Verificar si el RUT tiene el formato correcto
        if (!/^[0-9]{7,8}-[0-9kK]$/.test(rut)) {
            return 'El RUT debe tener el formato correcto, por ejemplo: 12345678-9';
        }

        // Separar el número y el dígito verificador del RUT
        const [num, dv] = rut.split('-');

        // Verificar el cálculo del dígito verificador
        let suma = 0;
        let factor = 2;
        for (let i = num.length - 1; i >= 0; i--) {
            suma += parseInt(num.charAt(i)) * factor;
            factor = factor === 7 ? 2 : factor + 1;
        }
        const resto = suma % 11;
        const digitoCalculado = resto === 0 ? '0' : resto === 1 ? 'k' : (11 - resto).toString();

        if (digitoCalculado.toLowerCase() !== dv.toLowerCase()) {
            return 'El RUT ingresado no es válido';
        }

        // El RUT es válido
        return false;
    }






    function validarEmail(email) {
        // Verificar si el email tiene el formato correcto
        if (email.trim() === '') {
            return false; // Permitir campo vacío
        }
        if (!/^[\w.-]+@[\w.-]+\.\w+$/.test(email)) {
            return 'El correo electrónico debe tener un formato válido.';
        }

        // El email es válido
        return false;
    }


</script>