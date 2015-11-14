<?php
    session_start();
    include "busca.php";
    echo $_SESSION['nome'];
?>