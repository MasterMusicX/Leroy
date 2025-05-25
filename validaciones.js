function SoloLetras(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toString();
    letras = "ABCDEFGHIJKLMNÑOPQRSUVWXYZÁÉÍÓÚabcdefghijklmnñopqrstuvwxyzáéíóú     ";

    especiales = [8,13];
    tecla_especial = false
    for(var i in especiales){
        if(key==especiales[i]){
            tecla_especial = true;
            break;
        }
    }
    if(letras.indexOf(tecla) == -1 && !tecla_especial){
        alert("Ingresa solo letras");
        return false;
    }
}

//solo numeros
function SoloNumeros(evt)
{
    if(window.event){
        keynum = evt.keyCode;
    }
    else{
        keynum = evt.which;
    }
    if((keynum > 47 && keynum < 58) || keynum == 8 || keynum == 13)
    {
        return true;
    }
    else
    {
        alert("Ingresar solo numeros");
        return false;
    }
}


//Funcion para evitar pegar texto
function evitarPegar(event){
    event.preventDefault();
}

//Agregar el evento a todos los campos del formularios
function habilitarEvitarPegado(){
    const inputs = document.querySelectorAll('input');
    inputs.forEach(input => {
        input.addEventListener('paste', evitarPegar);
    });   
}
window.onload = habilitarEvitarPegado;