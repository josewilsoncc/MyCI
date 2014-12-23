/*
 * Aqui el código Javascrip general, de la aplicación
 */

function alerta() {
    //un alert
    alertify.alert("<b>Blog Reaccion Estudio</b> probando Alertify", function() {
        //aqui introducimos lo que haremos tras cerrar la alerta.
        //por ejemplo -->  location.href = 'http://www.google.es/';  <-- Redireccionamos a GOOGLE.
    });
}

function confirmar() {
    //un confirm
    alertify.confirm("<p>Aqu? confirmamos algo.<br><br><b>ENTER</b> y <b>ESC</b> corresponden a <b>Aceptar</b> o <b>Cancelar</b></p>", function(e) {
        if (e) {
            alertify.success("Has pulsado '" + alertify.labels.ok + "'");
        } else {
            alertify.error("Has pulsado '" + alertify.labels.cancel + "'");
        }
    });
    return false
}

function datos() {
    //un prompt
    alertify.prompt("Esto es un <b>prompt</b>, introduce un valor:", function(e, str) {
        if (e) {
            alertify.success("Has pulsado '" + alertify.labels.ok + "'' e introducido: " + str);
        } else {
            alertify.error("Has pulsado '" + alertify.labels.cancel + "'");
        }
    });
    return false;
}

function notificacion() {
    alertify.log("Esto es una notificaci?n cualquiera.");
    return false;
}

function ok() {
    alertify.success("Visita nuestro <a href=\"http://blog.reaccionestudio.com/\" style=\"color:white;\" target=\"_blank\"><b>BLOG.</b></a>");
    return false;
}

function error() {
    alertify.error("Usuario o constrase?a incorrecto/a.");
    return false;
}