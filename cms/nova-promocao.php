<?php
require_once 'conexao.php';

    session_start();
    $foto = "";
    $nome = "";
    $descricao = "";
    $percentual = "";
        
    $botao = "Salvar";

if(isset($_POST['btnSalvar'])){
    $foto = $_POST['txtFoto'];
    $nome = $_POST['txtNome'];
    $descricao = $_POST['txtDescricao'];
    $percentual = $_POST['txtPercentual'];
    $status = 0;
    
    
    if($_POST['btnSalvar'] == "Salvar"){
        $sql = "INSERT INTO tbl_promocao set
        foto='".$foto."',
        nome = '".$nome."',
        descricao='".$descricao."',
        percentual='".$percentual."',
        status = ".$status."";
        
        mysqli_query($con, $sql);
        header('location:nova-promocao.php');
    }else if($_POST['btnSalvar'] == "Editar"){
        $sql = "UPDATE tbl_promocao set
        foto='".$foto."',
        nome = '".$nome."',
        descricao='".$descricao."',
        percentual='".$percentual."' WHERE id=".$_SESSION['idSessao'];
        
        mysqli_query($con, $sql);
        header('location:gerenciar-promocoes.php');
    }
    
}

if(isset($_GET['modo'])){
    $modo = $_GET['modo'];
    if($modo == 'consultar'){
        $id = $_GET['id'];
        $_SESSION['idSessao'] = $id;
        
        $sql = "SELECT * from tbl_promocao where id=".$id;
        
        $res = mysqli_query($con, $sql);
        
        if($rsDados = mysqli_fetch_array($res)){
            $id = $rsDados['id'];
            $foto = $rsDados['foto'];
            $nome = $rsDados['nome'];
            $descricao = $rsDados['descricao'];
            $percentual = $rsDados['percentual'];
            $botao = "Editar";
        }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>CMS | Add Promoção</title>
    <link rel="icon" href="imagens/icone.png" type="image/x-icon" />
    <link rel="shortcut icon" href="imagens/icone.png" type="image/x-icon"/>
    
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/nova-promocao.css">
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
    <!--            Inputs-->
            <form name="frmCadastro" id="frmCadastro" method="post" action="nova-promocao.php">
                <div class="divisores">
                    <div class="caixa-inputs">
                        <div class="nome-input">Nome Promoção:</div>
                        <input type="text" name="txtNome" maxlength="35" value="<?=$nome?>">
                    </div>

                    <div class="caixa-inputs">
                        <div class="nome-input">Descrição:</div>
                        <textarea maxlength="500" name="txtDescricao" ><?=$descricao?></textarea>
                    </div>

                    <div class="caixa-inputs">
                        <div class="nome-input">Percentual de Desconto: 
                            <select name="txtPercentual">
                                <?php for($i = 5 ; $i <= 95; $i+=5){  
                                if($i == $percentual){
                                    $selecionar = "selected";
                                }else{
                                    $selecionar = "";
                                }
                                ?>
                                        }
                                        <option <?=$selecionar?> value="<?php echo($i);?>"><?php echo ($i."%");?></option>

                                <?php } ?>
                            </select>

                        </div>

                    </div>
                    <input type="hidden" name="txtFoto" value="<?=$foto?>">
                    <input type="reset" name="btnSalvar" id="botao-limpar" value="Limpar">
                    <input type="submit" name="btnSalvar" id="botao-salvar" value="<?=$botao?>">
                    
                </div>
            </form>
<!--            Foto-->
            <div class="divisores">
                <div id="caixa-para-foto">
                    <form name="frmFoto" method="post" action="upload-foto.php?txt=txtFoto" enctype="multipart/form-data" id="frmFoto">
                        <div id="caixa-foto">
                            <img src="<?=$foto?>">
                        </div>
                        <input type="file" name="fleFoto" id="foto" class="file">
                    </form>
                </div>

            
            </div>
            
        </div>
        
        <footer>
            Desenvolvido por: Gustavo dos Santos
        </footer>
    </div>
</body> 
</html>