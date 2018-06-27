<?php

  require_once 'cms/conexao.php';
    
    //Codigo para setar os valores do ambiente de tecnologia

    $sql = "SELECT * FROM tbl_conteudo_ambiente WHERE idAmbiente = 2 and status = 1";//Tecnologia

    $res = mysqli_query($con, $sql);
    
    while($rsDados = mysqli_fetch_array($res)){
        $tituloPagina = $rsDados['tituloPagina'];
        $textoSobre = $rsDados['textoSobre'];
        $foto01 = $rsDados['foto01'];
        $foto02 = $rsDados['foto02'];
        $foto03 = $rsDados['foto03'];
        $foto04 = $rsDados['foto04'];
        
    }


    
?>

<!DOCTYPE html>
<html>
<head>
    <title>Padoka Hill Valley - Espaço Tecnológico</title>
    <link rel="icon" href="imagens/icone.png" type="image/x-icon" />
    <link rel="shortcut icon" href="imagens/icone.png" type="image/x-icon"/>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/ambientes.css">
    <link rel="stylesheet" type="text/css" href="css/cabecalho.css">
    <link rel="stylesheet" type="text/css" href="css/rodape.css">
    
     <script src="js/jquery-3.2.1.min.js"></script>
    <script  src="js/jquery.cycle.all.js"></script>
    <script>//Função slider
        $(function(){
          $("#slide-fotos #conteudo-slide").cycle ({
                fx: 'fade',
                speed: 2000,
                timeout: 5000,
                
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
              
            <div id="caixa-ambiente-leitura">
    
                <div id="titulo-materia">
                    <?php echo($tituloPagina);?>
                </div>
                
                <div id="caixa-informacoes"><!--SLIDE E INFORMAÇOES DO AMBIENTE-->
                    <div id="slide-fotos">
                        <div id="conteudo-slide">
                            <div class="item-slide">
                                <img src="cms/<?php echo($foto01);?>" class="fotos-slides" title="Ambiente tecnologico" alt="Ambiente tecnologico" >
                            </div>
                            <div class="item-slide">
                                <img src="cms/<?php echo($foto02);?>" class="fotos-slides" title="Ambiente tecnologico" alt="Ambiente tecnologico">
                            </div>
                            <div class="item-slide">
                                <img src="cms/<?php echo($foto03);?>" class="fotos-slides" title="Ambiente tecnologico" alt="Ambiente tecnologico">
                            </div>
                            <div class="item-slide">
                                <img src="cms/<?php echo($foto04);?>" class="fotos-slides" title="Ambiente tecnologico" alt="Ambiente tecnologico">
                            </div>
                            

                        </div>
                        
                    </div>
                    <div id="informacoes-ambiente"><!--texto com informaçoes-->
                       <?php echo($textoSobre);?>
                    </div>
                </div>
                
                <div id="galeria-fotos"><!--Pequena galeria de fotos-->
                    <div id="fotos">
                        
                            <div class="foto-item">
                                <img src="cms/<?php echo($foto01);?>" class="foto-quadradinho" title="Ambiente tecnologico" alt="Ambiente tecnologico">
                            </div>
              
                            <div class="foto-item">
                                <img src="cms/<?php echo($foto02);?>" class="foto-quadradinho" title="Ambiente tecnologico" alt="Ambiente tecnologico" >
                            </div>
                       
                            <div class="foto-item">
                                <img src="cms/<?php echo($foto03);?>" class="foto-quadradinho" title="Ambiente tecnologico" alt="Ambiente tecnologico" >
                            </div>
                    
                            <div class="foto-item">
                                <img src="cms/<?php echo($foto04);?>" class="foto-quadradinho" title="Ambiente tecnologico" alt="Ambiente tecnologico">
                            </div>
              
                    </div>
                
                </div>
                
                <section id="chamada-feedback">
                    <div id="caixa-foto">
                        <div id="mensagem-feedback">
                            <h4>Buscamos 100% de satisfação de nossos clientes, a cada visita.<br>
                            Envie-nos comentários, sugestões e críticas.</h4>
                        </div>
                        
                        <a href="contato.php">
                            <div id="botao-contato">
                                Fale Conosco
                            </div>
                        </a>
                    </div>
                
                </section>
            </div>    
            
        </div>
            
        <footer><!--RODAPE-->
            <?php require_once 'rodape.php';?>
        </footer>
    </div>
    
    
</body>
</html>