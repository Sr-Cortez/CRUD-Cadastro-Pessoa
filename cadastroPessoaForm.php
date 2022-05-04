<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pessoa</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <div class="container">
            <header class="header">
                <div class="image"> 
                    <img src="image/img-header.png" alt="">
                </div>
                <div class="titulo">
                    <h1>Cadastro de Pessoas</h1>
                </div>
            </header>   
            <form method="POST" action="cadastroPessoaFormDo.php" class="form">
                
                <?php
                    include 'conexao.php';

                    $id_pessoa = $_GET["id_pessoa"];
                    
                    if(!is_null($id_pessoa)){

                        $modo="editar";

                        $sql = "SELECT id_pessoa, nome, idade, email, celular , sexo FROM pessoa WHERE id_pessoa = $id_pessoa";
                        $busca = mysqli_query($conexao,$sql); 
                        $array = mysqli_fetch_array($busca);
                        
                        $id_pessoa = $array['id_pessoa'];
                        $nome = $array['nome'];
                        $idade = $array['idade'];
                        $email = $array['email'];
                        $celular = $array['celular'];
                        $sexo = $array['sexo'];
                        
                        if($sexo == 1){
                            $masc='checked';
                        }else{
                            $fem='checked';
                        }

                    }else{
                        $modo = "inserir";
                    }



                ?>
                <div class="campo">
                    <div>
                        <label for="nome"><strong>Nome</strong></label>
                        <input type="text" value="<?php echo $nome ?>" name="nome" id="nome"  placeholder="informe seu nome">
                    </div>
                    <div>
                        <label for="idade"><strong>Idade</strong></label>
                        <input type="number" value="<?php echo $idade ?>" name="idade" id="idade" placeholder="Informe sua idade">
                    </div>
                </div>
                <div class="campo">
                    <div>
                        <label for="email"><strong>E-mail</strong></label>
                        <input type="email" value="<?php echo $email?>" name="email" id="email" placeholder="Informe seu e-mail">
                    </div>
                    <div>
                        <label for="Celular"><strong>Celular</strong></label>
                        <input type="tel" value="<?php echo $celular ?>" name="celular" id="celular" maxlength="11" placeholder="Informe seu celular">
                    </div>
                </div>
                <p><strong>Sexo</strong></br></p>
                <div class="sexo">
                    <div class="sexo">
                        <input type="radio" <?php echo $masc;?> name="sexo" value="mas">
                        <label ></label>Masculino</label>
                    </div>
                    <div class="sexo">
                        <input type="radio" <?php echo $fem;?> name="sexo" value="fen">
                        <label >Feminino</label>
                    </div>
                </div>
                <input type="hidden" name="modo" value="<?php echo $modo; ?>"/>
                <input type="hidden" name="id" value="<?php echo $id_pessoa; ?>"/>
                <input type="submit" class="btn" value="Cadastrar">
            </form>

    </div>
</body>
</html>