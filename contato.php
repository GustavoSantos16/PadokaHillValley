<?php


    require_once 'cms/conexao.php';



if(isset($_POST['btnEnviar'])){
    $nome = $_POST['txtNome'];
    $telefone = $_POST['txtTelefone'];
    $celular = $_POST['txtCelular'];
    $email = $_POST['txtEmail'];
    $homePage = $_POST['txtHomePage'];
    $linkFace = $_POST['txtLinkFace'];
    $sugestao = $_POST['txtSugestao'];
    $infProduto = $_POST['txtInfProduto'];
    $sexo = $_POST['rdoSexo'];
    $profissao = $_POST['txtProfissao'];
    
    
    
    $sql = "INSERT INTO tbl_contato (nome, telefone, celular, email, homepage, facelink, mensagem, infproduto, sexo, profissao) VALUES('".$nome."', '".$telefone."', '".$celular."','".$email."', '".$homePage."','".$linkFace."', '".$sugestao."','".$infProduto."','".$sexo."','".$profissao."')";
    
    mysqli_query($con,$sql);
    
    header('location: contato.php');
    
}


?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Padoka Hill Valley - Fale Conosco</title>
    <link rel="icon" href="imagens/icone.png" type="image/x-icon" />
    <link rel="shortcut icon" href="imagens/icone.png" type="image/x-icon"/>
    
    <link rel="stylesheet" type="text/css" href="css/contato.css">
    <link rel="stylesheet" type="text/css" href="css/cabecalho.css">
    <link rel="stylesheet" type="text/css" href="css/rodape.css">
    <script src="js/jquery-3.2.1.min.js"></script>
    <script  src="js/jquery.cycle.all.js"></script>
    <script>//Função slider
        $(function(){
          $("#feedback-clientes #slider-mensagens").cycle ({
                fx: 'cover',
                speed: 200,
                timeout: 20000,
                next:'#next',
                
            })
      
          
        })
        
    </script>
    
    
    <script>//JAVASCRIPT
            function validar(caracter, blockType, campo){//Função para validar campos
                 document.getElementById(campo).style="background-color: #ffffff;";
                    //Tratamento para verificar qual tipo de navegador
                    //está vindo a tecla
                    if(window.event){
                        //Recebe a ascii do IE
                        var letra = caracter.charCode;
                    }else{
                        //Recebe ascii dos outros navegadores
                        var letra = caracter.which;
                    }

                    if(blockType == 'caracter'){
                        //BLOQUEIA Caracteres
                        if (letra < 48 || letra > 57){
                            if(letra != 8 && letra != 32){
                                //A variavel campo é recebida na função, nela 
                                //contem o ID do elemento a ser formatado
                                document.getElementById(campo).style="background-color: #f4a1a1;";//Troca a cor do elemento bg conforme for bloqueado
                                document.getElementById(campo).title="Apenas numeros são permitidos";
                                return false;
                            } 
                        }
                    }else if(blockType == 'number'){
                        //BLOQUEIA NUMEROS
                        if (letra >= 48 && letra <= 57){
                            if(letra != 8 && letra != 32){
                                document.getElementById(campo).style="background-color: #f4a1a1;";//Troca a cor do elemento bg conforme for bloqueado
                                document.getElementById(campo).title="Apenas letras são permitidas";
                                return false;
                            }
                        }
                    }
                
                
            }//Função pra validar campos etc..
        
        </script>
    
        <script>//Mascaras
            function mascaraFone(obj){
                var numbers = obj.value.replace(/\D/g,''), char = {0:'(', 2: ') ', 6: '-'};
                obj.value = '';
                for(var i = 0; i < numbers.length; i++){
                    obj.value += (char[i] || '') + numbers[i];
                }
            }
            
            function mascaraCelular(obj){
                var numbers = obj.value.replace(/\D/g,''), char = {0:'(', 2: ') ', 7: '-'};
                obj.value = '';
                for(var i = 0; i < numbers.length; i++){
                    obj.value += (char[i] || '') + numbers[i];
                }
            }
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
            
            <div id="titulo-materia">
                Fale Conosco
            </div>
            
            <div id="caixa-formulario"><!--Caixa de preenchimento do form-->
                    <div id="caixa-titulo">
                        Informaçoes de Contato
                    </div>
                <form id="form-contato" name="form-contato" method="post" action="contato.php">
                    <div class="caixinha-inputs"><!--NOME-->
                        <div class="titulo-input">
                            Nome*:
                        </div>
                        <div class="caixa-input-type">
                            <input class="input-type" type="text" placeholder="Digite seu nome..." name="txtNome" maxlength="70" id="nome" onkeypress="return validar(event,'number','nome')" required>
                        </div>
                    </div>
                    
                    <div class="caixinha-inputs"><!--TELEFONE-->
                        <div class="titulo-input">
                            Telefone:
                        </div>
                        <div class="caixa-input-type">
                            <input class="input-type" type="tel" placeholder="Ex. 1141893996" name="txtTelefone" maxlength="14" id="telefone" onkeypress="mascaraFone(this); return validar(event,'caracter','telefone')">
                        </div>
                    </div>
                    
                    <div class="caixinha-inputs"><!--CELULAR-->
                        <div class="titulo-input">
                           Celular*:
                        </div>
                        <div class="caixa-input-type">
                            <input class="input-type" type="tel" placeholder="Ex. 11975713996" name="txtCelular" maxlength="15" required id="celular" onkeypress="mascaraCelular(this); return validar(event, 'caracter', 'celular')" >
                        </div>
                    </div>
                    
                    <div class="caixinha-inputs"><!--EMAIL-->
                        <div class="titulo-input">
                          Email*:
                        </div>
                        <div class="caixa-input-type">
                            <input class="input-type" type="email" placeholder="Digite seu Email..." name="txtEmail" maxlength="70" required>
                        </div>
                    </div>
                    
                     <div class="caixinha-inputs"><!--Homeppage-->
                        <div class="titulo-input">
                          Home Page:
                        </div>
                        <div class="caixa-input-type">
                            <input class="input-type" type="url" name="txtHomePage" maxlength="255">
                        </div>
                    </div>
                    
                    <div class="caixinha-inputs"><!--Link FAce-->
                        <div class="titulo-input">
                          Link Facebook:
                        </div>
                        <div class="caixa-input-type">
                            <input class="input-type" type="url" name="txtLinkFace" maxlength="255">
                        </div>
                    </div>
                    
                    <div class="caixinha-inputs"><!--Profissão-->
                        <div class="titulo-input">
                          Profissão*:
                        </div>
                        <div class="caixa-input-type">
                            <input class="input-type" type="text" name="txtProfissao" maxlength="70" required  id="profissao" onkeypress="return validar(event, 'number', 'profissao')">
                        </div>
                    </div>
                    
                    <div class="caixinha-inputs"><!--SEXO-->
                        <div class="titulo-input">
                          Sexo*:
                        </div>
                        <div class="caixa-input-type-sexo">
                            <input type="radio" name="rdoSexo" value="M" id="m" ><label for="m">Masculino</label>
                            <input type="radio" name="rdoSexo" value="F" checked id="f"><label for="f">Feminino</label>
                        </div>
                    </div>
                    
                    <div id="caixa-info-produto"><!--Informaçoes do produto-->
                        <div class="titulo-input">
                            Informaçoes de Produtos:
                        </div>
                        <textarea id="ta-inf-produto" name="txtInfProduto" maxlength="255"></textarea>
                    </div>
                    
                    <div id="caixa-textarea"><!--MENSAGEM D E SUGESTÃO E CRITICAS-->
                        <div class="titulo-input">
                            Sugestões/Críticas:
                        </div>
                        <textarea id="sugestao-critica" name="txtSugestao" maxlength="855"></textarea>
                    </div>
                    
                    
                    
                    <div id="botoes"><!--botões-->
                        
                        <input type="submit" value="Enviar" id="btn-enviar" name="btnEnviar">
                        
                        <input type="reset" value="Limpar" id="btn-limpar">
                    </div>
                    
                </form>
                
            </div>
            
            <div id="feedback-clientes">
                <div id="titulo-feed">
                    Feedback de nossos Clientes
                </div>
                
                <div id="slider-mensagens"><!--MENSAGENS DOS CLIENTES PASSAM NA TELA-->
                    <div class="mensagem-cliente"><!--msg 1-->
                        Ótimo local, aconchegante e de fácil acesso. Cardápio com grande variedade de lanches e serviços.
                        Ótimo atendimento. Amei o espaço tecnológico.
                        
                        <div class="nome-cliente-feed">
                            -José da Galiléia, Delegado
                        </div>
                    </div>
                    
                    <div class="mensagem-cliente"><!--msg 2-->
                        Eu estava com fome e afim de ouvir um bom Rock and Roll, achei o lugar certo, fiquei impressionado com a variedade do local, mas o que mais me surpreendeu foi esse site maravilhoso. 
                        
                        <div class="nome-cliente-feed">
                            -Gustavo dos Santos, Informatica
                        </div>
                    </div>
                    
                    <div class="mensagem-cliente"><!--msg 3-->
                        Show, Recomendo, você não foi demitido!
                        
                        <div class="nome-cliente-feed">
                            -Roberto Justus, Apresentador
                        </div>
                    </div>
                    
                     <div class="mensagem-cliente"><!--msg 4-->
                        Era melhor ter ido ver o filme do Pelé!
                        
                        <div class="nome-cliente-feed">
                            -Roberto Gomez Bolanõs, Humorista
                        </div>
                    </div>
                    
                    <div class="mensagem-cliente"><!--msg 5-->
                        Tinha que ahjeid já Tava bão, mas num tava muito bão, tava meio ruim também, tava ruim, mas agora parece que piorou...
                        
                        <div class="nome-cliente-feed">
                            -João Confuso, Vendedor
                        </div>
                    </div>
                 
                </div>
                
                <div id="next">
                    
                </div>
            </div>
            
        </div>
        
        
            
        <footer><!--RODAPE-->
            <?php require_once 'rodape.php';?>
        </footer>
    </div>
    
    
</body>
</html>