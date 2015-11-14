$(document).ready(function(){
    $("#cadastrar").click(function(){
        var nome = $("#nome").val();
        var cpf = $("#cpf").val();
        
        if(cpf=="" || nome==""){
            alert("Esta faltando alguma coisa !");
        }else{
                    //Pagina           //Valores                       //Função de retorno PHP
            $.post("php/script-cadastro.php",{nome: nome,cpf: cpf},function(data){
                if(data=="true"){
                    $(location).attr('href','/perfil.php');
                 }else{
                     emitirMensagem(data);
                }});
        }});
    
    $("#logar").click(function(){
        var cpf = $("#cpf").val();
        alert(cpf);
        $.post("php/script-login.php",{cpf: cpf},function(data){
            if(data == "true"){
                $(location).attr('href','/perfil.php');
            }else{
                 emitirMensagem(data);
            }
        });
    })
    
    $("#cadastrarGasto").click(function(){
        var nomeGasto = $("#nomeGasto").val();
        var valorReais = $("#valorReais").val();
        var valorCentavos = $("#valorCentavos").val();
        var dataGasto = $("#dataGasto").val();
        var descricaoGasto = $("#descricaoGasto").val();
    
        var val = new Array();
		
		  $('.pessoa:checked').each(function(){
			     val.push($(this).val());
			});
             $.post("php/script-cadastro-gasto.php",{ nomeGasto:nomeGasto,valorReais:valorReais,valorCentavos:valorCentavos,dataGasto:dataGasto,descricaoGasto:descricaoGasto,devedor:val},
        function(data){
            if(data=="true"){
                emitirMensagem("Cadastrado com Sucesso");
            }else{
                emitirMensagem(data);
            }
        })
        }
    })
    
    function emitirMensagem(mensagem){
        $("#mensagem").html(mensagem);
        $( "#mensagem" ).slideDown( "fast", "linear" ).delay(2000);
        $( "#mensagem" ).slideUp( "fast", "linear" );
    }
});