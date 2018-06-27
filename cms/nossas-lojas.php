<?php
    require_once 'conexao.php';

session_start();

    $botao = "Salvar";
    $nomeLoja = "";
    $telefone = "";
    $rua = "";
    $numero = "";
    $cidade = "";
    $estado = "";
    $foto = "";


    if(isset($_POST['btnSalvar'])){
        
        $nomeLoja = $_POST['txtNomeLoja'];
        $telefone = $_POST['txtTelefone'];
        $rua = $_POST['txtRua'];
        $numero = $_POST['txtNumero'];
        $cidade = $_POST['txtCidade'];
        $estado = $_POST['txtEstado'];
        $foto = $_POST['txtFoto'];
        $status = 1;
        $idPagina = 1;
        
        if($_POST['btnSalvar'] == "Salvar"){
            $sql = "INSERT INTO tbl_lojas SET 
            nomeLoja='".$nomeLoja."',
            telefone='".$telefone."',
            rua='".$rua."',
            numero='".$numero."',
            cidade='".$cidade."',
            estado='".$estado."',
            foto='".$foto."',
            status='".$status."',
            idPagina='".$idPagina."'
            ";
        }else if($_POST['btnSalvar'] == "Editar"){
            $sql = "UPDATE tbl_lojas SET 
            nomeLoja='".$nomeLoja."',
            telefone='".$telefone."',
            rua='".$rua."',
            numero='".$numero."',
            cidade='".$cidade."',
            estado='".$estado."',
            foto='".$foto."',
            status='".$status."',
            idPagina='".$idPagina."'
            WHERE id=".$_SESSION['idSessao'];
        }
        
        mysqli_query($con, $sql);
        
        header('location:nossas-lojas.php');
    }

if(isset($_GET['modo'])){ 
    $modo = $_GET['modo'];
    if($modo == "excluir"){
        $id = $_GET['id'];
        $sql = "DELETE FROM tbl_lojas WHERE id=".$id;
        
        mysqli_query($con,$sql);
        header('location:nossas-lojas.php');
    }else if($modo == "mudaStatus"){
        $status = $_GET['status'];
        $id = $_GET['id'];
        
        if($status == 0){
            $sql = "UPDATE tbl_lojas SET status = 1 WHERE id=".$id;
        }else{
            $sql = "UPDATE tbl_lojas SET status = 0 WHERE id=".$id;
        }
        mysqli_query($con,$sql);
    }else if($modo == "consultar"){
        $id = $_GET['id'];
        $_SESSION['idSessao'] = $id;
        
        $sql = "SELECT * FROM tbl_lojas where id=".$id;
        $res = mysqli_query($con,$sql);
        
        while($rsDados = mysqli_fetch_array($res)){
            $id = $rsDados['id'];
            $nomeLoja = $rsDados['nomeLoja'];
            $telefone = $rsDados['telefone'];
            $rua = $rsDados['rua'];
            $numero = $rsDados['numero'];
            $cidade = $rsDados['cidade'];
            $estado = $rsDados['estado'];
            $foto = $rsDados['foto'];
        }
        $botao = "Editar";
    }

}

       
?>
<!DOCTYPE html>
<html>
<head>
    <title>CMS | Nossas Lojas</title>
    <link rel="icon" href="imagens/icone.png" type="image/x-icon" />
    <link rel="shortcut icon" href="imagens/icone.png" type="image/x-icon"/>
    
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/nossas-lojas.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    
    
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.form.js"></script>
    
    
    <script>
        $(document).ready(function(){   
            $('#foto').live('change',function(){
                
                $('#caixa-foto').html('<img src=imagens/ajax-loader.gif>');//Gif 
                setTimeout(function(){
                
                   $('#frmFoto').ajaxForm({
                       target:'#caixa-foto'

                   }).submit();
                },2000);
            });
            
            //Function para o evento click do botão salvar
            $('#botao-salvar').click(function(){
                $('#caixa-foto').html('<img src=imagens/ajax-salvando.gif>');
                
                setTimeout(function(){
                    //$('#frmCadastro').submit();
                    
                },2000);
                
            });
            
        });
    </script>
    
    <script src="js/forms.js"></script>
    
</head>
<body>
    <div id="main">
        <?php require_once 'header.php'; ?>
        
        <div id="content">
            
