<?php
  
    if(!isset($_SESSION)){
        session_start();
    }
    if(!isset($_SESSION['id'])) {
        die("<h1>Voce não pode acessar essa página, porque não está logado.</h1><h2><a href=\"index.php\">Entrar</a> </h2>");
    }
?>
