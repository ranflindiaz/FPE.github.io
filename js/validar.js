
function validar() {
  let nombre, telefono, correo, mensaje, expresion;
    nombre = document.getElementById("nombre").value;
    telefono = document.getElementById("telefono").value;
    correo = document.getElementById("correo").value;
    mensaje = document.getElementById("mensaje").value;
    expresion = /\w+@\w+\.+[a-z]/;

    if(nombre === "" || telefono === "" || correo === "" || mensaje === ""){
        alert("Todos los campos son obligatorios");
        return false;
    } else if (nombre.length>45){
        alert("El nombre es muy largo.");
        return false;
    } else if(telefono.length>10){
        alert("El telefono es muy largo, introduzca solo numeros sin guiones.");
        return false;
    } else if(telefono.length<10){
        alert("El telefono no esta completo, introduzca solo numeros sin guiones.");
        return false;
    } else if (!expresion.test(correo)){
        alert("El correo ingresado no es valido.");
        return false;
    }
    else if(mensaje.length>500){
        alert("El mensaje es muy largo, solo se aceptan 500 caracteres.");
        return false;
    } else if(isNaN(telefono)){
        alert("El telefono ingresado no es un numero.");
        return false;
    }
}
