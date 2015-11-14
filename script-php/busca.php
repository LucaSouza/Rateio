<?php
    session_start();
    function conectar(){
        $conexao = mysql_connect("localhost","root","root");
        mysql_select_db("rateio");
        return $conexao;
    }
    function fechar_conexao(){
        mysql_close("rateio");
    }
    function capturar_cpf(){
        return md5($_POST['cpf']);
    }
    function capturar_nome(){
        return $_POST['nome'];
    }
    function criarSessao($dado_1){
        $_SESSION['id_rateio']=$dado_1;
    }
    function capturarSessao(){
        return $_SESSION['id_rateio'];
    }
    function buscarIdPessoa($dados){
        conectar();
        
        $sql = "SELECT * FROM pessoa where cpf_pessoa = '$dados';";
        $resultado = mysql_query($sql);
        $reg = mysql_fetch_row($resultado);
        fechar_conexao();
        if(!$resultado){
            return false;
        }
        return $reg[0];
    }
    function listaGrupo(){
        if(!empty(capturarSessao())){
            conectar();
            $sql = "select * from pessoa where id_pessoa !='".capturarSessao()."'";
            $resultado = mysql_query($sql);
            $linhas = mysql_num_rows($resultado);
            fechar_conexao();
        
        if($linhas > 0){
            for ($i=0;$i<$linhas;$i++){
                $reg = mysql_fetch_row($resultado);
                    echo "<li><label>$reg[1]<input type='checkbox' name='pessoa[]' value='".$reg[0]."' class='pessoa'></label></li>";
            }
        }else{
            echo "Ninguem cadastrado ;c";
        }}
    }

    function mostraQuantoDevo(){
        if(!empty(capturarSessao())){
            conectar();
        $sql = "select * from gasto_pessoa where id_pessoa = ".$_SESSION["id_rateio"];
        $resultado = mysql_query($sql);
        $linhas = mysql_num_rows($resultado);
        $soma = 0;
        fechar_conexao();
        if($linhas > 0){
            for($i=0;$i<$linhas;$i++){
                $reg = mysql_fetch_row($resultado);
                $soma = $soma+$reg[4];
            }
        
        }else{
            echo "Não devo nada #Feliz !";
        }}
    }
    
    function mostraQuantoMeDevem(){
        if(!empty(capturarSessao())){
        conectar();
        $sql = "select gasto_pessoa.valor_divisao from gasto_pessoa inner join gasto on gasto_pessoa.id_pessoa = gasto.pagante where gasto_pessoa.id_pessoa = ".$_SESSION['id_rateio'];
        
        $resultado = mysql_query($sql);
        $linhas = mysql_num_rows($resultado);
        $soma = 0;
        fechar_conexao();
        
        if($linhas > 0){
            for($i=0;$i<$linhas;$i++){
                $reg = mysql_fetch_row($resultado);
                $soma = $soma+$reg[4];
            }
        }else{
            echo "Não me devem nada #Infeliz !";
        }}
    }

    function mostraNome(){
        if(!empty(capturarSessao())){
            conectar();
            $sql = "select nome_pessoa from pessoa where id_pessoa = ".capturarSessao();
            $resultado = mysql_query($sql);
            $reg = mysql_fetch_row($resultado);
            fechar_conexao();
            
            $posicao =  strpos($reg[0]," ");
            $string = strlen($reg[0]);
            
            if($posicao != null && $string > $posicao+2){
                echo substr($reg[0], 0, $posicao+2)."."; 
            }
        }
    }


















?>