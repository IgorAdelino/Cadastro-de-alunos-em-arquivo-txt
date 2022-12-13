<?php 
    include 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<style>
    *{margin:0;padding:0;box-sizing: border-box;}
body{
    height:100vh;
    background-color: #151E3D;
    background-image: url('faculdade.jpg');
    background-repeat: no-repeat;
    background-position: center top;
    background-size: 100% 100%;
}
form{
    background-color:white;
    max-width:500px;
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
form input[type=password],
form input[type=text]{
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

</style>

<body>
<form method='post'>
    <h2>UNIPB Login</h2>
    <p>
    <label> E-mail </label>
    <input type='text' name='email' placeholder='digite seu e-mail'>
    </p>
    <p>
    <label> Senha </label>
    <input type='password' name='senha' placeholder='digite sua senha'>
    </p>
    <br>
    <p>
    <input type='submit' name='acao' value='Acessar'>
    </p>
    <?php
    if(isset($_POST['email']) || isset($_POST['senha'])){

if(strlen($_POST['email'])==0){
    echo "Preencha seu email";
}else if(strlen($_POST['senha'])==0){
    echo "Preencha sua senha";
}else{
    $email= $mysqli->real_escape_string($_POST['email']);
    $senha= $mysqli->real_escape_string($_POST['senha']);

    $sql_code= "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: ". $mysqli->error);

    $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {

        $usuario = $sql_query->fetch_assoc();
        
            if(!isset($_SESSION)){
                session_start();
            }

            $_SESSION['id'] =  $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: home.php");

        } 
        
        else {
            echo "<p style='color: #f00;'>Falha ao logar! Email ou senha incorretos</p>";
        }
}
}
?>
</form>


</body>
</html>