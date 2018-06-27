<?php

    require_once 'conexao.php';

    session_start();


    $selected = "";
    $botao = "Salvar";

    $rdoMasculino = "";
    $rdoFeminino = "";
    $usuario = "";
    $senha = "";
    $nome = "";
    $email = "";
    $telefone = "";
    $celular = "";


    //Salvando usuario 
    if(isset($_POST['btnSalvar'])){
        
        $nomeUsuario = $_POST['txtNomeUsuario'];
        $senha = $_POST['txtSenha'];
        $nome = $_POST['txtNome'];
        $email = $_POST['txtEmail'];
        $telefone = $_POST['txtTelefone'];
        $celular = $_POST['txtCelular'];
        $sexo = $_POST['rdoSexo'];
        $nivelUsuario = $_POST['txtNivel'];
        $status = 1;
        
        if($_POST['btnSalvar'] == "Salvar"){
            $sql = "INSERT INTO tbl_usuario (usuario, senha, nome, email, telefone, celular, sexo, idNivelUsuario, status) VALUES ('".$nomeUsuario."','".$senha."','".$nome."','".$email."','".$telefone."','".$celular."','".$sexo."',".$nivelUsuario.",".$status.")";
        }else if($_POST['btnSalvar'] == "Editar"){
            $sql = "UPDATE tbl_usuario SET 
            usuario='".$nomeUsuario."',
            senha='".$senha."',
            nome='".$nome."',
            email='".$email."',
            telefone='".$telefone."',
            celular='".$celular."',
            sexo='".$sexo."',
            idNivelUsuario='".$nivelUsuario."'WHERE id = ".$_SESSION['idSessao'];
            
        }
        
        
        mysqli_query($con,$sql);
        
       header('location:gerenciamento-usuarios.php');
        
        
    }

    //Progamação para excluir um registro

    if(isset($_GET['modo'])){
        $modo = $_GET['modo'];
        
        //Progamação para excluir o registro
        if($modo == "excluir"){
            $id = $_GET['id'];
            $sql = "DELETE FROM tbl_usuario WHERE id = ".$id;  
            mysqli_query($con,$sql);
            header('location:gerenciamento-usuarios.php');
            

        }else if($modo == "mudaStatus"){//Progamação pra ativar e desativar
            $id = $_GET['id'];
            $status = $_GET['status'];
            
            if($status == 1){
                $sql = "UPDATE tbl_usuario SET status = 0 WHERE id =".$id;
            }else if($status == 0){
                $sql = "UPDATE tbl_usuario SET status = 1 WHERE id =".$id;
            }
    
            mysqli_query($con,$sql);
            
        }else if($modo = "consultar"){
            
            $id = $_GET['id'];
            
            $_SESSION['idSessao'] = $id;
            
            $sql = "SELECT * FROM tbl_usuario WHERE id =".$id;
            
            $resultado = mysqli_query($con,$sql);
            
            if($rsUsuarios = mysqli_fetch_array($resultado)){
                $id = $rsUsuarios['id'];
                $usuario = $rsUsuarios['usuario'];
                $senha = $rsUsuarios['senha'];
                $nome = $rsUsuarios['nome'];
                $email = $rsUsuarios['email'];
                $telefone = $rsUsuarios['telefone'];
                $celular = $rsUsuarios['celular'];
                
                $sexo = $rsUsuarios['sexo'];
                
                if($sexo == "M"){
                    $rdoMasculino = "checked";
                }elseif($sexo == "F"){
                    $rdoFeminino = "checked";
                }                
                
                $nivelUsuario = $rsUsuarios['idNivelUsuario'];
        
                
                $botao = "Editar";
                
            }
        } 
        
    }

?>


<!DOCTYPE html>
<html>
<head>
    <title>CMS | Gerenciar Usuarios</title>
    <link rel="icon" href="imagens/icone.png" type="image/x-icon" />
    <link rel="shortcut icon" href="imagens/icone.png" type="image/x-icon"/>
    
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/gerencia-usuario.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    
    <script src="js/forms.js"></script>
    
