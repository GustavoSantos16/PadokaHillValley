<?php
require_once 'conexao.php';

if(isset($_GET['modo'])){
    
    $modo = $_GET['modo'];
    if($modo == 'excluir'){
        $id = $_GET['id'];
        $sql = "delete from tbl_promocao where id=".$id;
        mysqli_query($con,$sql);
        header('location:gerenciar-promocoes');
    }else if($modo == 'mudaStatus'){
        $id = $_GET['id'];
        $status = $_GET['status'];
        
        $sql0 = "update tbl_promocao set status = 0";
        mysqli_query($con, $sql0);
        
        if($status == 0){
            $sql = "update tbl_promocao set status = 1 where id=".$id;
        }else{
            $sql = "update tbl_promocao set status = 0 where id=".$id;
        }
        
        mysqli_query($con,$sql);
        
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>CMS | Promoçoes</title>
    <link rel="icon" href="imagens/icone.png" type="image/x-icon" />
    <link rel="shortcut icon" href="imagens/icone.png" type="image/x-icon"/>
    
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/gerenciar-promocoes.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    
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
                            Descriçao
                        </td>
                         <td>
                            Percentual de Desconto
                        </td>
                         <td>
                            Opções
                        </td>
                        
                    </tr>
                </table>
                    <div id="tabela-usuarios">
                        <?php
                            $sql = "SELECT * FROM tbl_promocao ORDER BY id DESC";
                            $resultado = mysqli_query($con,$sql);
                        
                            while($rsDados = mysqli_fetch_array($resultado)){
                            
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
                             <div class="campo" title="<?=$rsDados['descricao'];?>">
                               <?php echo($rsDados['descricao']);?>
                            </div>
                             <div class="campo" style="text-align:center;">
                               <?php echo($rsDados['percentual']);?>%
                            </div>
                             <div class="campo" style="text-align:center;">
                                 <a href="gerenciar-promocoes.php?id=<?php echo($rsDados['id']);?>&modo=excluir" onclick="return confirm('Deseja Realmente excluir')">
                                    <img src="imagens/gUsers/delete.png" class="foto-opcoes"> 
                                 </a>|
                                 <a href="nova-promocao.php?id=<?php echo($rsDados['id']);?>&modo=consultar">
                                    <img src="imagens/gUsers/edit.png" class="foto-opcoes"> 
                                 </a>|
                                 <a href="gerenciar-promocoes.php?id=<?php echo($rsDados['id']);?>&modo=mudaStatus&status=<?php echo($rsDados['status']);?>">
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