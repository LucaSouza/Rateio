<?php
    include "busca.php";
    $nomeGasto = $_POST['nomeGasto'];
    $descGasto = $_POST['descricaoGasto'];
    $dataGasto = $_POST['dataGasto'];
    $valorReais = $_POST['valorReais'].".".$_POST['valorCentavos'];
    $devedor = $_POST['devedor'];
    $pagante = $_SESSION['id_rateio'];
    
    if(empty($nomeGasto)||empty($valorReais)||empty($pagante)||empty($dataGasto)){
        echo "Preencha Corretamentee";
    }else{
        $con = conectar();
        $sql = "insert into gasto values(null,'$nomeGasto','$descGasto','$dataGasto','$valorReais','$pagante')";
        $resultado = mysql_query($sql);
        fechar_conexao();
        cadastroGastoPessoa(mysql_insert_id($con),$pagante);
        echo "true";
    }
    function cadastroGastoPessoa($idGasto,$idPagante){
            $double =(double)$valorReais;
            $rateio = $double/$pessoas;
            
            conectar();
            $sql = "insert into gasto_pessoa values (null,'$idPagante','$idGasto','$rateio')";
            $resultado = mysql_query($sql);
            fechar_conexao();
            
            foreach($_POST['pessoa'] as $key => $pessoa) {
                conectar();
                $sql = "insert into gasto_pessoa values (null,'$pessoa','$idGasto','$rateio')";
                fechar_conexao();
            }
    }
?>