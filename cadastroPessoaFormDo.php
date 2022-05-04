<?php include_once 'conexao.php';

$nome = $_POST["nome"];
$idade = $_POST["idade"];
$email = $_POST["email"];
$celular = $_POST["celular"];
$sexo = $_POST["sexo"];
$modo = $_POST["modo"];
$id_pessoa = $_POST["id"];


if($sexo == 'mas'){
    $sexo = 1;
}else{
    $sexo = 0;
}

if($modo == "inserir"){

    $query = "INSERT INTO `pessoa` ( `nome`, `idade`, `email`, `celular`, `sexo`) VALUES ('$nome', $idade, '$email', '$celular', $sexo)";

    if(mysqli_query($conexao, $query)){
        echo "Dados inserido com sucesso!";
        echo "$modo";
    }else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conexao);
    }
}elseif($modo == "editar"){
    
    $query = "UPDATE `pessoa` SET `id_pessoa`=$id_pessoa,`nome`='$nome',`idade`=$idade,`email`='$email',`celular`='$celular',`sexo`=$sexo WHERE `id_pessoa` = $id_pessoa";

    if(mysqli_query($conexao, $query)){
        echo "Dados atualizados com sucesso!";
    }else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conexao);
    }
}
header("location:listarIndex.php");
?>