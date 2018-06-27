<?php
 require_once 'conexao.php';

    if(isset($_POST['txtTitulo'])){
        $tituloPagina = $_POST['txtTitulo'];
        $subtitulo = $_POST['txtSubtitulo'];
        $foto = $_POST['txtFoto'];
        
        $sql = "UPDATE tbl_pagina_loja SET tituloPagina = '".$tituloPagina."', subtitulo ='".$subtitulo."',foto ='".$foto."'";
        
        
        
        mysqli_query($con, $sql);
        
        header('location:layout-lojas.php');
        
        
    }

?>


<!DOCTYPE html>
<html>
<head>
    <title>CMS | Titulo e Imagem</title>
    <link rel="icon" href="imagens/icone.png" type="image/x-icon" />
    <link rel="shortcut icon" href="imagens/icone.png" type="image/x-icon"/>
    
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/layout-lojas.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.form.js"></script>
    
    
    <script>
        $(document).ready(function(){   
            $('#foto').live('change',function(){
                
                $('#caixa-foto').html('<img src=imagens/ajax-loader.gif>');//Gif 
                setTimeout(function(){
                
                   $('#frmFoto').ajaxForm({
                       target:'#caixa-foto'

                   }).submit();
                },2000);
            });
            
            //Function para o evento click do botão salvar
            $('#botao-salvar').click(function(){
                $('#caixa-foto').html('<img src=imagens/ajax-salvando.gif>');
                
                setTimeout(function(){
                    $('#frmCadastro').submit();
                    
                },2000);
                
            });
            
        });
    </script>
</head>
<body>
    <div id="main">
        <?php require_once 'header.php'; 
        
        $sql = "SELECT * FROM tbl_pagina_loja;";
        
        $resultado = mysqli_query($con, $sql);
        
        while($rsDados = mysqli_fetch_array($resultado)){
        
        
        ?>
        
        <div id="content">
            
<!--            Form dos campos    -->
            <form id="frmCadastro" name="frmCadastro" method="POST" action="layout-lojas.php">
                <div id=caixa-input-titulo><!--titulo-->
                    <div class="titulo">
                        Titulo da Página
                    </div>
                    <input type="text" name="txtTitulo" id="titulo-pagina" value="<?php echo ($rsDados['tituloPagina']);?>" required>
                </div>
                
                <div id=caixa-input-subtitulo><!--Subtitulo-->
                    <div class="titulo">
                        Subtitulo da Página
                    </div>
                    <input type="text" name="txtSubtitulo" id="subtitulo-pagina" value="<?php echo ($rsDados['subtitulo']);?>" required>
                </div>
                
                <input type="hidden" name="txtFoto" value="<?php echo($rsDados['foto']);?>">
                
                <input type="button" value="Salvar" id="botao-salvar" name="btnSalvar">
            </form>
            
            
<!--            Form da foto         -->
            <form name="frmFoto" method="POST" action="upload-foto.php?txt=txtFoto" enctype="multipart/form-data" id="frmFoto">
                
                <div id="caixa-foto">
                    <img src="<?php echo($rsDados['foto']);?>">
                </div>
                
                <input type="file" name="fleFoto" id="foto" class="file">
            </form>
                
        <?php
            }
            ?>  
            
            
        </div>
        
        <footer>
            Desenvolvido por: Gustavo dos Santos
        </footer>
    </div>
</body> 
</html>