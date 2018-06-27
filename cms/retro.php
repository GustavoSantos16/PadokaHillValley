<?php

    require_once 'conexao.php';

session_start();

    $id = "";
    $tituloPagina = "";
    $textoSobre = "";
    $foto01 = "";
    $foto02 ="";
    $foto03 = "";
    $foto04 = "";
    $botao = "Salvar";

    if(isset($_POST['btnSalvar'])){
        $tituloPagina = $_POST['txtTituloPagina'];
        $textoSobre = $_POST['txtTextoSobre'];
        
        $foto01 = $_POST['txtFoto01'];
        $foto02 = $_POST['txtFoto02'];
        $foto03 = $_POST['txtFoto03'];
        $foto04 = $_POST['txtFoto04'];
        
        $idAmbiente = 3; //Retro
        $status = 0;
        
        if($_POST['btnSalvar'] == "Salvar"){
            $sql = "INSERT INTO tbl_conteudo_ambiente
             SET idAmbiente = ".$idAmbiente.",
             tituloPagina ='".$tituloPagina."',
             textoSobre = '".$textoSobre."',
             foto01 = '".$foto01."',
             foto02 = '".$foto02."',
             foto03 = '".$foto03."',
             foto04 = '".$foto04."',
             status = ".$status."";
            
        }else if($_POST['btnSalvar'] == "Editar"){
            $sql = "UPDATE tbl_conteudo_ambiente
             SET tituloPagina ='".$tituloPagina."',
             textoSobre = '".$textoSobre."',
             foto01 = '".$foto01."',
             foto02 = '".$foto02."',
             foto03 = '".$foto03."',
             foto04 = '".$foto04."'
             where id=".$_SESSION['idSessao'];
        }
        
        mysqli_query($con, $sql);
        
        header('location:retro.php');
        
    }

    if(isset($_GET['modo'])){
        $modo = $_GET['modo'];
        
        if($modo == "excluir"){
            $id = $_GET['id'];
            $sql = "DELETE from tbl_conteudo_ambiente where id =".$id;
            
            mysqli_query($con ,$sql);
            
            header('location:retro.php');
        }else if($modo == "mudaStatus"){
            $id = $_GET['id'];
            $status = $_GET['status'];
            
            if($status == 1){
                $sql = "UPDATE tbl_conteudo_ambiente SET status = 0 WHERE id =".$id;
            }else if($status == 0){
                $sql_zerar = "UPDATE tbl_conteudo_ambiente SET status = 0 where idAmbiente = 3";
                mysqli_query($con, $sql_zerar);
                $sql = "UPDATE tbl_conteudo_ambiente SET status = 1 WHERE id =".$id;
            }
            mysqli_query($con,$sql);
        }else if($modo ="consultar"){
            $id = $_GET['id'];
            $_SESSION['idSessao'] = $id;
            
            $sql = "select * from tbl_conteudo_ambiente where id=".$id." and idAmbiente = 3";//Retro
            
            $res = mysqli_query($con, $sql);
            
            while($rsDados = mysqli_fetch_array($res)){
                
                $id = $rsDados['id'];
                $tituloPagina = $rsDados['tituloPagina'];
                $textoSobre = $rsDados['textoSobre'];
                $foto01 =$rsDados['foto01'];
                $foto02 =$rsDados['foto02'];
                $foto03 =$rsDados['foto03'];
                $foto04 =$rsDados['foto04'];
            }
            
            $botao = "Editar";
            
            
        }
        
    }
    

?>

<!DOCTYPE html>
<html>
<head>
    <title>CMS | Ambiente Retrô</title>
    <link rel="icon" href="imagens/icone.png" type="image/x-icon" />
    <link rel="shortcut icon" href="imagens/icone.png" type="image/x-icon"/>
    
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/ambientes.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.form.js"></script>
    
    <script>
        $(document).ready(function(){
            //Foto01
            $('#foto01').live('change',function(){
                $('#caixa-foto01').html('<img src=imagens/ajax-loader.gif>');//Gif
                setTimeout(function(){
                    $('#frmFoto01').ajaxForm({
                        
                        target:'#caixa-foto01'
                        
                    }).submit();
                },2000);
            });
            
            //Foto 02
            $('#foto02').live('change',function(){
                $('#caixa-foto02').html('<img src=imagens/ajax-loader.gif>');//Gif
                setTimeout(function(){
                    $('#frmFoto02').ajaxForm({
                        
                        target:'#caixa-foto02'
                        
                    }).submit();
                },2000);
            });
            
            //Foto 03
            $('#foto03').live('change',function(){
                $('#caixa-foto03').html('<img src=imagens/ajax-loader.gif>');//Gif
                setTimeout(function(){
                    $('#frmFoto03').ajaxForm({
                        
                        target:'#caixa-foto03'
                        
                    }).submit();
                },2000);
            });
            
            //Foto 04
            $('#foto04').live('change',function(){
                $('#caixa-foto04').html('<img src=imagens/ajax-loader.gif>');//Gif
                setTimeout(function(){
                    $('#frmFoto04').ajaxForm({
                        
                        target:'#caixa-foto04'
                        
                    }).submit();
                },2000);
            });
            
            
            $('#botao-salvar').click(function(){
                $('#caixa-foto01').html('<img src=imagens/ajax-salvando.gif>');
                $('#caixa-foto02').html('<img src=imagens/ajax-salvando.gif>');
                $('#caixa-foto03').html('<img src=imagens/ajax-salvando.gif>');
                $('#caixa-foto04').html('<img src=imagens/ajax-salvando.gif>');
                setTimeout(function(){
                    //$('#frmCadastro').submit();
                    
                },2000);
                
            });
        });
    </script>
    
