<?php
   require_once 'cms/conexao.php';


//Titulo e subtitulo e foto de fundo  da pagina lojas
    $sql = "Select * FROM tbl_pagina_loja";
    $res = mysqli_query($con, $sql);

    while($rsPagina = mysqli_fetch_array($res)){
        $tituloPagina = $rsPagina['tituloPagina'];
        $subtitulo = $rsPagina['subtitulo'];
        $fotoBackground = $rsPagina['foto'];
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Padoka Hill Valley - Nossas Lojas</title>
    <link rel="icon" href="imagens/icone.png" type="image/x-icon" />
    <link rel="shortcut icon" href="imagens/icone.png" type="image/x-icon"/>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/lojas.css">
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
                <?php echo($tituloPagina);?>
            </div>
            
            
            <section id="mapa-lojas">
                <div id="titulo-section">
                    <h4><?php echo($subtitulo);?></h4>
                </div>
                
                <div id="mapa">
                    <img src="cms/<?php echo($fotoBackground);?>" class="mapa-img" title="Padoka Hill Valley" alt="Padoka Hill Valley">
                </div>
                
                
                <div id="caixa-lojas"><!--Lojas ficam aqui-->
                    
                    <?php
                        $sql = "select * from tbl_lojas where status = 1";
                    
                        $res = mysqli_query($con, $sql);
                    
                        while($rsLojas = mysqli_fetch_array($res)){
                    
                    ?>
                        <div class="loja"><!--Loja-->
                            <div class="inf-loja">
                                <b><?php echo($rsLojas['nomeLoja']);?></b><br>
                                    <?php echo($rsLojas['rua']);?>, nº <?php echo($rsLojas['numero']);?>.<br>
                                    <?php echo($rsLojas['cidade']);?> - <?php echo($rsLojas['estado']);?><br>
                                    <?php echo($rsLojas['telefone']);?>
                            </div>
                            <div class="foto-loja">
                                <img src="cms/<?php echo($rsLojas['foto']);?>" title="<?php echo($rsLojas['nomeLoja']);?>" alt="<?php echo($rsLojas['nomeLoja']);?>">

                            </div>

                        </div>
                    
                    <?php
                        }
                    ?>
                    
                    
                    
                </div>
                
                
            </section>
            
        </div>
            
        <footer><!--RODAPE-->
           <?php require_once 'rodape.php';?>
        </footer>
    </div>
    
    
</body>
</html>