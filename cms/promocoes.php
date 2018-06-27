<!DOCTYPE html>
<html>
<head>
    <title>CMS | Promoçoes</title>
    <link rel="icon" href="imagens/icone.png" type="image/x-icon" />
    <link rel="shortcut icon" href="imagens/icone.png" type="image/x-icon"/>
    
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/promocoes.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    
</head>
<body>
    <div id="main">
        <?php require_once 'header.php'; ?>
        
        <div id="content">
            <div id="linha-opcoes">
            
                <a href="nova-promocao.php">
                    <div class="item-submenu">
                        <div class="foto">
                            <img src="imagens/promocao.png" width="150" height="150">
                        </div>
                        <div class="titulo">
                            Adiciona nova Promoção
                        </div>
                    </div>
                </a>
                <a href="gerenciar-promocoes.php">
                    <div class="item-submenu">
                        <div class="foto">
                            <img src="imagens/sobre.png" width="150" height="150">
                        </div>
                        <div class="titulo">
                            Gerenciar Promoçoes
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