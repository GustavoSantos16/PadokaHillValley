<?php
require_once 'conexao.php';
    session_start();
    $botao = "Salvar";
    $id = "";
    $foto = "";
    $nome = "";
    $descricao = "";
    $preco = "";

if (isset($_POST['btnSalvar'])){
    $foto = $_POST['txtFoto'];
    $nome = $_POST['txtNome'];
    $descricao = $_POST['txtDescricao'];
    $preco = $_POST['txtPreco'];
    
    $idSubcategoria = $_POST['idSubcategoria'];
    $status = 1;
    $produtoMes = 0;
    
    if($_POST['btnSalvar'] == "Salvar"){
        $sql = "INSERT INTO tbl_produtos set
        foto ='".$foto."',
        nome = '".$nome."',
        descricao = '".$descricao."',
        preco = '".$preco."',
        idSubcategoria = ".$idSubcategoria.",
        status = ".$status.",
        produtoMes =".$produtoMes."";
    }else if($_POST['btnSalvar'] == "Editar"){
        $sql = "UPDATE tbl_produtos set
        foto ='".$foto."',
        nome = '".$nome."',
        descricao = '".$descricao."',
        preco = '".$preco."',
        idSubcategoria = ".$idSubcategoria." where id=".$_SESSION['idSessao'];
    }
    
    mysqli_query($con, $sql);
    header('location:cadastrar-produto.php');
}

if(isset($_GET['modo'])){
    $modo = $_GET['modo'];
    
    if($modo == "excluir"){
        $id = $_GET['id'];
        $sql = "delete from tbl_produtos where id=".$id;
        mysqli_query($con, $sql);
        header('location:cadastrar-produto.php');
   
    }else if($modo == "mudaStatus"){
        $id = $_GET['id'];
        $status = $_GET['status'];
        
        if($status == 0){
            $sql = "update tbl_produtos set status = 1 where id=".$id;
        }else{
            $sql = "update tbl_produtos set status = 0 where id=".$id;
        }
        mysqli_query($con, $sql);
    
    }else if($modo == "consultar"){
        $id = $_GET['id'];
        $_SESSION['idSessao'] = $id;
        $sql = "SELECT * FROM tbl_produtos where id=".$id;
        $res = mysqli_query($con, $sql);
        
        if($rsDados = mysqli_fetch_array($res)){
            $id = $rsDados['id'];
            $foto = $rsDados['foto'];
            $nome = $rsDados['nome'];
            $descricao = $rsDados['descricao'];
            $preco = $rsDados['preco'];
            $idSubcategoria = $rsDados['idSubcategoria'];
            
            $botao = "Editar";
            
            
        }
    }
    
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>CMS | Cadastrar Produtos</title>
    <link rel="icon" href="imagens/icone.png" type="image/x-icon" />
    <link rel="shortcut icon" href="imagens/icone.png" type="image/x-icon"/>
    
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/cadastrar-produto.css">
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
            <div id="caixa-formularios">
                <form name="frmCadastro" id="frmCadastro" method="post" action="cadastrar-produto.php">
                    Nome do Produto:
                    <input type="text" class="input" name="txtNome" required value="<?php echo($nome);?>"><br>
                    Subcategoria:

                    <select name="idSubcategoria">
                        <?php
                            $sql = "SELECT * FROM tbl_subcategoria where status = 1";
                            $res = mysqli_query($con,$sql);
                            while($rsSubcategoria = mysqli_fetch_array($res)){
                                if($idSubcategoria == $rsSubcategoria['id']){
                                    $selecionar = "selected";
                                }else{
                                    $selecionar = "";
                                }
                        ?>
                        <option <?=$selecionar?> value="<?=$rsSubcategoria['id']?>">
                            <?=$rsSubcategoria['nome']?>
                        </option>
                        <?php
                            }
                        ?>
                    </select>
                    <a href="subcategorias.php" title="Clique para adicionar uma subcategoria" target="_blank">
                        <span style="color:green;"> + </span>
                    </a>

                   <br> Preço: <span style="font-size:17px; color:green;">R$ </span>
                    <input type="text" class="preco" name="txtPreco" required value="<?php echo($preco);?>">

                    <br>Descriçao:<br>
                    <textarea maxlength="255" name="txtDescricao" required><?php echo($descricao);?></textarea>
                    <input type="hidden" name="txtFoto" value="<?php echo($foto);?>">
                    
                    <div id="centralizar-botoes">
                        <input type="submit" id="botao-salvar" value="<?=$botao?>" name="btnSalvar">
                        <input type="reset" id="botao-limpar" value="Limpar">
                    </div>
                 </form>
            </div>
            
            
            <div id="caixa-para-foto">
                <form name="frmFoto" method="post" action="upload-foto.php?txt=txtFoto" enctype="multipart/form-data" id="frmFoto">
                    <div id="caixa-foto">
                        <img src="<?php echo($foto);?>">
                    </div>
                    <input type="file" name="fleFoto" id="foto" class="file">
                </form>
            </div>
            
            
            <!--CAIXA tabela para os produtos-->
            <div id="caixa-tabela"><!--Tabela dos dados da sessão-->
                    
                    
                    <table id="tabela-titulos">
                        <tr>
                            <td>Nome do Produto</td>
                            <td>Preço</td>
                            <td>Foto</td>
                            <td>Opçoes</td>
                        </tr>
                    </table>
                
                    <div id="tabela-dados">
                        <?php
                            $sql = "SELECT * FROM tbl_produtos order by nome";//LEITURA
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
                                    <?php echo($rsDados['nome']);?>
                                </div>
                                 <div class="campo">
                                   R$ <?php echo($rsDados['preco']);?>
                                </div>
                                <div class="campo">
                                    <img src="<?php echo($rsDados['foto']);?>" class="foto-tabela">
                                </div>
                                 <div class="campo" style="text-align:center;">
                                     <a href="cadastrar-produto.php?modo=excluir&id=<?php echo($rsDados['id']);?>" onclick="return confirm('Deseja Realmente excluir?')">
                                        <img src="imagens/gUsers/delete.png" class="foto-opcoes"> 
                                     </a>
                                    <a href="cadastrar-produto.php?modo=consultar&id=<?php echo($rsDados['id']);?>">
                                        <img src="imagens/gUsers/edit.png" class="foto-opcoes"> 
                                     </a>
                                     <a href="cadastrar-produto.php?modo=mudaStatus&id=<?php echo($rsDados['id']);?>&status=<?php echo($rsDados['status']);?>">
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