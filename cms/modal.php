<?php
    require_once 'conexao.php';

    $id = $_POST['id'];
    $sql = "SELECT * FROM tbl_contato WHERE id= ".$id;

    $res = mysqli_query($con, $sql);

    while($rsDados = mysqli_fetch_array($res)){
        $nome =  $rsDados['nome'];
        $telefone = $rsDados['telefone'];
        $celular = $rsDados['celular'];
        $email = $rsDados['email'];
        $homepage =  $rsDados['homepage'];
        $facelink = $rsDados['facelink'];
        $mensagem =  $rsDados['mensagem'];
        $infProduto =  $rsDados['infproduto'];
        $sexo =  $rsDados['sexo'];
        $profissao =  $rsDados['profissao'];
            
    }
?>

<html>
    <head>
        <title>Modal</title>
        
        <style>
            #header-modal{
                width: 100%;
                height: 80px;
                background-color: black;
                color:darkorange;
                font-size: 40px;
                border-top-right-radius: 10px;
                border-top-left-radius: 10px;
            }
            
            
            .fechar{
                width: 30px;
                height: 30px;
                background-image: url(imagens/gUsers/delete.png);
                background-size: cover;
                float: right;
                cursor: pointer;
            }
            
            #dados{
                width: 100%;
                height: 610px;
                font-size:20px;
            }
        </style>
        
        <script src="js/jquery.js"></script>
        <script>
            $(document).ready(function(){
               $(".fechar").click(function(){
                  $(".container").fadeOut(1000);
               });
                   
            });
        </script>
    </head>

    
    <body>
        <div id="header-modal">
            Dados do Usuário
            <div class="fechar">
            
            </div>
        </div>
       
        <div id="dados">
           <b> Nome:</b><?php echo($nome);?><hr>
            <b>Telefone:</b> <?php echo($telefone);?><hr>
            <b>Celular:</b> <?php echo($celular);?><hr>
            <b>Email:</b> <?php echo($email);?><hr>
            <b>Homepage:</b> <a href="<?php echo($homepage);?>" target="_blank"><?php echo($homepage);?></a><hr>
            <b>Link Facebook:</b> <a href="<?php echo($facelink);?>" target="_blank"><?php echo($facelink);?></a><hr>
            <b>Sexo:</b> <?php if($sexo == "M"){ echo("Masculino");}else{ echo("Feminino");}?><hr>
            <b>Profissão:</b> <?php echo($profissao);?><hr>
            <b>Informaçoes de Produto:</b> <?php echo($infProduto);?><hr>
            <b>Mensagem:</b> <?php echo($mensagem);?><hr>
            
            
        </div>
        
        
        
    </body>
</html>