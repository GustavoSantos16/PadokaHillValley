<?php
    require_once 'conexao.php';
    $somaPorcentagem = 0;
    $somaQtd = 0;
?>
<!DOCTYPE html>
<html>
<head>
    <title>CMS | Estatísticas</title>
    <link rel="icon" href="imagens/icone.png" type="image/x-icon" />
    <link rel="shortcut icon" href="imagens/icone.png" type="image/x-icon"/>
    
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/estatisticas.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    
</head>
<body>
    <div id="main">
        <?php require_once 'header.php'; ?>
        
        <div id="content">
            <h1>Top 10 Produtos Mais acessados</h1>
            <div id="caixa-centro">
                <div class="titulos-grafico">
                    <div class="nome-titulo">
                        Nome do Produto
                    </div>
                    <div class="nome-titulo">
                        Qtd
                    </div>
                    <div class="nome-titulo">
                        Porcentagem
                    </div>
                </div>
                
                <?php
                //Codigo para pegar o total de cliques dos produtos
                    $sql = "select sum(qtdCliques) as total from tbl_produtos";
                    $resultado = mysqli_query($con, $sql);
                    if($rsTotal = mysqli_fetch_array($resultado)){
                        $qtdTotal = $rsTotal['total'];
                    }
                
                ?>
                
                <?php
                    $sql = "select * from tbl_produtos order by qtdCliques desc limit 10";
                    $res = mysqli_query($con, $sql);
                    while($rsProduto = mysqli_fetch_array($res)){
                        
                ?>
                
                <div class="dados-estat">
                    <div class="nome-produto">
                        <?php echo($rsProduto['nome']);?>
                    </div>
                    
                    <div class="qtd-cliques" title="Quantidade Total: <?php echo($qtdTotal);?>">
                        <?php echo($rsProduto['qtdCliques']);?>
                    </div>
                    
                        <?php
                                $qtd = $rsProduto['qtdCliques'];
                                $porcentagem = ($qtd * 100)/ $qtdTotal;
                        
                        //Somando para contar os produtos que NÃO estão no top 10 OUTROS
                                $somaPorcentagem += $porcentagem;
                                $somaQtd += $qtd;
                            ?>
                    <div class="caixa-barra-porcetagem">
                        <div style="width:<?=$porcentagem?>%; height:100%; background-color: black;">
                            
                        </div>
                    </div>
                    <div class="percentual">
                        <?php echo(number_format($porcentagem,1));?>%
                    </div>
                
                </div>
            <?php
                    }
                ?>
                
                <div class="dados-estat">
                    <div class="nome-produto">
                        Outros
                    </div>
                    
                    <div class="qtd-cliques" title="Quantidade Total: <?php echo($qtdTotal);?>">
                        <?= $qtdTotal - $somaQtd?>
                    </div>
                    
                    <div class="caixa-barra-porcetagem">
                        <div style="width:<?=100 - $somaPorcentagem?>%; height:100%; background-color: black;">
                            
                        </div>
                    </div>
                    <div class="percentual">
                       <?php echo(number_format(100 - $somaPorcentagem,1))?>%
                    </div>
                
                </div>
            </div>
            
            
            
            
            
        </div>
        
        <footer>
            Desenvolvido por: Gustavo dos Santos
        </footer>
    </div>
</body> 
</html>