</head>
<body>
    <div id="main">
        <?php require_once 'header.php'; ?>
        
        <div id="content">
            <div id="caixa-tabela" >
                <table id="tabela-titulos" >
                    <tr>
                        <td>
                            Nome
                        </td>
                         <td>
                            Celular
                        </td>
                         <td>
                            Email
                        </td>
                         <td>
                            Opções
                        </td>
                        
                    </tr>
                </table>
                    <div id="tabela-usuarios">
                        <?php
                            $sql = "SELECT * FROM tbl_usuario ORDER BY id DESC";
                            $resultado = mysqli_query($con,$sql);
                        
                            while($rsUsuarios = mysqli_fetch_array($resultado)){
              
                                if($rsUsuarios['status'] == 1 ){
                                    $statusFoto = "check.png";
                                }else{
                                    $statusFoto = "noCheck.png";
                                }
                        ?>
                        <div class="linha">
                            <div class="campo">
                                <?php echo($rsUsuarios['nome']);?>
                            </div>
                             <div class="campo">
                                <?php echo($rsUsuarios['celular']);?>
                            </div>
                             <div class="campo">
                               <?php echo($rsUsuarios['email']);?>
                            </div>
                             <div class="campo" style="text-align:center;">
                                 <a href="gerenciamento-usuarios.php?modo=excluir&id=<?php echo($rsUsuarios['id']);?>" onclick="return confirm('Deseja Realmente excluir')">
                                    <img src="imagens/gUsers/delete.png" class="foto-opcoes"> 
                                 </a>|
                                <a href="gerenciamento-usuarios.php?modo=consultar&id=<?php echo($rsUsuarios['id']);?>">
                                    <img src="imagens/gUsers/edit.png" class="foto-opcoes"> 
                                 </a>|
                                 <a href="gerenciamento-usuarios.php?modo=mudaStatus&id=<?php echo($rsUsuarios['id']);?>&status=<?php echo($rsUsuarios['status']);?>">
                                    <img src="imagens/gUsers/<?php echo($statusFoto);?>" class="foto-opcoes">
                                 </a>
                            </div>
                        
                        </div>
                        <?php
                            }
                        ?>
                        
                    </div>
                    
            </div>
            
            <form name="formUsuario" method="POST" action="gerenciamento-usuarios.php">
                <div class="caixa-inputs"><!--Nome completo-->
                    <div class="desc">Nome Completo:</div>
                        <input type="text" class="obj-input" value="<?php echo($nome)?>" name="txtNome" maxlength="50" id="nome" onkeypress="return validar(event,'number','nome')" required>
                </div>
                <div class="caixa-inputs"><!--Telefone-->
                    <div class="desc">Telefone:</div>
                        <input type="tel" class="obj-input" value="<?php echo($telefone)?>" name="txtTelefone" maxlength="14" id="telefone" onkeypress="mascaraFone(this); return validar(event,'caracter','telefone')">
                </div>
                <div class="caixa-inputs"><!--Celular-->
                    <div class="desc">Celular:</div>
                        <input type="tel" class="obj-input" name="txtCelular" value="<?php echo($celular)?>"
                               maxlength="15" id="celular" onkeypress="mascaraCelular(this); return validar(event,'caracter','celular')" required>
                </div>
                <div class="caixa-inputs"><!--Email-->
                    <div class="desc">Email:</div>
                        <input type="email" class="obj-input" value="<?php echo($email)?>" name="txtEmail" maxlength="50" required>
                </div>
                <div class="caixa-inputs"><!--Usuario-->
                    <div class="desc">Nome de Usuário:</div>
                        <input type="text" class="obj-input" value="<?php echo($usuario)?>" name="txtNomeUsuario" maxlength="20" required>
                </div>
                <div class="caixa-inputs"><!--Senha-->
                    <div class="desc">Senha:</div>
                        <input type="password" class="obj-input" name="txtSenha" value="<?php echo($senha)?>"
                               maxlength="50" required>
                </div>
                <div class="caixa-inputs"><!--Sexo-->
                    <div class="desc">Sexo:</div>
                        <div class="obj-input">
                            <input type="radio" <?php echo($rdoMasculino);?> value="M" name="rdoSexo" id="masc"><label for="masc">Masculino</label>
                            <input type="radio" <?php echo($rdoFeminino);?> value="F" name="rdoSexo" id="fem"><label for="fem">Feminino</label>
                        </div>
                </div>
                <div class="caixa-inputs"><!--Nivel de Usuario-->
                    <div class="desc">Nível de Usuário:</div>
                        <div class="obj-input">
                            <select id="select-nivel" name="txtNivel">
                            <?php
                                $sql = "SELECT * FROM tbl_nivel_usuario WHERE status = 1";
                                
                                $resultado = mysqli_query($con,$sql);
                            
                                while($rsNiveis = mysqli_fetch_array($resultado)){
                                    
                                if($rsNiveis['id'] == $nivelUsuario && $modo=="consultar"){//Codigo pra setar o selected no option
                                    $selected = "selected";
                                }else{
                                    $selected = "";
                                }
                                    
                            ?>
                                <option <?php echo($selected);?> value="<?php echo($rsNiveis['id']);?>"><?php echo($rsNiveis['nomeNivel']);?></option>
                                
                            <?php
                                }
                            ?>
                            </select>
                        </div>
                </div>
                <input type="submit" id="botao-salvar" value="<?=$botao?>" name="btnSalvar">
                <input type="reset" id="botao-limpar" value="Limpar">
            </form>
            
            
        </div>
        
        <footer>
            Desenvolvido por: Gustavo dos Santos
        </footer>
    </div>
</body> 
</html>