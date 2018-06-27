<?php
require_once 'conexao.php';
    session_start();
    $botao = "Salvar";
    $nome = "";

    $idCategoria = "";

    if(isset($_POST['btnSalvar'])){
        $nome = $_POST['txtNome'];
        $status = 1;
        $idCategoria = $_POST['idCategoria'];

        if($_POST['btnSalvar'] == "Salvar"){
            $sql = "insert into tbl_subcategoria SET 
            nome = '".$nome."',
            status =".$status.",
            idCategoria =".$idCategoria."";
        }else if($_POST['btnSalvar'] == "Editar"){
            $sql = "update tbl_subcategoria SET 
            nome = '".$nome."',
            idCategoria =".$idCategoria." WHERE id=".$_SESSION['idSessao'];
        }

        mysqli_query($con, $sql);
        header('location:subcategorias.php');
    }

    if(isset($_GET['modo'])){
        $modo = $_GET['modo'];

        if($modo == "excluir"){
            $id = $_GET['id'];
            $sql = "DELETE from tbl_subcategoria where id=".$id;

            mysqli_query($con,$sql);
            header('location:subcategorias.php');
        }else if($modo == 'mudaStatus'){
            $id = $_GET['id'];
            $status = $_GET['status'];

            if($status == 0){
                $sql = "UPDATE tbl_subcategoria set status = 1 where id=".$id;
            }else{
                 $sql = "UPDATE tbl_subcategoria set status = 0 where id=".$id;
            }
             mysqli_query($con,$sql);

        }else if($modo == 'consultar'){
            $id = $_GET['id'];
            $_SESSION['idSessao'] = $id;

            $sql = "SELECT * FROM tbl_subcategoria where id=".$id;
            $res = mysqli_query($con, $sql);

            if($rsSubcategoria = mysqli_fetch_array($res)){
                $id = $rsSubcategoria['id'];
                $nome = $rsSubcategoria['nome'];
                $idCategoria = $rsSubcategoria['idCategoria'];

                $botao = "Editar";

            }
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>CMS | Subcategorias</title>
    <link rel="icon" href="imagens/icone.png" type="image/x-icon" />
    <link rel="shortcut icon" href="imagens/icone.png" type="image/x-icon"/>
    
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/subcategorias.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    
</head>
<body>
    <div id="main">
        <?php require_once 'header.php'; ?>
        
        <div id="content">
            <form action="subcategorias.php" method="post">
                <div id="caixa-form">
                    Nome da Subcategoria:<br>
                    <input type="text" class="input-texto" maxlength="30"
                           name="txtNome" required value="<?=$nome?>"><br>
                    Categoria:
                    <select class="select-cat" name="idCategoria">
                            <?php
                                $sql = "select * from tbl_categoria";
                                $res = mysqli_query($con, $sql);

                                while($rsCategorias = mysqli_fetch_array($res)){

                                    if($rsCategorias['id'] == $idCategoria){
                                        $selecionar = "selected";
                                    }else{
                                        $selecionar = "";
                                    }
                            ?>    
                                <option 
                                     <?=$selecionar?> value="<?=$rsCategorias['id']?>"><?=$rsCategorias['nome']?>
                                </option>  
                            <?php } ?>                  
                    </select>

                    <div id="caixa-botoes">
                        <input type="submit" id="botao-salvar" value="<?=$botao?>" name="btnSalvar">
                        
                        <input type="reset" id="botao-limpar" value="Limpar">
                    </div>
                </div>
            </form>
            
            
            <div id="caixa-tabela" >
                <table id="tabela-titulos" >
                    <tr>
                        <td>
                            Nome da subcategoria
                        </td>
                         
                         <td>
                            Opções
                        </td>
                        
                    </tr>
                </table>
                
                    <div id="tabela-usuarios">
                        <?php
                            $sql = "SELECT * FROM tbl_subcategoria";
                            $res = mysqli_query($con, $sql);
                            while($rsDados = mysqli_fetch_array($res)){
                                if($rsDados['status'] == 1){
                                    $fotoStatus = "check.png";
                                }else{
                                    $fotoStatus = "noCheck.png";
                                }
                        
                        ?>
                        <div class="linha">
                            <div class="campo">
                                <?php echo($rsDados['nome']);?>
                            </div>
                            
                             <div class="campo" style="text-align:center;">
                                 <a href="subcategorias.php?id=<?php echo($rsDados['id']);?>&modo=excluir" onclick="return confirm('Deseja Realmente excluir')">
                                    <img src="imagens/gUsers/delete.png" class="foto-opcoes"> 
                                 </a>|
                                 <a href="subcategorias.php?id=<?php echo($rsDados['id']);?>&modo=consultar">
                                    <img src="imagens/gUsers/edit.png" class="foto-opcoes"> 
                                 </a>|
                                 <a href="subcategorias.php?id=<?php echo($rsDados['id']);?>&modo=mudaStatus&status=<?php echo($rsDados['status']);?>">
                                    <img src="imagens/gUsers/<?=$fotoStatus?>" class="foto-opcoes">
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