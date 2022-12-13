
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscando Aluno</title>
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
<form method='POST' action='busca.php'>
    <p>
    <label> INSIRA O NOME COMPLETO DO ALUNO</label><br><br>
    <input type='text' name='busca' placeholder='Diferencie letras maiusculas e minusculas'>
    </p>
    <br>
    <p>
    <input type='submit' name='envio' value='Buscar' >
    </p>
</form> 
    <a href='home.php'><button>Voltar ao home</button></a>
</body>
</html>