<!--            DADOS DO FORMULARIO-->
            <div id="caixa-formulario">
                <form name="frmCadastro" id="frmCadastro" method="post" action="nossas-lojas.php">
                    <div class="box-dados"><!--Nome da loja-->
                        <div class="titulo-input">Nome da Loja</div>
                        <input type="text" name="txtNomeLoja" maxlength="40" value="<?php echo($nomeLoja);?>" required>
                    </div>

                    <div class="box-dados"><!--Telefone-->
                        <div class="titulo-input">Telefone</div>
                        <input type="text" name="txtTelefone" maxlength="14" value="<?php echo($telefone);?>" required>
                    </div>

                    <div class="box-dados"><!--Rua Avenida-->
                        <div class="titulo-input">Rua / Avenida</div>
                        <input type="text" name="txtRua" maxlength="50" value="<?php echo($rua);?>" required>
                    </div>

                    <div class="box-dados"><!--Numero-->
                        <div class="titulo-input">Numero</div>
                        <input type="text" name="txtNumero" id="numero-input" maxlength="4" value="<?php echo($numero);?>" required>
                    </div>

                    <div class="box-dados"><!--Cidade-->
                        <div class="titulo-input">Cidade</div>
                        <input type="text" name="txtCidade" value="<?php echo($cidade);?>" required>
                    </div>

                    <div class="box-dados"><!--Estado-->
                        <div class="titulo-input">Estado</div>
                        <select name="txtEstado">
                            
                                <option <?php if($estado == "AC"){echo("selected");} ?> value="AC">Acre</option>
                                <option <?php if($estado == "AL"){echo("selected");} ?> value="AL">Alagoas</option>
                                <option <?php if($estado == "AP"){echo("selected");} ?> value="AP">Amapá</option>
                                <option <?php if($estado == "AM"){echo("selected");} ?> value="AM">Amazonas</option>
                                <option <?php if($estado == "BA"){echo("selected");} ?> value="BA">Bahia</option>
                                <option <?php if($estado == "CE"){echo("selected");} ?> value="CE">Ceará</option>
                                <option <?php if($estado == "DF"){echo("selected");} ?> value="DF">Distrito Federal</option>
                                <option <?php if($estado == "ES"){echo("selected");} ?> value="ES">Espirito Santo</option>
                                <option <?php if($estado == "GO"){echo("selected");} ?> value="GO">Goiás</option>
                                <option <?php if($estado == "MA"){echo("selected");} ?> value="MA">Maranhão</option>
                                <option <?php if($estado == "MS"){echo("selected");} ?> value="MS">Mato Grosso do Sul</option>
                                <option <?php if($estado == "MT"){echo("selected");} ?> value="MT">Mato Grosso</option>
                                <option <?php if($estado == "MG"){echo("selected");} ?> value="MG">Minas Gerais</option>
                                <option <?php if($estado == "PA"){echo("selected");} ?> value="PA">Pará</option>
                                <option <?php if($estado == "PB"){echo("selected");} ?> value="PB">Paraíba</option>
                                <option <?php if($estado == "PR"){echo("selected");} ?> value="PR">Paraná</option>
                                <option <?php if($estado == "PE"){echo("selected");} ?> value="PE">Pernambuco</option>
                                <option <?php if($estado == "PI"){echo("selected");} ?> value="PI">Piauí</option>
                                <option <?php if($estado == "RJ"){echo("selected");} ?> value="RJ">Rio de Janeiro</option>
                                <option <?php if($estado == "RN"){echo("selected");} ?> value="RN">Rio Grande do Norte</option>
                                <option <?php if($estado == "RS"){echo("selected");} ?> value="RS">Rio Grande do Sul</option>
                                <option <?php if($estado == "RO"){echo("selected");} ?> value="RO">Rondônia</option>
                                <option <?php if($estado == "RR"){echo("selected");} ?> value="RR">Roraima</option>
                                <option <?php if($estado == "SC"){echo("selected");} ?> value="SC">Santa Catarina</option>
                                <option <?php if($estado == "SP"){echo("selected");} ?> value="SP">São Paulo</option>
                                <option <?php if($estado == "SE"){echo("selected");} ?> value="SE">Sergipe</option>
                                <option <?php if($estado == "TO"){echo("selected");} ?> value="TO">Tocantins</option>
                        </select>
                    </div>
                    <input type="hidden" name="txtFoto" value="<?php echo($foto);?>">
                    <div id="centralizar-botoes">
                        <input type="submit" id="botao-salvar" value="<?=$botao?>" name="btnSalvar">
                        <input type="reset" id="botao-limpar" value="Limpar">
                    </div>

                    
                </form>
            </div>
            
<!--            Formulario da foto-->
            <div id="caixa-para-foto">
                <form name="frmFoto" method="post" action="upload-foto.php?txt=txtFoto" enctype="multipart/form-data" id="frmFoto">
                    <div id="caixa-foto">
                        <img src="<?php echo($foto);?>">
                    </div>
                    <input type="file" name="fleFoto" id="foto" class="file">
                </form>
            </div>
            
            <div id="caixa-tabela"><!--Tabela dos dados da sessão-->
                <table id="tabela-titulos">
                    <tr>
                        <td>Nome Loja</td>
                        <td>Telefone</td>
                        <td>Endereço</td>
                        <td>Opçoes</td>
                    </tr>
                </table>
                
                <div id="tabela-dados">
                    <?php
                        $sql = "SELECT * FROM tbl_lojas order by id desc";
                        $res = mysqli_query($con, $sql);
                    
                    while($rsDados = mysqli_fetch_array($res)){
                        $status = $rsDados['status'];
                        
                        if($status == 1){
                            $fotoStatus = "check.png";
                        }else{
                            $fotoStatus = "noCheck.png";
                        }
                    ?>
                    <div class="linha">
                            <div class="campo">
                                <?php echo($rsDados['nomeLoja']);?>
                            </div>
                             <div class="campo">
                                 <?php echo($rsDados['telefone']);?>
                            </div>
                            <div class="campo">
                                <?php echo($rsDados['rua']);?>
                            </div>
                             <div class="campo" style="text-align:center;">
                                 <a href="nossas-lojas.php?modo=excluir&id=<?php echo($rsDados['id']);?>" onclick="return confirm('Deseja Realmente excluir?')">
                                    <img src="imagens/gUsers/delete.png" class="foto-opcoes"> 
                                 </a>
                                <a href="nossas-lojas.php?modo=consultar&id=<?php echo($rsDados['id']);?>">
                                    <img src="imagens/gUsers/edit.png" class="foto-opcoes"> 
                                 </a>
                                 <a href="nossas-lojas.php?modo=mudaStatus&id=<?php echo($rsDados['id']);?>&status=<?php echo($rsDados['status']);?>">
                                     <img src="imagens/gUsers/<?php echo($fotoStatus);?>" class="foto-opcoes">
                                 </a>
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