 <?php
    require_once 'conexao.php';


    session_start();

    //Se nivel de usuario não for cataloguista ou administrador vaza do programa
    if($_SESSION['nivelUsuario'] != "Administrador" and $_SESSION['nivelUsuario'] != "Operador Basico"){
        header('location:home-cms.php');
    }




if(isset($_GET['modo'])){
    $modo = $_GET['modo'];
    
    if($modo == 'excluir'){
        $id= $_GET['id'];
        
        $sql = "DELETE from tbl_contato where id=".$id;
        
        mysqli_query($con, $sql);
        
        header('location:adm-contato.php');
    }
    
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>CMS | Fale Conosco</title>
    <link rel="icon" href="imagens/icone.png" type="image/x-icon" />
    <link rel="shortcut icon" href="imagens/icone.png" type="image/x-icon"/>
    
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/adm-contato.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    
    
     <script src="js/jquery.js"></script> 
    
        <script>//Codigo para Modal
          $(document).ready(function(){
               $(".visualizar").click(function(){
                  $(".container").fadeIn(1000);
               });
                   
            });
            
            function modal(idItem){
                $.ajax({
                    type: "POST",
                    url: "modal.php",
                    data: {id:idItem},
                    success: function(dados){
                        $('.modal').html(dados);
                    }
                });
                
            }
            
        </script>
    
</head>
<body>
     
    <div class="container">
            <div class="modal">
            
            </div>
    </div>
    <div id="main">
        <?php require_once 'header.php'; ?>
        
        <div id="content">
            
            <div id="caixa-tabela" >
                <table id="tabela-titulos" >
                    <tr>
                        <td>
                            Nome
                        </td>
                         <td>
                            Celular
                        </td>
                         <td>
                            Profissão
                        </td>
                         <td>
                            Opções
                        </td>
                        
                    </tr>
                </table>
                    <div id="tabela-usuarios">
                        <?php
                            $sql = "SELECT * FROM tbl_contato ORDER BY id DESC";
                            $resultado = mysqli_query($con,$sql);
                        
                            while($rsDados = mysqli_fetch_array($resultado)){
              
                            
                        ?>
                        <div class="linha">
                            <div class="campo">
                                <?php echo($rsDados['nome']);?>
                            </div>
                             <div class="campo">
                               <?php echo($rsDados['celular']);?>
                            </div>
                             <div class="campo">
                               <?php echo($rsDados['profissao']);?>
                            </div>
                             <div class="campo" style="text-align:center;">
                                 <a href="adm-contato.php?id=<?php echo($rsDados['id']);?>&modo=excluir" onclick="return confirm('Deseja Realmente excluir')">
                                    <img src="imagens/gUsers/delete.png" class="foto-opcoes"> 
                                 </a>|
                                
                                    <img src="imagens/gUsers/visualizar.png" class="visualizar" onclick="modal(<?php echo($rsDados['id'])?>);"> 
                                 
                            </div>
                        
                        </div>
                        <?php
                            }
                        ?>
                        
                    </div>
                    
            </div>
        </div>
        
        <footer>
            Desenvolvido por: Gustavo dos Santos
        </footer>
    </div>
</body> 
</html>