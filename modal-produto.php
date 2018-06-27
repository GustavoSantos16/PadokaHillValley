        <?php
        require_once 'cms/conexao.php';

            $id = $_POST['id'];

            $sql = "SELECT * FROM tbl_produtos WHERE id =".$id;
            $res = mysqli_query($con, $sql);

            if($rsProduto = mysqli_fetch_array($res)){
                $foto = $rsProduto['foto']; 
                $nome = $rsProduto['nome'];
                $descricao = $rsProduto['descricao'];
                $preco = $rsProduto['preco'];
                $qtdCliques = $rsProduto['qtdCliques'];
            }
                $qtdCliques = $qtdCliques + 1;
            
            $sqlCliques = "UPDATE tbl_produtos set qtdCliques = ".$qtdCliques." where id=".$id;
            mysqli_query($con, $sqlCliques);

        ?>

        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8">
            <title>Produto</title>
<style>
/*    RESPONSIVO*/
    @media screen and (min-device-width:200px) and (max-device-width:520px){
         #header-modal{
            width: 100%;
            height: 80px;
            background-color: black;
            color:darkorange;
            font-size: 45px;
            border-top-right-radius: 10px;
            border-top-left-radius: 10px;
        }


        .fechar{
            width: 70px;
            height: 70px;
            background-image: url(cms/imagens/gUsers/delete.png);
            background-size: cover;
            float: right;
            margin-right: 10px;
            cursor: pointer;
        }

        #caixa-produto{
            width: 100%;
            height: 100%;
            margin-left: auto;
            margin-right: auto;
/*            background-color: forestgreen;*/


        }

        #produto{
            width: 100%;
            height: 100%;
            margin-left: auto;
            margin-right: auto;
            background-color: white;
            box-shadow: 7px 5px  15px rgba(0,0,0,.5);
            border-radius: 5px;
            background-color: bisque;

        }

        #foto-produto{
            width: 100%;
            height: 60%;
            background-color: bisque;
        }
        #foto-produto img{
            width: 100%;
            height: 100%;
            background-color: bisque;
        }


        #nome-produto{
            width: 100%;
            height: 60px;
            background-color: black;
            color: darkorange;
            text-align: center;
            font-size: 42px;
            padding-top: 15px;
        }

        #descricao-preco{
            width: 100%;
            height: 225px;
            text-align: center;
            font-size: 32px;
        }

        #preco{
            font-size: 42px;
            color:green;
        }
    }
    
/*    web original*/
    @media screen and (min-device-width:521px){
        
    
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
            background-image: url(cms/imagens/gUsers/delete.png);
            background-size: cover;
            float: right;
            cursor: pointer;
        }

        #caixa-produto{
            width: 500px;
            height: 650px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 10px;
/*            background-color: forestgreen;*/


        }

        #produto{
            width: 500px;
            height: 650px;
            margin-left: auto;
            margin-right: auto;
            background-color: white;
            box-shadow: 7px 5px  15px rgba(0,0,0,.5);
            border-radius: 5px;
            background-color: bisque;

        }

        #foto-produto{
            width: 500px;
            height: 300px;
            background-color: bisque;
        }
        #foto-produto img{
            width: 500px;
            height: 300px;
            background-color: bisque;
        }


        #nome-produto{
            width: 500px;
            height: 60px;
            background-color: black;
            color: darkorange;
            text-align: center;
            font-size: 32px;
            padding-top: 15px;
        }

        #descricao-preco{
            width: 500px;
            height: 205px;
            text-align: center;
            font-size: 22px;
        }

        #preco{
            font-size: 32px;
            color:green;
        }
    }
/*
*/

/****************************/
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
                    Detalhes do Produto
                    <div class="fechar">

                    </div>
                </div>

                <div id="caixa-produto">
                        <div id="produto">
                            <div id="foto-produto"><img src="cms/<?php echo($foto);?>" title="<?php echo($nome);?>" alt="<?php echo($nome);?>"></div>
                            <div id="nome-produto"><?php echo($nome);?></div>
                            <div id="descricao-preco">
                                <p><?php echo($descricao);?>
                                </p>
                                <p id="preco">R$<?php echo($preco);?></p>
                            </div>

                        </div>
                    </div>


            </body>
        </html>