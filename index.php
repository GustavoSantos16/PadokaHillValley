<?php
require_once 'cms/conexao.php';

    


?>
<!DOCTYPE html>
<html>
<head>
    <title>Padoka Hill Valley - Home</title>
    <link rel="icon" href="imagens/icone.png" type="image/x-icon" />
    <link rel="shortcut icon" href="imagens/icone.png" type="image/x-icon"/>
    
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/cabecalho.css">
    <link rel="stylesheet" type="text/css" href="css/rodape.css">
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/jquery.cycle.all.js"></script>
    <script>//SCRIPT PARA OS SLIDES
        $(function(){
          $("#conteudo-slide ul").cycle ({
                fx: 'fade',
                speed: 2000,
                timeout: 10000,
                next: '#setinha-direita',
                prev: '#setinha-esquerda',
                
            })
          
        })
        
        //Modal
        $(document).ready(function(){
               $(".link-detalhe").click(function(){
                  $(".container").fadeIn(1000);
               });
                
                   
            });
            
            function modal(idItem){
                $.ajax({
                    type: "POST",
                    url: "modal-produto.php",
                    data: {id:idItem},
                    success: function(dados){
                        $('.modal').html(dados);
                    }
                });
                
            }
        
    </script>
    
    
    
    
    
    
    
</head>
    
