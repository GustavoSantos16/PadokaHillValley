<?php
require_once 'conexao.php';
    session_start();
    $botao = "Salvar";
    $nome = "";

    if(isset($_POST['btnSalvar'])){
        $nome = $_POST['txtNome'];
        $status = 1;
        
        if($_POST['btnSalvar'] == "Salvar"){
            $sql = "INSERT INTO tbl_categoria SET 
            nome='".$nome."',
            status=".$status."";
            //Alterando tambem a linha de baixo
        }else if($_POST['btnSalvar'] == "Editar"){
             $sql = "UPDATE tbl_categoria SET nome='".$nome."' WHERE id=".$_SESSION['idSessao'];
        }
        //Até aqui
        
        mysqli_query($con, $sql);
        header('location:categorias.php');
    }

/*Estou alterando daqui*/
    if(isset($_GET['modo'])){
        $modo = $_GET['modo'];

        if($modo == 'excluir'){
            $id = $_GET['id'];

            $sql = "delete from tbl_categoria where id=".$id;

            mysqli_query($con,$sql);
            header('location:categorias.php');

        }else if($modo == 'mudaStatus'){
            $status = $_GET['status'];
            $id = $_GET['id'];

            if($status == 0){
                $sql = "update tbl_categoria set status = 1 where id=".$id;
            }else{
                $sql = "update tbl_categoria set status = 0 where id=".$id;
            }

            mysqli_query($con, $sql);
        }else if($modo == 'consultar'){
            $id = $_GET['id'];
            $_SESSION['idSessao'] = $id;

            $sql = "select * from tbl_categoria where id=".$id;
            $res = mysqli_query($con,$sql);
            if($rsDados = mysqli_fetch_array($res)){
                $id = $rsDados['id'];
                $nome = $rsDados['nome'];
                $botao = "Editar";
            }
        }

    }

/*Até aqui*/

?>
<!DOCTYPE html>
<html>
<head>
    <title>CMS | Categorias</title>
    <link rel="icon" href="imagens/icone.png" type="image/x-icon" />
    <link rel="shortcut icon" href="imagens/icone.png" type="image/x-icon"/>
    
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/categorias.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    
</head>
<body>
    <div id="main">
        <?php require_once 'header.php'; ?>
        
        <div id="content">
            <form action="categorias.php" method="post">
                <div id="caixa-form">
                    Nome da Categoria:<br>
                    <input type="text" class="input-texto" maxlength="30"
                           name="txtNome" required value="<?=$nome?>"><br>
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
                            Nome da Categoria
                        </td>
                         
                         <td>
                            Opções
                        </td>
                        
                    </tr>
                </table>
                
                    <div id="tabela-usuarios">
                        <?php
                            $sql = "SELECT * FROM tbl_categoria";
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
                                 <a href="categorias.php?id=<?php echo($rsDados['id']);?>&modo=excluir" onclick="return confirm('Deseja Realmente excluir')">
                                    <img src="imagens/gUsers/delete.png" class="foto-opcoes"> 
                                 </a>|
                                 <a href="categorias.php?id=<?php echo($rsDados['id']);?>&modo=consultar">
                                    <img src="imagens/gUsers/edit.png" class="foto-opcoes"> 
                                 </a>|
                                 <a href="categorias.php?id=<?php echo($rsDados['id']);?>&modo=mudaStatus&status=<?php echo($rsDados['status']);?>">
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