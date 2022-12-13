<?php
  include('protect.php');

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<style>
    *{margin:0;padding:0;box-sizing: border-box;} 
    body{
        height:100vh;
        background-color: #151E3D;
        background-image: url('homeimage.jpg');
        background-repeat: no-repeat;
        background-position: center top;
        background-size: 100% 100%;
    }
    :root{
    --cor-primaria-success : #151E3D;
    --cor-secundadria-succes: ##00bcd2;
}
.cadastro{
    border:none;
    padding:10px;
    position: fixed; 
    left: 25%;
    bottom: 50%;
    transform: translate(-75%,-50%);
    color:white;
    background-color: var(--cor-primaria-success);
    outline-color: var(--cor-secundaria-succes); 
    cursor:pointer; 
    transition: background-color .3s;
    border-radius: 5px;
}
.cadastro:hover{
    background-color:#00bcd2;
}
.busca{
    border:none;
    padding:10px;
    position: fixed; 
    left: 50%;
    bottom: 50%;
    transform: translate(-50%,-50%);
    color:white;
    background-color: var(--cor-primaria-success);
    outline-color: var(--cor-secundaria-succes); 
    cursor:pointer; 
    transition: background-color .3s;
    border-radius: 5px;
}
.busca:hover{
    background-color:#00bcd2;
}
.tabela{
    border:none;
    padding:10px;
    position: fixed; 
    left: 75%;
    bottom: 50%;
    transform: translate(-25%,-50%);
    color:white;
    background-color: var(--cor-primaria-success);
    outline-color: var(--cor-secundaria-succes); 
    cursor:pointer; 
    transition: background-color .3s;
    border-radius: 5px;
}
.tabela:hover{
    background-color:#00bcd2;
}
.logout{
    border:none;
    padding:10px;
    position: fixed; 
    left: 5%;
    bottom: 7%;
    transform: translate(-25%,-50%);
    color:white;
    background-color: var(--cor-primaria-success);
    outline-color: var(--cor-secundaria-succes); 
    cursor:pointer; 
    transition: background-color .3s;
    border-radius: 5px;
}
.logout:hover{
    background-color:#00bcd2;
}    
    
    </style>
<body>
    <h2><a href= 'cadastrar.php' class='cadastro'>Cadastrar aluno</a></h2>
    <h2><a href= 'buscar.php' class='busca'>Buscar aluno</a></h2>
    <h2><a href= 'tabela.php' class='tabela'>Exibir alunos matriculados</a></h2>
        

   <button><a href="logout.php" class='logout'>SAIR</a></button>
    
</body>
</html>