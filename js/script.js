$(document).ready(function(){

    $("#enviar").on("click", function(){
        var mensagem = $.trim($("#mensagem").val()),
            id_conversa = $.trim($("#id_conversa").val()),
            usuario_envio_msg = $.trim($("#usuario_envio_msg").val()),
            usuario_destino = $.trim($("#usuario_destino").val()),
            erro = $("#erro");
 
        if((mensagem != "") && (id_conversa != "") && (usuario_envio_msg != "") && (usuario_destino != "")){
            erro.text("Enviando...");
            $.post("enviar_msg.php",{mensagem:mensagem,id_conversa:id_conversa,usuario_envio_msg:usuario_envio_msg,usuario_destino:usuario_destino}, function(data){
                erro.text(data);
                $("#mensagem").val("");
            });
        }
    });
 
 
    
    c_id = $("#id_conversa").val();
	
    setInterval(function(){
        $(".display-message").load("obter_msg.php?c_id="+c_id);
    }, 1000);
    

    $(".display-message").scrollTop($(".display-message")[0].scrollHeight);


    
});
$(document).ready(function(){
    setInterval(function() {
        $("#bs-example-navbar-collapse-1").load("interface.php #bs-example-navbar-collapse-1");
    }, 1000);
});