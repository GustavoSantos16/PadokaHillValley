<!DOCTYPE html>
<html>
<head>
    <title>CMS | Menu Lojas</title>
    <link rel="icon" href="imagens/icone.png" type="image/x-icon" />
    <link rel="shortcut icon" href="imagens/icone.png" type="image/x-icon"/>
    
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/menu-lojas.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    
</head>
<body>
    <div id="main">
        <?php require_once 'header.php'; ?>
        
        <div id="content">
            <div id="linha-opcoes">
            
            <a href="layout-lojas.php">
                <div class="item-submenu">
                    <div class="foto">
                        <img src="imagens/menu-sobre/titulos.png" width="150" height="150">
                    </div>
                    <div class="titulo">
                        Layout da Pagina
                    </div>
                </div>
            </a>
            <a href="nossas-lojas.php">
                <div class="item-submenu">
                    <div class="foto">
                        <img src="imagens/lojas.png" width="150" height="150">
                    </div>
                    <div class="titulo">
                        Lojas
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