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
    <title>CMS | Home</title>
    <link rel="icon" href="imagens/icone.png" type="image/x-icon" />
    <link rel="shortcut icon" href="imagens/icone.png" type="image/x-icon"/>
    
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/usuario.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    
</head>
<body>
    <div id="main">
        <?php require_once 'header.php'; ?>
        
        <div id="content">
            <div id="linha-opcoes">
            
            <a href="gerenciamento-usuarios.php">
                <div class="item-submenu">
                    <div class="foto">
                        <img src="imagens/users.png" width="150" height="150">
                    </div>
                    <div class="titulo">
                        Gerenciamento de Usuários
                    </div>
                </div>
            </a>
            <a href="gerenciamento-niveis.php">
                <div class="item-submenu">
                    <div class="foto">
                        <img src="imagens/niveis.png" width="150" height="150">
                    </div>
                    <div class="titulo">
                        Gerenciamento de Niveis de Usuários
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