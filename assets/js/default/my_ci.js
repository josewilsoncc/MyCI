$(function () {
  messages_control();
});

/**
 * Gestion los efectos automaticos de los mensajes
 */
function messages_control(){
  $(".show_message").hide();
  $(".show_message").fadeIn(500);
  setInterval(function(){
    $(".auto_hide").hide(1000);
  }, 3500);
}