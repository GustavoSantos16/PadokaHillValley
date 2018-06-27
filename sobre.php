<?php
    require_once 'cms/conexao.php';

    
//Código para mostrar o titulo da pagina e a foto da chamada de promoções
    $sql = "SELECT * FROM tbl_pagina_sobre";
    $resultado = mysqli_query($con,$sql);

    while($rsTituloFoto = mysqli_fetch_array($resultado)){
        
        $tituloPagina = $rsTituloFoto['titulo'];
        $imagemPromo = $rsTituloFoto['imagem_promo'];
    }

// Codigo que mostra as duas fotos  e o texto ao centro contando sobre a padoka

    $sql = "select * from tbl_sobre_padoka where status = 1 order by rand() limit 1";
    $res = mysqli_query($con, $sql);
        while($rsSobre = mysqli_fetch_array($res)){

            $tituloSessaoSobre = $rsSobre['titulo'];
            $imagem01 = $rsSobre['imagem01'];
            $imagem02 = $rsSobre['imagem02'];
            $textoSobre = $rsSobre['texto'];
            
        }

//Codigo para a sessão de nosso diferencial
    $sql = "select * from tbl_sobre_diferencial where status = 1 order by rand() limit 1";
    $res = mysqli_query($con, $sql);
        while($rsDiferencial = mysqli_fetch_array($res)){
            $tituloSessaoDiferencial = $rsDiferencial['tituloSessao'];
            
            $titulo1 = $rsDiferencial['titulo1'];
            $titulo2 = $rsDiferencial['titulo2'];
            $titulo3 = $rsDiferencial['titulo3'];
            
            $texto1 = $rsDiferencial['texto1'];
            $texto2 = $rsDiferencial['texto2'];
            $texto3 = $rsDiferencial['texto3'];
            
        }

        //Codigo para os links dos  ambientes

        $leitura = "select * from tbl_conteudo_ambiente WHERE idAmbiente = 1 and status = 1";
        $res1 = mysqli_query($con,$leitura);

        while($rsLeitura = mysqli_fetch_array($res1)){
            $fotoAmbiente1 = $rsLeitura['foto01'];
        }
        
        
        $tecnologia = "select * from tbl_conteudo_ambiente WHERE idAmbiente = 2 and status = 1";
        $res2 = mysqli_query($con,$tecnologia);

        while($rsTecno = mysqli_fetch_array($res2)){
            $fotoAmbiente2 = $rsTecno['foto01'];
        }
       
        $retro = "select * from tbl_conteudo_ambiente WHERE idAmbiente = 3 and status = 1";
        $res3 = mysqli_query($con,$retro);

        while($rsRetro = mysqli_fetch_array($res3)){
            $fotoAmbiente3 = $rsRetro['foto01'];
        }

    
?>

<!DOCTYPE html>
<html>
<head>
    <title>Padoka Hill Valley - Sobre</title>
    <link rel="icon" href="imagens/icone.png" type="image/x-icon" />
    <link rel="shortcut icon" href="imagens/icone.png" type="image/x-icon"/>
    
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/sobre.css">
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
            
            
              <div id="caixa-inf-padoka">
                <div id="titulo-materia">
                   <?php echo($tituloPagina);?>
                </div>
                <section id="historia-padoka"><!--SOBRE A PADOKA-->
                    <div class="titulo-tema">
                        <h3><?php echo($tituloSessaoSobre);?></h3>
                    </div>
                    <div id="fachada-padoka" >
                        <img src="<?php echo("cms/".$imagem01);?>" title="Padoka Hill Valley" alt="Padoka Hill Valley" class="imagens-sobre">
                    </div>
                    <div id="sobre-padoka">
                        <p>
                            <?php echo($textoSobre);?>

                        </p>
                        <p>
                            Nossa sede está localizada na Av.Luis Carlos Berrini, nº 666.
                        </p>
                    </div>
                    <div id="imagem-dentro-padoka">
                         <img src="<?php echo("cms/".$imagem02);?>" title="Pâes e Bolos da Padoka Hill Valey" alt="Pâes e Bolos da Padoka Hill Valey" class="imagens-sobre">
                    </div>
                </section>
                  
                <section id="diferencial-padoka"><!--DIFERENCIAL-->
                    <div class="titulo-tema">
                        <h3><?php echo($tituloSessaoDiferencial);?></h3>
                    </div>
                    <div id="caixa-itens-diferencial">
                        <div class="item-qualidades">
                            <div class="nome-qualidade">
                                <?php echo(strtoupper($titulo1));?>
                            </div>
                            <div class="descricao-qualidade">
                                <?php echo($texto1);?>
                            </div>
                        </div>
                        <div class="item-qualidades">
                            <div class="nome-qualidade">
                                <?php echo(strtoupper($titulo2));?>
                            </div>
                            <div class="descricao-qualidade">
                                <?php echo($texto2);?>
                            </div>
                        </div>
                        <div class="item-qualidades">
                            <div class="nome-qualidade">
                                <?php echo(strtoupper($titulo3));?>
                            </div>
                            <div class="descricao-qualidade">
                                <?php echo($texto3);?>
                            </div>
                        </div>
                        
                    </div>
                    
                </section>
                
                <section id="promocao-confira"><!--Imagem com promocao ao fundo-->
                    <img src="<?php echo("cms/".$imagemPromo);?>" class="imagem_promo">
                    <div id="mensagem-promocao">
                        <h1>Aproveite nossas promoções</h1>
                        
                        <a href="promocoes.php">
                            <div id="botao-promocao">
                                Confira
                            </div>
                        </a>
                    </div>  
                  
                </section>
     
                <section id="ambientes-padoka"><!--AMBIENTES TEMATICOS-->
                    <div class="titulo-tema">
                        <h3>Nossos ambientes tematicos</h3>
                    </div>
                    <div id="caixa-ambientes-tematicos">
                        <div class="ambiente"><!--LEITURA-->
                            <a href="leitura.php">
                                <div id="imagem-ambiente-leitura">
                                    <img src="cms/<?php echo($fotoAmbiente1);?>" class="foto-ambiente">
                                </div>
                            </a>    
                           <a href="leitura.php"> 
                               <div class="nome-ambiente">
                                   Leitura
                               </div>
                            </a>
                        </div>
                        <div class="ambiente"><!--RETRO-->
                            <a href="retro.php">
                                <div id="imagem-ambiente-rock">
                                     <img src="cms/<?php echo($fotoAmbiente3);?>" class="foto-ambiente">
                                </div>
                            </a>
                            
                            <a href="retro.php">
                                <div class="nome-ambiente">
                                    Rock and Roll
                                </div>
                            </a>
                        </div>
                        
                        <div class="ambiente"><!--TECNOLOGIA-->
                            <a href="tecnologia.php">
                                <div id="imagem-ambiente-tecnologia">
                                     <img src="cms/<?php echo($fotoAmbiente2);?>" class="foto-ambiente">
                                </div>
                            </a>
                            <a href="tecnologia.php">
                                <div class="nome-ambiente">
                                    Tecnologia
                                </div>
                            </a>
                        </div>
                        
                    </div>
                </section>
                
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