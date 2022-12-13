<?php include ('protect.php');
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<style>
    *{margin:0;padding:0;box-sizing: border-box;} 
    body{
    height:100vh;
    background-color: #151E3D;
    background-image: url('fotocadastro.jpeg');
    background-repeat: no-repeat;
    background-position: center top;
    background-size: 100% 100%;
}
form{
    background-color:white;
    max-width:400px;
    width:70%;
    padding:20px;
    position:absolute;
    left:50%;
    top:50%;
    transform:translate(-50%,-50%);
    border-radius: 20px;
}

form h2{
    text-align: center;
    color:#151E3D;
    font-family:'Times New Roman', Times, serif

}
form input[type=number],
form input[type=text],
form input[type=float]{
    width:100%;
    height:40px;
    border:1px solid #ccc;
    padding-left: 10px;
}
form input[type=submit]{
    width:100%;
    height:40px;
    cursor: pointer;
    background: #151E3D;
    color:white;
    border:0;
    border-radius: 20px;
    transition: background-color .3s;
}
form input[type=submit]:hover{
    background-color:#00bcd2;
}  
:root{
    --cor-primaria-success : #151E3D;
    --cor-secundadria-succes: ##00bcd2;
}
button{
    border:none;
    padding:10px;
    position: absolute; 
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

<form method='POST' action=''>
    <h2>Preencha o  cadastro</h2>  
<?php
    $dados =  filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if (!empty($dados['envio'])){
        // var_dump($dados);
      
        $dados= array_map('trim', $dados);
        if(in_array("", $dados)){
            echo "<p style='color: #f00;'>Preencha todos os dados</p>";
        }
        else{
            $primeiranota= (int) $dados['n1'];
            $segundanota= (int) $dados['n2'];

            if($primeiranota==0 || $segundanota==0){
                $arquivo= 'cadastro.txt';
                $fp = fopen('cadastro.txt', 'r'); 
                $i=0;
                $contador=0;
                $matricula = $dados['matricula'];
            
                if($fp){
                    while(!feof($fp)){
                        
                        $nm= fgets($fp);
                        $mt= fgets($fp);
                        $pn= fgets($fp);
                        $sn= fgets($fp);
                        $med= fgets($fp);
                        $mtint= (int) $mt;

                       
                        if($dados['matricula']==$mtint){
                            $i=1;
                        }
                }
                fclose($fp);
                }
                if($i==0){
                if(filter_var($dados['n1'], FILTER_VALIDATE_FLOAT) && filter_var($dados['n2'], FILTER_VALIDATE_FLOAT)){
                   
                $aluno= $dados['nome'];
                $matriculadoaluno= $dados['matricula'];
                $primeiranota = $dados['n1'];
                $segundanota = $dados['n2'];
                $media=($dados['n1']+$dados['n2'])/2;

                $cadastro= 'cadastro.txt';
                $cadastroaberto= fopen('cadastro.txt', 'a+');
                $tamanhodocadastro= filesize('cadastro.txt');
                $verificacao=0;
        
                fwrite($cadastroaberto, "$aluno\r\n $matriculadoaluno\r\n $primeiranota\r\n $segundanota\r\n $media\r\n");
                fclose($cadastroaberto);
                unset($dados);
                echo "<p style='color: #32CD32;'>Aluno cadastrado com sucesso!</p>";
                }else{
                    echo"<p style='color: #f00;'>Digite as notas corretamente</p>";
                }
            }else{
                echo "<p style='color: #f00;'>Matricula ja existente</p>";
            }

            }
        }
    }  
?>    
    
    
    <?php
    $nome= "";
    if(isset($dados['nome'])){
        $nome= $dados['nome'];
    }
    ?>
    <p>
    <label> Nome:</label>
    <input type='text' name='nome' placeholder='Nome completo' value="<?php echo $nome; ?>">
    </p>

    <?php
    $matricula= "";
    if(isset($dados['matricula'])){
        $matricula= $dados['matricula'];
    }
    ?>

    <p>
    <label> Matrícula:</label>
    <input type='number' name='matricula' placeholder='Preencha a matricula' value="<?php echo $matricula; ?>">
    </p>

    <?php

    $n1= "";
    if(isset($dados['n1'])){
        $n1= $dados['n1'];
    }
    ?>
    <p>
    <label> Primeira nota:</label>
    <input type='float' name='n1' placeholder='Digite a primeira nota' value="<?php echo $n1; ?>">
    </p>

    <?php
        $n2= "";
        if(isset($dados['n2'])){
            $n2= $dados['n2'];
        }
    ?>

    <p>
    <label> Segunda nota:</label>
    <input type='float' name='n2' placeholder='Digite a segunda nota' value="<?php echo $n2; ?>">
    </p>
    <br>
    <p>
    <input type='submit' name='envio' value='Cadastrar' >
    </p>
  
</form>
<a href='home.php'><button>Voltar ao home</button></a>
    
</body>
</html>