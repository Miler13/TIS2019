function validar(){
    var CodigoSIS, Nombres, Apellidos, CI, Correo, Celular, Telefono, Direccion, expresion;
    CodigoSIS = document.getElementById("carnet").value;
    Nombres = document.getElementById("nombre").value;
    Apellidos = document.getElementById("apellido").value;
    CI = document.getElementById("cedula").value;
    Correo = document.getElementById("correo").value;
    Celular = document.getElementById("celular").value;
    Telefono = document.getElementById("telefono").value;
    Direccion = document.getElementById("direccion").value;
    expresion = /\w+@\w+\.+[a-z]/;    
    if(CodigoSIS === ""|| Nombres ===""|| Apellidos ===""|| CI === ""|| Correo ===""|| Celular ==="" || Telefono === ""|| Direccion ===""){
        alert("todos los campos son obligatorios");
        return false;
    }
    else if(CodigoSIS.length>9){
        alert("El codigo SIS es muy largo, solo debe tener 9 digitos");
        return false;
    }
    else if(Nombres.length>25){
        alert("Su(s) nombre(s) es muy largo");
        return false;
    }
    else if(Apellidos.length>30){
        alert("Su(s) apellido(s) es muy largo");
        return false;
    }
    else if(CI.length>9){
        alert("su CI es muy largo");
        return false;
    }
    else if(Correo.length>50){
        alert("El correo es muy largo");
        return false;
    }
    else if(!expresion.test(Correo)){
        alert("El correo no es valido: Ejm: texto@texto.texto");
        return false;
    }
    else if(Celular.length>8){
        alert("su numero de celular es muy largo");
        return false;
    }
    else if(isNaN(Celular)){
        alert("su numero de celular no es numero");
        return false;
    }
    else if(Telefono.length>8){
        alert("su numero de telefono es muy largo");
        return false;
    }
    else if(isNaN(Telefono)){
        alert("su numero de telefono no es numero");
        return false;
    }
    else if(Direccion.length>50){
        alert("su direccion es muy largo");
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