<body>
    <div class="container">
            <div class="modal">
            
            </div>
    </div>
    
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
            <div id="slider"><!--SLIDER-->
                <div id="caixa-slider">
                    <div id="previous">
                        <div id="setinha-esquerda" title="Prev" class="seta">
                        
                        </div>
                    </div>
                    <div id="conteudo-slide">
                        <ul>
                            <li><!--Informações da Padaria-->
                                <img src="imagens/home/padaria-slide.jpg" width="1500" height="415" title="Estande de pães Hill Valley" alt="Estande de pães Hill Valley">
                                <div class="titulo-slides">Padoka Hill Valley</div>
                                
                                <div class="descricao-slide">
                                      <p>Funcionamos 24 horas, e temos ambientes               tematizados para nossos clientes,
                                            aproveite.
                                        </p>  

                                </div>
                                 
                            </li>
                            
                            <li><!--Informações da Sala de Leitura-->
                                <img src="imagens/home/espaco-leitura.jpg" width="1500" height="415" title="Sala de Leitura Hill Valley" alt="Sala de leitura Hill Valley">
                                <div class="titulo-slides">Ambiente de Leitura</div>
                                <div class="descricao-slide">
                                    <p>Gosta de ler? Oferecemos silencio e conforto, para que você possa ler seu livro acompanhado de um bom café. </p>
                                </div>
                            </li>
                            
                            <li><!--Espaço Retro-->
                                <img src="imagens/home/espaco-rock.jpg" width="1500" height="415" title="Espaço Retro Hill Valley" alt="Espaço retor Hill Valley">
                                <div class="titulo-slides">Espaço Retrô</div>
                                
                                <div class="descricao-slide">
                                    <p>Rock and Roll?! Que tal desfrutar das melhores musicas dos anos (70, 80, 90) a era de ouro da musica internacional. </p>
                                </div>
                            </li>
                            
                            <li><!--Espaço tecnológico-->
                                <img src="imagens/home/espaco-tecnologia.jpg" width="1500" height="415" title="Ambiente de Tecnologia Hill Valley" alt="Ambiente de Tecnologia Hill Valley">
                                <div class="titulo-slides">Tecnologia</div>
                                
                                <div class="descricao-slide">
                                    <p>Aos que amam tecnologia, temos o local ideal, salão de jogos, WiFi, bebidas e muito mais.</p>
                                </div>
                            </li>
                             
                        </ul>
                    </div>
                    <div id="next">
                        <div id="setinha-direita" title="Next" class="seta" >
                        
                        </div>
                    </div>
                </div>
            
            </div>
                <nav id="menu-vertical">

                    <?php
                        $sql = "SELECT * FROM tbl_categoria where status = 1";
                        $res = mysqli_query($con, $sql);

                        while($rsCategoria = mysqli_fetch_array($res)){
                    ?>
                    <a href="index.php?carregar=categoria&id=<?=$rsCategoria['id']?>" class="links">
                        <div class="itens-menu-vertical">
                                <?php echo($rsCategoria['nome']);?>

                            <div class="caixa-subitem">

                                <?php
                                    $sql = "SELECT * FROM tbl_subcategoria where status = 1 and idCategoria=".$rsCategoria['id'];
                                    $res2 = mysqli_query($con, $sql);

                                    while($rsSubcategoria = mysqli_fetch_array($res2)){
                                ?>
                                    <a href="index.php?carregar=subcategoria&id=<?=$rsSubcategoria['id']?>">
                                        <div class="subitem-menu-vertical">
                                            <?php echo($rsSubcategoria['nome']);?>
                                        </div>
                                    </a>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </a>
                    <?php
                    }
                    ?>

                </nav>
            
            
            <div id="caixa-pesquisa"><!-- Caixa de pesquisas-->
                    <form action="index.php" method="get">
                        <input type="submit" name="btnPesquisar" value="Pesquisar" class="btn-pesquisa">
                        <input type="text" name="txtPalavraChave" class="input-pesquisa">
                    </form>
                </div>
            <div id="caixa-produtos"><!--Caixa de produtos-->    
                
                <?php
                
                    if(isset($_GET['carregar'])){
                        $carregar = $_GET['carregar'];
    
                        if($carregar == "categoria"){//Carregar Produtos por Categoria
                            $idCategoria = $_GET['id'];
                            $sql = "select p.id,p.foto, p.nome, p.descricao, p.preco from tbl_produtos as p
                                    inner join tbl_subcategoria as sc
                                    on sc.id = p.idSubcategoria
                                    inner join tbl_categoria as c
                                    on c.id = sc.idCategoria
                                    where c.id = ".$idCategoria." and p.status = 1";
                        
                        }else if($carregar == "subcategoria"){//Carregar Produtos por Subcategoria
                            $idSubcategoria = $_GET['id'];
                            $sql = "select * from tbl_produtos where idSubcategoria=".$idSubcategoria;
                        }
                    }else{//Carregar todos os produtos aleatóriamente
                        $sql = "select * from tbl_produtos where status = 1 order by rand()";
                    }
                    
                //Área de pesquisa por produtos pelo nome e descricao categoria e subcategoria
                    if(isset($_GET['btnPesquisar'])){
                            
                                $palavraChave = $_GET['txtPalavraChave'];
                                $palavraChave = "%".$palavraChave."%";
                            
                            
                                $sql = "select p.id,p.foto, p.nome, p.descricao, p.preco from tbl_produtos as p   inner join tbl_subcategoria as sc
                                    on sc.id = p.idSubcategoria
                                    inner join tbl_categoria as c
                                    on c.id = sc.idCategoria where p.status = 1 and
                                    
                                p.nome like '".$palavraChave."' 
                                or p.descricao like '".$palavraChave."'
                                or c.nome like '".$palavraChave."'
                                or sc.nome like '".$palavraChave."'";
                        
                    }
                    
                    $res = mysqli_query($con, $sql);
                
                    while($rsProdutos = mysqli_fetch_array($res)){
                        
                    
                ?>
                        
                        <div class="item-produto"><!--Produto 1-->
                            <div class="foto-produto">
                                <img src="cms/<?php echo($rsProdutos['foto']);?>" title="Produto Disponível" alt="Produto Disponivel">
                            </div>
                            <div class="inf-produto"><!--NOME-->
                                Nome: <?php echo($rsProdutos['nome']);?>
                            </div>
                            <div class="inf-produto"><!--DESCRIÇÃO-->
                                Descrição: <?php echo($rsProdutos['descricao']);?>
                            </div>
                            <div class="inf-produto"><!--PREÇO-->
                                Preço: R$ <span style="color:green;"><?php echo($rsProdutos['preco']);?></span>
                            </div>
                            <div class="detalhes-produto"><!--DETALHES-->
                                <span class="link-detalhe" onclick="modal(<?php echo($rsProdutos['id']);?>)">Detalhes</span>
                            </div>
                        </div>
                <?php
                    }
                ?>
                    
                                      
                  
            
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