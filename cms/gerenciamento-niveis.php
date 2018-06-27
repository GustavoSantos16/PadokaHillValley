<?php

    require_once 'conexao.php';

    session_start();
    
    
    $nomeNivel ="";
    $descricao = "";
    $botao = "Salvar";

    if(isset($_POST['btnSalvar'])){
        $nomeNivel = $_POST['txtNomeNivel'];
        $descricao = $_POST['txtDescricao'];
        $status = 1;
        
        if($_POST['btnSalvar'] == "Salvar"){
            $sql = "INSERT INTO tbl_nivel_usuario(nomeNivel, descricao, status) VALUES(
        '".$nomeNivel."','".$descricao."',".$status.")";
            
        }else if($_POST['btnSalvar'] == "Editar"){
            $sql = "UPDATE tbl_nivel_usuario SET nomeNivel='".$nomeNivel."', descricao='".$descricao."' WHERE id=".$_SESSION['idSessao'];
        }
        
        
        mysqli_query($con, $sql);
        
        header('location:gerenciamento-niveis.php');
        
        
    }

    if(isset($_GET['modo'])){
        $modo = $_GET['modo'];
        if($modo == "excluir"){
            
            $id = $_GET['id'];
            $sql = "DELETE FROM tbl_nivel_usuario WHERE id=".$id;
            
            mysqli_query($con, $sql);
        
            header('location:gerenciamento-niveis.php');
        }else if($modo == "mudaStatus"){
            $id = $_GET['id'];
            $status = $_GET['status'];
            
            if($status == 1){
                $sql = "UPDATE tbl_nivel_usuario SET status = 0 WHERE id =".$id;
            }else if($status == 0){
                $sql = "UPDATE tbl_nivel_usuario SET status = 1 WHERE id =".$id;
            }
    
            mysqli_query($con,$sql);
        }else if($modo == "consultar"){
            $id = $_GET['id'];
            $_SESSION['idSessao'] = $id;
            
            $sql = "SELECT * FROM tbl_nivel_usuario WHERE id=".$id;
            
            $resultado = mysqli_query($con, $sql);
            
            while($rsNiveis = mysqli_fetch_array($resultado)){
                $id = $rsNiveis['id'];
                $nomeNivel = $rsNiveis['nomeNivel'];
                $descricao = $rsNiveis['descricao'];
            }
            $botao = "Editar";
        }       
        
    }


?>


<!DOCTYPE html>
<html>
<head>
    <title>CMS | Gerenciar Níveis</title>
    <link rel="icon" href="imagens/icone.png" type="image/x-icon" />
    <link rel="shortcut icon" href="imagens/icone.png" type="image/x-icon"/>
    
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/gerencia-niveis.css">
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
                            Nome Nivel
                        </td>
                         <td>
                            Descrição
                        </td>
                         <td>
                            Opções
                        </td>
                        
                    </tr>
                </table>
                    <div id="tabela-niveis">
                        <?php
                            $sql = "SELECT * FROM tbl_nivel_usuario ORDER BY id ASC";
                        
                            $resultado = mysqli_query($con, $sql);
                        
                        while($rsNiveis = mysqli_fetch_array($resultado)){
                            
                            if($rsNiveis['status'] == 1){
                                $statusFoto = "check.png";
                            }else{
                                $statusFoto = "noCheck.png";
                            }
                            
                        ?>
                        
                        <div class="linha">
                             <div class="campo">
                                <?php echo($rsNiveis['nomeNivel']);?>
                            </div>
                             <div class="campo">
                                <?php echo($rsNiveis['descricao']);?>
                            </div>
                             <div class="campo" style="text-align:center;">
                                 <a href="gerenciamento-niveis.php?modo=excluir&id=<?php echo($rsNiveis['id']);?>" onclick="return confirm('Deseja Realmente excluir')">
                                    <img src="imagens/gUsers/delete.png" class="foto-opcoes"> 
                                 </a>|
                                <a href="gerenciamento-niveis.php?modo=consultar&id=<?php echo($rsNiveis['id']);?>">
                                    <img src="imagens/gUsers/edit.png" class="foto-opcoes"> 
                                 </a>|
                                 <a href="gerenciamento-niveis.php?modo=mudaStatus&id=<?php echo($rsNiveis['id']);?>&status=<?php echo($rsNiveis['status']);?>">
                                    <img src="imagens/gUsers/<?php echo($statusFoto);?>" class="foto-opcoes">
                                 </a>
                            </div>
                        
                        </div>
                        <?php
                        }
                        ?>
                        
                    </div>                    
            </div>
            
            <form action="gerenciamento-niveis.php" method="POST" name="frmNiveis">
                <div class="caixa-inputs"><!--Nome  do nivel completo-->
                    <div class="desc">Nome do Nível:</div>
                        <input type="text" class="obj-input" name="txtNomeNivel" maxlength="50" id="nome" value="<?php echo($nomeNivel);?>" required>
                </div> 
                <div class="caixa-inputs"><!--Descriçao-->
                    <div class="desc">Descrição:</div>
                        <textarea name="txtDescricao"><?php echo($descricao);?></textarea>
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