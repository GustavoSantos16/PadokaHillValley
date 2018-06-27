<?php
    require_once 'cms/conexao.php';

    $sql = "select * from tbl_produtos where status = 1 and produtoMes =1";
    $res = mysqli_query($con, $sql);
    
    while($rsDados = mysqli_fetch_array($res)){
        $fotoProduto = $rsDados['foto'];
        $nomeProduto = $rsDados['nome'];
        $descricao = $rsDados['descricao'];
        $preco = $rsDados['preco'];
        
    }

?>


<!DOCTYPE html>
<html>
<head>
    <title>Padoka Hill Valley - Produto do Mês</title>
    <link rel="icon" href="imagens/icone.png" type="image/x-icon" />
    <link rel="shortcut icon" href="imagens/icone.png" type="image/x-icon"/>
    
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/produtos.css">
    <link rel="stylesheet" type="text/css" href="css/cabecalho.css">
    <link rel="stylesheet" type="text/css" href="css/rodape.css">
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/jquery.cycle.all.js"></script>
    <script>
        $(function(){
          $("#conteudo-slide ul").cycle ({
                fx: 'fade',
                speed: 2000,
                timeout: 10000,
                next: '#setinha-direita',
                prev: '#setinha-esquerda',
                
            })
          
        })
        
    </script>
</head>
<body>
    <header><!--HEADER-->
        <?php require_once 'cabecalho.php';?>
    </header>
    <div id="main">
        <div id="content">
            
            <div id="titulo-materia">
                Produto do Mês
            </div>
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
            
            <div id="caixa-produto">
                <div id="produto">
                    <div id="foto-produto"><img src="cms/<?php echo($fotoProduto);?>" title="Produto do Mês" alt="Produto do Mês"></div>
                    <div id="nome-produto"><?php echo($nomeProduto);?></div>
                    <div id="descricao-preco">
                        <p><?php echo($descricao);?>
                        </p>
                        <p id="preco">R$<?php echo($preco);?></p>
                    </div>
                    
                </div>
            </div>
            
        </div>
        <footer><!--RODAPE-->
            <?php
                require_once 'rodape.php';
            ?>
        </footer>
    </div>
    
    
</body>
</html>