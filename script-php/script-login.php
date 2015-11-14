<?php
    include "busca.php";
    $dados = buscarIdPessoa(capturar_cpf());    
    if($dados==false){
        echo "Usuário Inexistente";
    }else{
        criarSessao($dados);
        echo "true";
    }
?>