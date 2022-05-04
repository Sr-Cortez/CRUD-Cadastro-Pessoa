<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Listar Pessoas</title>
</head>
<body>
    <header class="header-listagem">
        <div class="image"> 
            <img src="image/img-header.png" alt="">
        </div>
        <div class="titulo">
            <h1>Listagem de Pessoas</h1>
        </div>
    </header> 
    <!-- <div class="header">
        <img src="image/img-header.png" alt="Perfil homem">
        <h2>Listagem de Pessoas</h2>
    </div> -->
    <div class="container-tabela">

        <div class="btn-novo-cadastro">
            <a href="cadastroPessoaForm.php">Novo Cadastro</a>
        </div>
        
        <div class="filtroPessoa">
            <label for="filtro"><b>Pesquisar por nome</b></label>
            <input type="text" name="filtro" id="filtro">
        </div>
        
        <div id="tabelaPessoa"></div>
        
        <?php 
        require_once("conexao.php");
        session_start();
        
        echo ($_SESSION['alert'] ? $_SESSION['alert'] : '');
        unset($_SESSION['alert']);
        ?>
    </div>
</body>
</html>

<script>

let filtroNome = document.getElementById("filtro")

window.onload = ajax()
filtroNome.addEventListener("keyup", ajax)

function ajax(){
    $.ajax({
        method: 'POST',
        url: 'pesquisa.php',
        data: {
            nome: filtroNome.value, 
        } 
    })
    .done(function(data){
        $("#tabelaPessoa").html(data);
    })
}

</script>