<?php
    require("php/busca.php"); 
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
	   <meta charset="UTF-8">
	   <title>Raateio</title>
       <link rel="stylesheet" type="text/css" href="css/estilo.css">
    </head>
    <body>
        <?php include "menu.php";?>
        <main>
            <article id="container-devecao">
                <p id="eu-devo"><?php mostraQuantoDevo();?></p>
                <p id="me-devem"><?php mostraQuantoMeDevem();?></p>
            </article>
            <article id="container-geral">
                <form id="form-cadastro-gasto">
                    <input type="text" name ="nomeGasto" id ="nomeGasto" placeholder="None Gasto" class="entrada-cadastro-gasto">
                    <input type="number" name ="valorReais" id="valorReais" placeholder="Valor Reais" min="0" class="entrada-cadastro-gasto">
                    <input type="number" name="valorCentavos" id="valorCentavos" placeholder="Valor Centavos" min="0" class="entrada-cadastro-gasto">
                    <input type="date" name="dataGasto" id="dataGasto" class="entrada-cadastro-gasto">
                    <textarea name="descricaoGasto" id="descricaoGasto" placeholder="Descrição" class="entrada-cadastro-gasto"></textarea>
                    <button type="button" id="cadastrarGasto" class="entrada-cadastro-gasto">Cadastrar</button>
                </form>
            <div id="container-pessoas">
                    <ul>
                        <?php 
                        listaGrupo();
                        ?>
                    </ul>
            </div>
            </article>
        </main>
        <footer>
        
        </footer>
    </body>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/Script.js"></script>
</html>