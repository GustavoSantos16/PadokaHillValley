<!DOCTYPE html>
<html>
<head>
    <title>CMS | Categorias e Subcategorias</title>
    <link rel="icon" href="imagens/icone.png" type="image/x-icon" />
    <link rel="shortcut icon" href="imagens/icone.png" type="image/x-icon"/>
    
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/menu-categorias.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    
</head>
<body>
    <div id="main">
        <?php require_once 'header.php'; ?>
        
        <div id="content">
            <div id="linha-opcoes">
            
            <a href="categorias.php">
                <div class="item-submenu">
                    <div class="foto">
                        <img src="imagens/produtos/categoria.png" width="150" height="150">
                    </div>
                    <div class="titulo">
                        Gerenciar Categorias
                    </div>
                </div>
            </a>
            <a href="subcategorias.php">
                <div class="item-submenu">
                    <div class="foto">
                        <img src="imagens/produtos/subcategoria.png" width="150" height="150">
                    </div>
                    <div class="titulo">
                        Gerenciar SubCategorias
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