<?php
    if(isset($_POST)){
        if(isset($_GET['txt'])){
            
            $txtFoto = $_GET['txt'];
        
            $nome_arquivo = basename($_FILES['fleFoto']['name']);

            $ext = strrchr($nome_arquivo,".");

            $nome_foto = pathinfo($nome_arquivo, PATHINFO_FILENAME);

            $nome_arquivo = md5(uniqid(time()).$nome_foto).$ext;

            $tamanho_arquivo = round(($_FILES['fleFoto']['size'])/1024);

            $upload_dir = "arquivos/";

            $arquivos_permitidos = array(".jpg",".png",".jpeg");

            $caminho_imagem = $upload_dir.$nome_arquivo;

            if(in_array($ext, $arquivos_permitidos)){
                if($tamanho_arquivo <= 5120){
                    $arquivo_tmp = $_FILES['fleFoto']['tmp_name'];

                    if(move_uploaded_file($arquivo_tmp, $caminho_imagem)){
                        echo("<img src='".$caminho_imagem."'>");

                        echo "
                        <script>
                            frmCadastro.$txtFoto.value = '$caminho_imagem';   
                        </script>";

                    }
                }else{
                     echo("Tamanho de arquivo inválido");
                 }
            }else{
                echo("Arquivo não permitido");
            }
        }
    }
?>