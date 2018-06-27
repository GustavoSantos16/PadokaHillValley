<?php
 require_once 'conexao.php';

    session_start();

    $botao = "Salvar";
    $txtTitulo = "";
    $txtTexto = "";
    $txtFoto01 = "";
    $txtFoto02 = "";
    
    if(isset($_POST['txtTitulo'])){
        $txtTitulo = $_POST['txtTitulo'];
        $txtTexto = $_POST['txtTexto'];
        $txtFoto01 = $_POST['txtFoto1'];
        $txtFoto02 = $_POST['txtFoto2'];
        $idSobre = 1;
        $status = 1;
        
       //TODO: NÂo consigo editar essa bosta
        
        
             if($_POST['btnSalvar'] == "Salvar"){
                $sql = "INSERT INTO tbl_sobre_padoka(idSobre, titulo, imagem01, imagem02, texto, status)
                VALUES(".$idSobre.",'".$txtTitulo."','".$txtFoto01."','".$txtFoto02."','".$txtTexto."',".$status.")";
            }else if($_POST['btnSalvar'] == "Editar"){
                    $sql = "UPDATE tbl_sobre_padoka SET titulo = '".$txtTitulo."',
                    imagem01 = '".$txtFoto01."',
                    imagem02 = '".$txtFoto02."',
                    texto = '".$txtTexto."' WHERE id=".$_SESSION['idSessao'];
                }
        
        
       
    
        mysqli_query($con,$sql);
        
        header('location:sobre-padoka.php');

    }

        if(isset($_GET['modo'])){
            
            $modo = $_GET['modo'];
            
            if($modo == "excluir"){
                $id = $_GET['id'];
                $sql = "DELETE FROM tbl_sobre_padoka WHERE id=".$id;
                
                mysqli_query($con, $sql);
                
               header('location:sobre-padoka.php');
                
            }else if($modo == "mudaStatus"){
                $status = $_GET['status'];
                $id = $_GET['id'];
                if($status == 1){
                    $sql = "UPDATE tbl_sobre_padoka SET status = 0 WHERE id=".$id;
                }else{
                    $sql = "UPDATE tbl_sobre_padoka SET status = 1 WHERE id=".$id;
                }
                
                mysqli_query($con,$sql);
            }else if($modo == "consultar"){
                $id = $_GET['id'];
                $_SESSION['idSessao'] = $id;
                
                $sql = "SELECT * FROM tbl_sobre_padoka WHERE id=".$id;
                
                $resultado = mysqli_query($con, $sql);
            
                while($rsDados = mysqli_fetch_array($resultado)){
                    $id = $rsDados['id'];
                    $txtTitulo = $rsDados['titulo'];
                    $txtTexto = $rsDados['texto'];
                    $txtFoto01 = $rsDados['imagem01'];
                    $txtFoto02 = $rsDados['imagem02'];
                    
                }
                $botao = "Editar";
                
              
                
            }
        }
?>


<!DOCTYPE html>
<html>
<head>
    <title>CMS | Sobre a Padoka</title>
    <link rel="icon" href="imagens/icone.png" type="image/x-icon" />
    <link rel="shortcut icon" href="imagens/icone.png" type="image/x-icon"/>
    
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/sobre-padoka.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.form.js"></script>
    
    <script>
        $(document).ready(function(){
            //Imagem01
            $('#foto1').live('change',function(){
                $('#caixa-foto1').html('<img src=imagens/ajax-loader.gif>');//Gif
                setTimeout(function(){
                    $('#frmFoto1').ajaxForm({
                        
                        target:'#caixa-foto1'
                        
                    }).submit();
                },2000);
            });
            
            //Imagem02
            $('#foto2').live('change',function(){
                $('#caixa-foto2').html('<img src=imagens/ajax-loader.gif>');//Gif
                setTimeout(function(){
                    $('#frmFoto2').ajaxForm({
                        
                        target:'#caixa-foto2'
                        
                    }).submit();
                },2000);
            });
            
            $('#botao-salvar').click(function(){
                $('#caixa-foto1').html('<img src=imagens/ajax-salvando.gif>');
                
                $('#caixa-foto2').html('<img src=imagens/ajax-salvando.gif>');
                
                setTimeout(function(){
                    //$('#frmCadastro').submit();
                    
                },2000);
                
            });
        });
    </script>
    
</head>
<body>
    <div id="main">
        <?php require_once 'header.php';?> 
        
        
        <div id="content">
            
            <div id="conteudo-sessao">

                <div id="caixa-titulo-sessao">
                    
                    <form name="frmCadastro" id="frmCadastro" method="POST">
                        <div class="desc">Titulo Da Sessão:</div>
                        <input id="titulo-sessao" type="text" name="txtTitulo" value="<?php echo($txtTitulo);?>" required>
                        <div class="desc">Texto Sobre:</div>
                        <textarea id="textarea-texto" maxlength="330" name="txtTexto" required><?php echo($txtTexto);?></textarea>
                        
                        <input type="hidden" name="txtFoto1" value="<?php echo($txtFoto01);?>">
                        <input type="hidden" name="txtFoto2" value="<?php echo($txtFoto02);?>">
                        
                        
                            <input type="submit" id="botao-salvar" name="btnSalvar" value="<?php echo($botao);?>">
                            
                        
                    </form>
                    
                </div>
                
                <form name="frmFoto1" method="POST" action="upload-foto.php?txt=txtFoto1" enctype="multipart/form-data" id="frmFoto1">
                    <div class="desc">Imagem 01:</div>
                    <div id="caixa-foto1">
                        <img src="<?php echo($txtFoto01);?>">
                    </div>
                    <input type="file" name="fleFoto" id="foto1">
                </form>
                
                <form name="frmFoto2" method="POST" action="upload-foto.php?txt=txtFoto2" enctype="multipart/form-data" id="frmFoto2">
                    <div class="desc">Imagem 02:</div>
                    <div id="caixa-foto2">
                        <img src="<?php echo($txtFoto02);?>">
                    </div>
                    <input type="file" name="fleFoto" id="foto2">
                </form>

            </div>
            
            
            <div id="caixa-tabela"><!--Tabela dos dados da sessão-->
                <table id="tabela-titulos">
                    <tr>
                        <td>Imagem 01</td>
                        <td>Texto</td>
                        <td>Imagem 02</td>
                        <td>Opçoes</td>
                    </tr>
                </table>
                
                <div id="tabela-dados">
                    <?php
                        $sql = "SELECT * FROM tbl_sobre_padoka order by id desc";
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
                                <img src="<?php echo($rsDados['imagem01']);?>" class="foto-na-tabela">
                            </div>
                             <div class="campo">
                                 <?php echo($rsDados['texto']);?>
                            </div>
                            <div class="campo">
                                <img src="<?php echo($rsDados['imagem02']);?>" class="foto-na-tabela">
                            </div>
                             <div class="campo" style="text-align:center;">
                                 <a href="sobre-padoka.php?modo=excluir&id=<?php echo($rsDados['id']);?>" onclick="return confirm('Deseja Realmente excluir?')">
                                    <img src="imagens/gUsers/delete.png" class="foto-opcoes"> 
                                 </a>
                                <a href="sobre-padoka.php?modo=consultar&id=<?php echo($rsDados['id']);?>">
                                    <img src="imagens/gUsers/edit.png" class="foto-opcoes"> 
                                 </a>
                                 <a href="sobre-padoka.php?modo=mudaStatus&id=<?php echo($rsDados['id']);?>&status=<?php echo($rsDados['status']);?>">
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