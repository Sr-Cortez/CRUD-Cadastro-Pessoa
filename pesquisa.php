<?php
require_once('conexao.php');

$nome = $_POST['nome'];

if($nome){
    $sql = "SELECT * FROM pessoa WHERE nome LIKE '%$nome%' ";
    $rs = mysqli_query( $conexao, $sql);

    if (mysqli_num_rows($rs) > 0){
        $conteudo = "<table class='table'>";
            $conteudo .= "<tr class='thead'>";
                $conteudo .= "<th>Id</th>";
                $conteudo .= "<th>Nome</th>";
                $conteudo .= "<th>Idade</th>";
                $conteudo .= "<th>E-mail</th>";
                $conteudo .= "<th>Celular</th>";
                $conteudo .= "<th>Sexo</th>";
                $conteudo .= "<th>Acao</th>";
            $conteudo .= "</tr>";
            while ($row =  mysqli_fetch_assoc($rs)){
                $id = $row['id_pessoa'];
                $nome = $row['nome'];
                $idade = $row['idade'];
                $email = $row['email'];
                $celular = $row['celular'];
                $genero = $row['sexo'];
                
                if($genero == "1"){
                    $genero = "Masculino";
                }else{
                    $genero = "Feminino";
                }

                $conteudo .= "<tr>";
                    $conteudo .= "<td>$id</td>";
                    $conteudo .= "<td>$nome</td>";
                    $conteudo .= "<td>$idade</td>";
                    $conteudo .= "<td>$email</td>";
                    $conteudo .= "<td>$celular</td>";
                    $conteudo .= "<td>$genero</td>";
                    $conteudo .= "<td><a href='cadastroPessoaForm.php?id_pessoa=$id'><img src='image/ico-editar.png' alt='botão editar' width='25' height='25' /></ a>
                                <a href='deletarPessoa.php?id_pessoa=$id'><img src='image/ico-excluir.png' alt='botão excluir' width='25' height='25'/></ a></td>";
                $conteudo .= "</tr>";
            }
            // echo $conteudo.
            $conteudo .= "<tr class='footer'>";
                $conteudo .= "<th colspan='7'>Foram encontrado um total de " . mysqli_num_rows($rs) . " registros.</th>";
            $conteudo .= "</tr>";
        $conteudo .= "</table>";

        echo $conteudo;
    }
    
}else {
    $sql = 'SELECT * FROM pessoa';
    $rs = mysqli_query($conexao, $sql);
    if(mysqli_num_rows($rs) < 0){
        $conteudo = "<p>Não ha pessoas cadastradas, cadastra-se no botão acima!</p>";
    }else {
        $conteudo = "<table class='table'>";
            $conteudo .= "<tr class='table'>";
                $conteudo .= "<th>Id</th>";
                $conteudo .= "<th>Nome</th>";
                $conteudo .= "<th>Idade</th>";
                $conteudo .= "<th>E-mail</th>";
                $conteudo .= "<th>Celular</th>";
                $conteudo .= "<th>Sexo</th>";
                $conteudo .= "<th>Acão</th>";
            $conteudo .= "</tr>";
            while ($row = mysqli_fetch_assoc($rs)){
                $id = $row['id_pessoa'];
                $nome = $row['nome'];
                $idade = $row['idade'];
                $email = $row['email'];
                $celular = $row['celular'];
                $genero = $row['sexo'];
                
                if($genero == "1"){
                    $genero = "Masculino";
                }else{
                    $genero = "Feminino";
                }
                
                $conteudo .= "<tr>";
                    $conteudo .= "<td>$id</td>";
                    $conteudo .= "<td>$nome</td>";
                    $conteudo .= "<td>$idade</td>";
                    $conteudo .= "<td>$email</td>";
                    $conteudo .= "<td>$celular</td>";
                    $conteudo .= "<td>$genero</td>";
                    $conteudo .= "<td><a href='cadastroPessoaForm.php?id_pessoa=$id'><img src='image/ico-editar.png' alt='botão editar' width='25' height='25' /></ a>
                    <a href='deletarPessoa.php?id_pessoa=$id'><img src='image/ico-excluir.png' alt='botão excluir' width='25' height='25'/></ a></td>";
                $conteudo .= "</tr>";
            }
            $conteudo .= "<tr class='footer'>";
                $conteudo .= "<th colspan='7'>Foram encontrado um total de " . mysqli_num_rows($rs) . " registros.</th>";
            $conteudo .= "</tr>";
        $conteudo .= "</table>";
    }
    
    echo $conteudo;
}
die();

?>