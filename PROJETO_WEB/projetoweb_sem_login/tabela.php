<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela de cadastro</title>
</head>
<style>
    *{margin:0;padding:0;box-sizing: border-box;} 
    body{
        height:100vh;
        background-color: #659ade;
        background-image: url('tabelas.jpg');
        background-repeat: no-repeat;
        background-position: center top;
        background-size: 100% 100%;
        margin-left:auto;
        margin-right:auto;
        
    }
    td, th {
  padding: .7em;
  margin: 0;
  border: 1px solid #ccc;
  text-align: center;
}
.heading{
        background-color:white;
        max-width:500px;
        width:100%;
        padding:5px;
        position:absolute;
        left:50%;
        top:50%;
        transform:translate(-50%,-50%);
        border-radius: 10px; 
        text-align: center; 
        max-height: 500px;
        overflow-y: auto;    
    }
th{
  background-color: #98ccfe;
}
td{
  font-weight:bold;
  background-color: #EEE;
  border-radius: 5px;
}

table{
  width: 50%;
  margin-bottom : .15em;
  table-layout: auto;
  text-align: center;
  margin-left: auto;
  margin-right: auto;
  overflow-y: scroll;

}
.scroll{
    overflow:auto;
}

:root{
    --cor-primaria-success : #151E3D;
    --cor-secundadria-succes: ##00bcd2;
}
button{
    border:none;
    padding:10px;
    position: fixed; 
    left: 10%;
    bottom: 7%;
    transform: translate(-75%,-0%);
    color:white;
    background-color: var(--cor-primaria-success);
    outline-color: var(--cor-secundaria-succes); 
    cursor:pointer; 
    transition: background-color .3s;
}
button:hover{
    background-color:#00bcd2;
}     
</style>
<body>
  <div class="scroll"> 
<?php
    
    $arquivo= 'cadastro.txt';
    $fp = fopen('cadastro.txt', 'r'); 
    $i=0;
    $contador=100;

if(filesize($arquivo)>0){

echo "<div class='scroll'>";
if ($fp){
   $array = explode("\n", fread($fp, filesize($arquivo)));
}


   echo "<table border == 1>
   <tr>
   <th><b>Nome</b></th>
   <th><b>Matricula</b></th>
   <th><b>Primeira Nota</b></th>
   <th><b>Segunda Nota</b></th>
   <th><b>Média</th>
   <tr/>
   <tr>";
   
    for ($i=0;$i<$contador;$i++){
   echo 
   "<td>$array[$i]</td>";
   if(($i+1)%5==0 && $i!=0){
        echo "</tr>";
   }
   if(empty($array[$i+1])){
    break;
   }
}

    "<table/>";

}else{
    echo "<h1 class='heading'>Nenhum aluno matriculado.</h1>";;
}
    fclose($fp);
    

?>
    </div> 
<a href='home.php'><button>Voltar ao home</button></a>
    
</body>
</html>
