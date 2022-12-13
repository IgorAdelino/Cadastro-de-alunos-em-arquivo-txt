<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busca</title>
</head>
<style>
      *{margin:0;padding:0;box-sizing: border-box;} 
    body{
        height:100vh;
        background-color: #151E3D;
        background-image: url('tabelas.jpg');
        background-repeat: no-repeat;
        background-position: center top;
        background-size: 100% 100%;
        text-align: center;
        
       
    }
    .heading{
        background-color:white;
        max-width:400px;
        width:70%;
        padding:5px;
        position:absolute;
        left:50%;
        top:50%;
        transform:translate(-50%,-50%);
        border-radius: 20px;      
    }
    td, th {
  padding: .7em;
  margin: 0;
  border: 1px solid #ccc;
  text-align: center;

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
  table-layout: fixed;
  text-align: center;
  position:absolute;
  left:50%;
  top:50%;
  transform:translate(-50%,-50%);
  overflow-y: scroll;
}
:root{
    --cor-primaria-success : #151E3D;
    --cor-secundadria-succes: ##00bcd2;
}
button{
    border:none;
    padding:10px;
    position: fixed; 
    left: 50%;
    bottom: 7%;
    transform: translate(-50%,-0%);
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
<?php
 include ('protect.php');

    $arquivo= 'cadastro.txt';
    $fp = fopen('cadastro.txt', 'r'); 
    $i=0;
    $contador=0;
    $nome =$_POST['busca'];
    $resultado= array();

    if($fp){
        if(!empty($nome) && !filter_var($nome,FILTER_VALIDATE_FLOAT)){
        while(!feof($fp)){
            
            $buffer= fgets($fp);
           
            if(strpos($buffer,$nome) !==false){
                $i=1;
            }
            if($i==1){
                $resultado[$contador]=$buffer;
                $contador++;

            }
            if($contador==5){
                echo "<table border == 3>
                <tr>
                <th><b>Nome</b></th>
                <th><b>Matricula</b></th>
                <th><b>Primeira Nota</b></th>
                <th><b>Segunda Nota</b></th>
                <th><b>Média</th>
                <tr/>
                <tr>
                <td>",$resultado[0], "</td>
                <td>",$resultado[1], "</td>
                <td>",$resultado[2], "</td>
                <td>",$resultado[3], "</td>
                <td>",$resultado[4], "</td>
                <tr/>
                ";
                $resultado = array_diff($resultado, $resultado);
                break;
            }

        }
        fclose($fp);
    }
            if($contador!=5){
                echo "<h1 class='heading'>Aluno não encontrado.</h1>";
            }
        }
            
    
?>
<a href='home.php'><button>Voltar ao home</button></a>
</body>
</html>