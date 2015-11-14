<?php
    include "busca.php";

    if(empty(capturar_nome()) || empty(capturar_cpf())){
        echo "Preencha corretamente";
    }
    else if(buscarIdPessoa(capturar_cpf())==false){
        conectar();
        $nome = ucwords(capturar_nome());
        $cpf = capturar_cpf();
            
        $sql = "insert into pessoa values (null,'$nome','$cpf')";
        $resultado = mysql_query($sql);
        fechar_conexao();
        criarSessao(buscarIdPessoa($cpf));
        echo "true";
    }else{
        echo "Usuário Cadastrado";
    }
?>