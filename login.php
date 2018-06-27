<?php 

require_once 'cms/conexao.php';
session_start();

$usuario = $_POST['txtUsuario'];
$senha = $_POST['txtSenha'];

$sql = "select p.nome, n.nomeNivel from tbl_usuario as p
		inner join tbl_nivel_usuario as n
		on p.idNivelUsuario = n.id
		WHERE p.usuario = '".$usuario."' AND p.senha= '".$senha."' AND p.status = 1";
$res = mysqli_query($con, $sql);

if($rsUsuario = mysqli_fetch_array($res)){
	$nomeDoUsuario = $rsUsuario['nome'];
	$nivelUsuario = $rsUsuario['nomeNivel'];
}

$result = mysqli_query($con, "SELECT * FROM tbl_usuario WHERE usuario = '$usuario' AND senha= '$senha' AND status = 1");

if(mysqli_num_rows ($result) > 0 )
{
$_SESSION['usuario'] = $usuario;
$_SESSION['senha'] = $senha;
$_SESSION['nomeDoUsuario'] = $nomeDoUsuario;
$_SESSION['nivelUsuario'] = $nivelUsuario;
header('location:cms/home-cms.php');
}
else{
    unset ($_SESSION['usuario']);
    unset ($_SESSION['senha']);
    unset ($_SESSION['nomeDoUsuario']);
    unset ($_SESSION['nivelUsuario']);
    header('location:index.php');
     
    }
 
?>