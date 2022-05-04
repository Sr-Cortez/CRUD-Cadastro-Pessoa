<link href="style.css" rel="stylesheet">
<?php
	include 'conexao.php';

$id_pessoa = $_GET['id_pessoa'];

$sql = "DELETE FROM `pessoa` WHERE id_pessoa = '$id_pessoa'";

$deletar = mysqli_query($conexao,$sql)

?>

<div style="width: 500px;margin: 20px auto; text-align: center;">
    
    <h1>Deletado com Sucesso!</h1>
    <div class="btn-novo-cadastro">
        <a id="voltar" href="listarIndex.php">Voltar</a>
    </div>
</div>