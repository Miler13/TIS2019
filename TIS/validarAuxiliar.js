function validarAuxiliar() {
    var nombre, apellido, sis, correo, clave1, clave2, expresion;
    nombre = document.getElementById("nombre").value;
    apellido = document.getElementById("apellido").value;
    sis = document.getElementById("sis").value;
    correo = document.getElementById("correo").value;
    clave1 = document.getElementById("clave1").value;
    clave2 = document.getElementById("clave2").value;

    expresion = /\w+@\w+\.+[a-z]/;

    if(nombre === "" || apellido === "" || correo === "" || sis === "" || clave1 ==="" || clave2 ===""){
        alert("Todos los campos son obligatorios");
        return false;
    }
    else if(nombre.length>30){
        alert("El nombre es muy largo");
        return false;
    }
    else if(apellido.length>50){
        alert("Los apellidos son muy largo");
        return false;
    }
    else if(correo.length>100){
        alert("El correo es muy largo");
        return false;
    }
    else if(!expresion.test(correo)){
        alert("El correo no es valido");
        return false;
    }
    else if(sis.length>10){
        alert("El codigo sis es muy largo");
        return false;
    }
    else if(isNaN(sis)){
        alert("El codigo sis ingresado no es un numero");
        return false;
    }
    

}

// esta funcion sirve para controlar el ingreso solo de letras en la caja de texto
function sololetras(e){
    key=e.keyCode || e.which;
    teclado=String.fromCharCode(key).toLowerCase();
    letras=" abcdefghijklmnñopqrstuvwxyz";
    especiales="8-37-38-46-164";
    teclado_especial=false;
    for(var i in especiales){
        if(key==especiales[i]){
            teclado_especial=true;
            break;
        }
    }
    if(letras.indexOf(teclado)==-1 && !teclado_especial){
        return false;
    }
}

// esta funcion sirve para controlar el ingreso solo de numeros en la caja de texto
function solonumeros(e){
    key=e.keyCode || e.which;
    teclado=String.fromCharCode(key);
    numeros="0123456789";
    especiales="8-37-38-46";
    teclado_especial=false;
    for(var i in especiales){
        if(key==especiales[i]){
            teclado_especial=true;
            break;
        }
    }
    if(numeros.indexOf(teclado)==-1 && !teclado_especial){
        return false;
    }
}