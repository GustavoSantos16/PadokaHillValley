<?php
    session_start();

    //Se nivel de usuario não for cataloguista ou administrador vaza do programa
    if($_SESSION['nivelUsuario'] != "Administrador" and $_SESSION['nivelUsuario'] != "Operador Basico"){
        header('location:home-cms.php');
    }


?>

<!DOCTYPE html>
<html>
<head>
    <title>CMS | Conteúdo</title>
    <link rel="icon" href="imagens/icone.png" type="image/x-icon" />
    <link rel="shortcut icon" href="imagens/icone.png" type="image/x-icon"/>
    
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/conteudo.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    
</head>
<body>
    <div id="main">
        <?php require_once 'header.php'; ?>
        
        <div id="content">
            <div id="caixa-itens">
                <a href="servicos-destaque.php">
                    <div class="item"><!--PDODUTOS E SERVIÇOS EM DESTAQUE-->
                        <div class="icone-foto">
                            <img src="imagens/destaque.png" width="100" height="100" title="Produtos e Serviços em Destaque" alt="Produtos e Serviços em Destaque">
                        </div>
                        <div class="titulo-item">
                            Produtos e Serviços em Destaque
                        </div>
                    </div>
                </a>
                
                <a href="promocoes.php">
                    <div class="item"><!--PROMOCÇOES-->
                        <div class="icone-foto">
                            <img src="imagens/promocao.png" width="100" height="100" title="Promoções" alt="Promoções">
                        </div>
                        <div class="titulo-item">
                            Promoções
                        </div>
                    </div>
                </a>
                
                <a href="produto-mes.php">
                    <div class="item"><!--PDODUTOS do MÊS-->
                        <div class="icone-foto">
                            <img src="imagens/produto-mes.png" width="100" height="100" title="Produto do Mês" alt="Produto do Mês">
                        </div>
                        <div class="titulo-item">
                            Produto do Mês
                        </div>
                    </div>
                </a>
                
                <a href="menu-sobre.php">
                    <div class="item"><!--Sobre a Padoka-->
                        <div class="icone-foto">
                            <img src="imagens/sobre.png" width="100" height="100" title="Sobre a Padoka " alt="Sobre a Padoka">
                        </div>
                        <div class="titulo-item">
                            Sobre a Padoka
                        </div>
                    </div>
                </a>
                
            </div>   
            
            <div id="caixa-itens">
                <a href="menu-lojas.php">
                    <div class="item"><!--PDODUTOS E SERVIÇOS EM DESTAQUE-->
                        <div class="icone-foto">
                            <img src="imagens/lojas.png" width="100" height="100" title="Nossas Lojas" alt="Nossas Lojas">
                        </div>
                        <div class="titulo-item">
                            Nossas Lojas
                        </div>
                    </div>
                </a>
            </div>
            
        </div>
        
        <footer>
            Desenvolvido por: Gustavo dos Santos
        </footer>
    </div>
</body> 
</html>