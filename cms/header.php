<?php

    @session_start();

    require_once 'conexao.php';

    if(isset($_SESSION['usuario'])){
        //Logado
    }else{
        header('location:../index.php');
    }

?>
<header>
                <div id="cabecalho">
                <div id="titulo-header">
                    CMS - Sistema de Gerenciamento do Site
                </div>
                <div id="logo">
                    
                </div>
            </div>
            
            <nav id="menu">
                <a href="conteudo-cms.php">
                    <div class="item-menu"><!--Conteudo-->
                        <div class="icone">
                            <img src="imagens/conteudo.png" width="90" height="90">
                        </div>
                        <div class="texto-menu">
                            Adm.Conteúdo
                        </div>
                    </div>
                </a>
                <a href="adm-contato.php">
                    <div class="item-menu"><!--Fale Conosco-->
                        <div class="icone">
                            <img src="imagens/contato.png" width="90" height="90">
                        </div>
                        <div class="texto-menu">
                            Adm.Fale Conosco
                        </div>
                    </div>
                </a>
                <a href="produto-cms.php">
                    <div class="item-menu"><!--Produtos-->
                        <div class="icone">
                            <img src="imagens/produtos.png" width="90" height="90">
                        </div>
                        <div class="texto-menu">
                            Adm.Produtos
                        </div>
                    </div>
                </a>
                <a href="usuario-cms.php">
                    <div class="item-menu"><!--Usuários-->
                        <div class="icone">
                            <img src="imagens/usuarios.png" width="90" height="90">
                        </div>
                        <div class="texto-menu">
                            Adm.Usuários
                        </div>
                    </div>
                </a>
                <div id="bem-vindo">
                    Bem Vindo, <b><?php echo($_SESSION['nomeDoUsuario']);?></b>.
                </div>
                <div id="logout">
                    <a href="../index.php">Logout</a>
                </div>
            </nav>
        </header>