<!DOCTYPE html>
<html>
<head>
    <title>CMS | Conteúdo</title>
    <link rel="icon" href="imagens/icone.png" type="image/x-icon" />
    <link rel="shortcut icon" href="imagens/icone.png" type="image/x-icon"/>
    
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/servico-destaque.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    
</head>
<body>
    <div id="main">
        <?php require_once 'header.php'; ?>
        
        <div id="content">
            <div id="centralizar-itens">
                <a href="leitura.php">
                    <div class="item-submenu"><!--Ambiente de Leitura-->
                        <div class="foto">
                            <img src="imagens/servicos/leitura.png">
                        </div>
                        <div class="titulo">
                            Ambiente de Leitura
                        </div>
                    </div>
                </a>  
                <a href="tecnologico.php">
                    <div class="item-submenu"><!--Ambiente de Leitura-->
                        <div class="foto">
                            <img src="imagens/servicos/tecnologia.png">
                        </div>
                        <div class="titulo">
                            Ambiente Tecnológico
                        </div>
                    </div>
                </a>                
                <a href="retro.php">
                    <div class="item-submenu"><!--Ambiente de Leitura-->
                        <div class="foto">
                            <img src="imagens/servicos/retro.png">
                        </div>
                        <div class="titulo">
                            Ambiente Retrô
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