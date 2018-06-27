<?php
    require_once 'cms/conexao.php';

    $sql = "SELECT * FROM tbl_promocao where status = 1";
    $res = mysqli_query($con, $sql);
    while($rsDados = mysqli_fetch_array($res)){
        $nomePromocao = $rsDados['nome'];
        $fotoPromocao = $rsDados['foto'];
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Padoka Hill Valley - Promoções</title>
    <link rel="icon" href="imagens/icone.png" type="image/x-icon" />
    <link rel="shortcut icon" href="imagens/icone.png" type="image/x-icon"/>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/promocoes.css">
    <link rel="stylesheet" type="text/css" href="css/cabecalho.css">
    <link rel="stylesheet" type="text/css" href="css/rodape.css">
</head>
<body>
    <header><!--HEADER-->
        <?php require_once 'cabecalho.php';?>
    </header>
    <div id="main">
        <div id="content">
            <div id="caixa-redes-sociais"><!--REDES SOCIAIS-->
                <div class="rede-social">
                    
                    <img src="imagens/facebook.png" title="Facebook" alt="Facebook" width="70" height="70">
                
                </div>
                <div class="rede-social">
                    <img src="imagens/instagram.png" title="Instagram" alt="Isntagram" width="70" height="70">
                </div>
                <div class="rede-social">
                    <img src="imagens/youtube.png" title="Youtube" alt="Youtube" width="70" height="70">
                </div>
            </div>
            
            <div id="titulo-materia">
                <?php echo($nomePromocao);?>
            </div>
            
            <div id="section-promocoes">
                <div class="caixa-promocoes"><!--CAIXA PROMOÇOES 1-->
                    <img src="cms/<?php echo($fotoPromocao);?>" class="foto-promotion" title="Promoção Imperdível" alt="Promoção Imperdivel">
                    
                </div>
                
                <?php
                    $sql = "select p.foto, p.nome, p.preco , (p.preco-p.preco * promo.percentual/100) as novoPreco  from tbl_produtos as p
                    inner join tbl_produto_promocao as prod_pro
                    on prod_pro.idProduto = p.id 
                    inner join tbl_promocao as promo
                    on prod_pro.idPromocao = promo.id
                    where promo.status = 1 order by rand()";
                $res = mysqli_query($con,$sql);
                while($rsProdutoPromo = mysqli_fetch_array($res)){
                
                
                ?>
                   <div class="item-promo"><!--PROMOÇAO 1-->
                        <img src="cms/<?php echo($rsProdutoPromo['foto']);?>" title="Bolo de Morango" alt="Bolo de Morango">
                       
                        <div class="nome-item-promo">
                            <?php echo($rsProdutoPromo['nome']);?>
                        </div>
                        
                        <div class="preco-antigo">R$<?php echo ($rsProdutoPromo['preco']);?></div>

                        <div class="preco-promo">
                            R$<?php echo number_format(($rsProdutoPromo['novoPreco']),2);?>
                        </div>
                    </div>
                    
                <?php
                }
                ?>
                    
                            
            </div>
            
            
        </div>
        <footer><!--RODAPE-->
            <?php require_once 'rodape.php';?>
        </footer>
    </div>
    
    
</body>
</html>