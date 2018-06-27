<?php

require_once 'conexao.php';


if(isset($_GET['modo'])){
    $modo = $_GET['modo'];
    
    if($modo == 'ativar'){
        $produtoMes = $_GET['produtoMes'];
        $id = $_GET['id'];
        
        $zerar =  "UPDATE tbl_produtos SET produtoMes = 0";
        mysqli_query($con, $zerar);
        if($produtoMes == 0){
            $sql = "UPDATE tbl_produtos SET produtoMes = 1 WHERE id =".$id;
        }else{
            $sql = "UPDATE tbl_produtos SET produtoMes = 0 WHERE id =".$id;
        }
        mysqli_query($con, $sql);
         
    }
}
?> 

<!DOCTYPE html>
<html>
<head>
    <title>CMS | Produto do Mês</title>
    <link rel="icon" href="imagens/icone.png" type="image/x-icon" />
    <link rel="shortcut icon" href="imagens/icone.png" type="image/x-icon"/>
    
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/produto-mes.css">
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
                            Descrição
                        </td>
                         <td>
                            Preço
                        </td>
                         <td>
                            Ativar Produto do Mês
                        </td>
                        
                    </tr>
                </table>
                    <div id="tabela-usuarios">
                        <?php
                            $sql = "SELECT * FROM tbl_produtos WHERE status = 1 ORDER BY id DESC";
                            $resultado = mysqli_query($con,$sql);                        
                        while($rsDados = mysqli_fetch_array($resultado)){      
                         $produtoMes = $rsDados['produtoMes'];

                            if($produtoMes == 1){
                                $fotoStatus = "check.png";
                            }else{
                                $fotoStatus = "noCheck.png";
                            }
                            
                        ?>
                        <div class="linha">
                            <div class="campo">
                                <?php echo($rsDados['nome']);?>
                            </div>
                             <div class="campo" title="<?php echo($rsDados['descricao']);?>">
                               <?php echo($rsDados['descricao']);?>
                            </div>
                             <div class="campo">
                              R$ <?php echo($rsDados['preco']);?>
                            </div>
                             <div class="campo" style="text-align:center;">
                                <a href="produto-mes.php?modo=ativar&id=<?php echo($rsDados['id']);?>&produtoMes=<?php echo($rsDados['produtoMes']);?>">
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