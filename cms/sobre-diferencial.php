<?php
 require_once 'conexao.php';

    session_start();

    $botao = "Salvar";
    $tituloSessao = "";
    $titulo1 = "";
    $texto1 = "";
    $titulo2 = "";
    $texto2 = "";
    $titulo3 ="" ;
    $texto3 = "";

    if(isset($_POST['btnSalvar'])){
        $tituloSessao = $_POST['txtTituloSessao'];
        
        $titulo1 = $_POST['txtTitulo1'];
        $texto1 = $_POST['txtTexto1'];
        
        $titulo2 = $_POST['txtTitulo2'];
        $texto2 = $_POST['txtTexto2'];
        
        $titulo3 = $_POST['txtTitulo3'];
        $texto3 = $_POST['txtTexto3'];
        
        $idSobre = 1;
        $status = 1;
        
        if($_POST['btnSalvar'] == "Salvar"){
            $sql = "insert into tbl_sobre_diferencial (idSobre, tituloSessao, titulo1, texto1, titulo2, texto2, titulo3, texto3, status) values(".$idSobre.",'".$tituloSessao."','".$titulo1."','".$texto1."','".$titulo2."','".$texto2."','".$titulo3."','".$texto3."',".$status.")";
        }else if($_POST['btnSalvar'] == "Editar"){
            $sql = "update tbl_sobre_diferencial SET 
            tituloSessao = '".$tituloSessao."', 
            titulo1 = '".$titulo1."',
            titulo2 = '".$titulo2."',
            titulo3 = '".$titulo3."',
            texto1 = '".$texto1."',
            texto2 = '".$texto2."',
            texto3 = '".$texto3."'
            where id =
            ".$_SESSION['idSessao'];
        }
        
        
        
        mysqli_query($con, $sql);
        header("location:sobre-diferencial.php");
    }

    if(isset($_GET['modo'])){
        $modo = $_GET['modo'];
        
        if($modo == "excluir"){
            $id = $_GET['id'];
            $sql = "DELETE FROM tbl_sobre_diferencial where id=".$id;
            
            mysqli_query($con, $sql);
            
            header('location:sobre-diferencial.php');
            
        }else if($modo == "mudaStatus"){
            $id = $_GET['id'];
            $status = $_GET['status'];
            if($status == 1){
                $sql = "UPDATE tbl_sobre_diferencial SET status = 0 where id=".$id;
            }else{
                $sql = "UPDATE tbl_sobre_diferencial SET status = 1 where id=".$id;
            }
            mysqli_query($con, $sql);
            
        }else if($modo == "consultar"){
            $id = $_GET['id'];
            $_SESSION['idSessao'] = $id;
            
            $sql = "SELECT * FROM tbl_sobre_diferencial WHERE id=".$id;
            
            $res = mysqli_query($con, $sql);
            
            while($rsDados = mysqli_fetch_array($res)){
                $id = $rsDados['id'];
                $tituloSessao = $rsDados['tituloSessao'];
        
                $titulo1 = $rsDados['titulo1'];
                $texto1 = $rsDados['texto1'];

                $titulo2 = $rsDados['titulo2'];
                $texto2 = $rsDados['texto2'];

                $titulo3 = $rsDados['titulo3'];
                $texto3 = $rsDados['texto3'];
            }
            
            $botao = "Editar";
        }
    }

?>


<!DOCTYPE html>
<html>
<head>
    <title>CMS | Nosso Diferencial</title>
    <link rel="icon" href="imagens/icone.png" type="image/x-icon" />
    <link rel="shortcut icon" href="imagens/icone.png" type="image/x-icon"/>
    
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/diferencial.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    
</head>
<body>
    <div id="main">
        <?php require_once 'header.php';?> 
        
        
        <div id="content">
            <form name="frmCadastro" method="post" action="sobre-diferencial.php">
                <div id="caixa-titulo-sessao"><!--Aqui ficara o gerenciamento dos textos da sessao diferencial-->
                    <div class="desc">Titulo da sessão</div>
                    <input id="titulo-sessao" type="text" name="txtTituloSessao" value="<?php echo($tituloSessao);?>" required maxlength="20">
                </div>
                
                <div id="caixa-conteudo-textos">
                    <div class="box-texto"><!--Texto 01-->
                        <div class="desc">Titulo 01</div>
                        <input class="titulo-texto" type="text" name="txtTitulo1" value="<?php echo($titulo1);?>" required maxlength="20">
                        <textarea name="txtTexto1" maxlength="230"><?php echo($texto1);?></textarea>
                    </div>
                    <div class="box-texto"><!--Texto 02-->
                        <div class="desc">Titulo 02</div>
                        <input class="titulo-texto" type="text" name="txtTitulo2" value="<?php echo($titulo2);?>" required maxlength="20">
                        <textarea name="txtTexto2" maxlength="230"><?php echo($texto2);?></textarea>
                    </div>
                    
                    <div class="box-texto"><!--Texto 03-->
                        <div class="desc">Titulo 03</div>
                        <input class="titulo-texto" type="text" name="txtTitulo3" value="<?php echo($titulo3);?>" required maxlength="20">
                        <textarea name="txtTexto3" maxlength="230"><?php echo($texto3);?></textarea>
                    </div>
                    
                </div>
                <input type="reset" id="botao-limpar" value="Limpar">
                <input type="submit" id="botao-salvar" name="btnSalvar" value="<?php echo($botao);?>">
                
            </form>
            
            <div id="caixa-tabela"><!--Tabela dos dados da sessão-->
                <table id="tabela-titulos">
                    <tr>
                        <td>Texto 1</td>
                        <td>Texto 2</td>
                        <td>Texto 3</td>
                        <td>Opçoes</td>
                    </tr>
                </table>
                
                <div id="tabela-dados">
                    <?php
                        $sql = "SELECT * FROM tbl_sobre_diferencial order by id desc";
                        $res = mysqli_query($con, $sql);
                    
                    while($rsDados = mysqli_fetch_array($res)){
                        $status = $rsDados['status'];
                        
                        if($status == 1){
                            $fotoStatus = "check.png";
                        }else{
                            $fotoStatus = "noCheck.png";
                        }
                    ?>
                    <div class="linha">
                            <div class="campo">
                                <?php echo($rsDados['texto1']);?>
                            </div>
                             <div class="campo">
                                 <?php echo($rsDados['texto2']);?>
                            </div>
                            <div class="campo">
                                <?php echo($rsDados['texto3']);?>
                            </div>
                             <div class="campo" style="text-align:center;">
                                 <a href="sobre-diferencial.php?modo=excluir&id=<?php echo($rsDados['id']);?>" onclick="return confirm('Deseja Realmente excluir?')">
                                    <img src="imagens/gUsers/delete.png" class="foto-opcoes"> 
                                 </a>
                                <a href="sobre-diferencial.php?modo=consultar&id=<?php echo($rsDados['id']);?>">
                                    <img src="imagens/gUsers/edit.png" class="foto-opcoes"> 
                                 </a>
                                 <a href="sobre-diferencial.php?modo=mudaStatus&id=<?php echo($rsDados['id']);?>&status=<?php echo($rsDados['status']);?>">
                                     <img src="imagens/gUsers/<?php echo($fotoStatus);?>" class="foto-opcoes">
                                 </a>
                            </div>
                        
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            
        </div>
        
        <footer>
            Desenvolvido por: Gustavo dos Santos
        </footer>
    </div>
</body> 
</html>