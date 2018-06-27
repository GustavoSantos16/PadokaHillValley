<?php

//$con = @mysqli_connect('192.168.0.2','pc1020181','senai127','dbpc1020181'
if($con = @mysqli_connect('localhost','root','bcd127','db_padoka_gustavo')){

 }else{
     echo("Erro ao se conectar com o banco, contate o administrador");
 }
?>