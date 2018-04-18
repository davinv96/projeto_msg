$(document).ready(function(){
    $("#reply").on("click", function(){
        var message = $.trim($("#message").val()),
        conversation_id = $.trim($("#id_conversa").val()),
        user_form = $.trim($("#usuario_envio").val()),
        user_to = $.trim($("#usuario_destino").val()),
        error = $("#error");
        if((message != "") && (conversation_id != "") && (user_form != "") && (user_to != "")){
            error.text("Sending...");
            $.post("enviar_mensagem.php",{message:message,conversation_id:conversation_id,user_form:user_form,user_to:user_to}, function(data){
                error.text(data);
                $("#message").val("");
            });
        }
    });
    c_id = $("#conversation_id").val();
    setInterval(function(){
    $(".display-message").load("obter_mensagens?c_id="+c_id);
    }, 2000);
    $(".display-message").scrollTop($(".display-message")[0].scrollHeight);
});