</head>
<body>
    <div id="main">
        <?php require_once 'header.php'; ?>
        
        <div id="content">
            
                <div id="caixa-cadastro"><!--Caixa com inputs e fotos-->
                    
                    <form name="frmCadastro" id="frmCadastro" method="post" action="retro.php">
                        <div class="caixa-titulo-pag">
                            <div class="desc-inputs">Titulo da Página</div>
                            <input class="input" type="text" maxlength="30" name="txtTituloPagina" value="<?php echo($tituloPagina);?>" required>

                            <div class="desc-inputs">Texto sobre o ambiente</div>
                            <textarea maxlength="500" name="txtTextoSobre" required><?php echo($textoSobre);?></textarea>
                            
                            <input type="hidden" name="txtFoto01" value="<?php echo($foto01);?>">
                            <input type="hidden" name="txtFoto02" value="<?php echo($foto02);?>">
                            <input type="hidden" name="txtFoto03" value="<?php echo($foto03);?>">
                            <input type="hidden" name="txtFoto04" value="<?php echo($foto04);?>">
                            
                            
                            <input type="reset" id="botao-limpar" value="Limpar">
                            <input type="submit" id="botao-salvar" name="btnSalvar" value="<?php echo($botao);?>">
                        </div>
                    </form>
                    
                     <div id="caixa-fotos" title="Salvando Fotos"><!--Caixa como todos os forms das fotos-->
                        <div class="box-foto"><!--Foto01-->
                            <div class="foto-quadrado" id="caixa-foto01">
                                <img src="<?php echo($foto01);?>">
                            </div>
                            
                            <form name="frmFoto01" method="POST" action="upload-foto.php?txt=txtFoto01" enctype="multipart/form-data" id="frmFoto01">
                                
                                <input type="file" name="fleFoto" id="foto01">
                                
                            </form>
                         </div>
                         
                         <div class="box-foto"><!--Foto02-->
                            <div class="foto-quadrado" id="caixa-foto02">
                                <img src="<?php echo($foto02);?>">
                            </div>
                            <form name="frmFoto02" method="POST" action="upload-foto.php?txt=txtFoto02" enctype="multipart/form-data" id="frmFoto02">
                                
                                <input type="file" name="fleFoto" id="foto02">
                                
                            </form>
                         </div>
                         
                         <div class="box-foto"><!--Foto03-->
                            <div class="foto-quadrado" id="caixa-foto03">
                                <img src="<?php echo($foto03);?>">
                            </div>
                            <form name="frmFoto03" method="POST" action="upload-foto.php?txt=txtFoto03" enctype="multipart/form-data" id="frmFoto03">
                                
                                <input type="file" name="fleFoto" id="foto03">
                                
                            </form>
                         </div>
                         
                         <div class="box-foto" ><!--Foto04-->
                            <div class="foto-quadrado" id="caixa-foto04">
                                <img src="<?php echo($foto04);?>">
                            </div>
                             
                            <form name="frmFoto04" method="POST" action="upload-foto.php?txt=txtFoto04" enctype="multipart/form-data" id="frmFoto04">
                                
                                <input type="file" name="fleFoto" id="foto04">
                                
                            </form>
                         </div>
                         
                    </div>
                    
                
                    
                </div>
                
                <div id="caixa-tabela"><!--Tabela dos dados da sessão-->
                    
                    
                    <table id="tabela-titulos">
                        <tr>
                            <td>Texto Ambiente</td>
                            <td>Foto 1</td>
                            <td>Foto 2</td>
                            <td>Opçoes</td>
                        </tr>
                    </table>
                
                    <div id="tabela-dados">
                        <?php
                            $sql = "SELECT * FROM tbl_conteudo_ambiente WHERE idAmbiente = 3 order by id desc";//RETRO
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
                                    <?php echo($rsDados['textoSobre']);?>
                                </div>
                                 <div class="campo">
                                    <img src="<?php echo($rsDados['foto01']);?>" class="foto-tabela">
                                </div>
                                <div class="campo">
                                    <img src="<?php echo($rsDados['foto02']);?>" class="foto-tabela">
                                </div>
                                 <div class="campo" style="text-align:center;">
                                     <a href="retro.php?modo=excluir&id=<?php echo($rsDados['id']);?>" onclick="return confirm('Deseja Realmente excluir?')">
                                        <img src="imagens/gUsers/delete.png" class="foto-opcoes"> 
                                     </a>
                                    <a href="retro.php?modo=consultar&id=<?php echo($rsDados['id']);?>">
                                        <img src="imagens/gUsers/edit.png" class="foto-opcoes"> 
                                     </a>
                                     <a href="retro.php?modo=mudaStatus&id=<?php echo($rsDados['id']);?>&status=<?php echo($rsDados['status']);?>">
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