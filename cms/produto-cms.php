<?php
    session_start();

    //Se nivel de usuario não for cataloguista ou administrador vaza do programa
    if($_SESSION['nivelUsuario'] != "Administrador" and $_SESSION['nivelUsuario'] != "Cataloguista"){
        header('location:home-cms.php');

    }


?>

<!DOCTYPE html>
<html>
<head>
    <title>CMS | Gerenciar Produtos e Afins</title>
    <link rel="icon" href="imagens/icone.png" type="image/x-icon" />
    <link rel="shortcut icon" href="imagens/icone.png" type="image/x-icon"/>
    
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/produto-cms.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    
</head>
<body>
    <div id="main">
        <?php require_once 'header.php'; ?>
        
        <div id="content">
            <div id="centralizar-itens">
                
                <a href="cadastrar-produto.php">
                    <div class="item-submenu"><!--Ambiente de Leitura-->
                        <div class="foto">
                            <img src="imagens/produtos/add-produto.png">
                        </div>
                        <div class="titulo">
                            Cadastrar Produtos
                        </div>
                    </div>
                </a> 
                
                <a href="menu-categorias.php">
                    <div class="item-submenu"><!--Ambiente de Leitura-->
                        <div class="foto">
                            <img src="imagens/produtos/categorys.png">
                        </div>
                        <div class="titulo">
                            Categorias e SubCategorias
                        </div>
                    </div>
                </a>    
                
                <a href="estatisticas.php">
                    <div class="item-submenu"><!--Ambiente de Leitura-->
                        <div class="foto">
                            <img src="imagens/produtos/analytics.png">
                        </div>
                        <div class="titulo">
                            Estatísticas de Produtos
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