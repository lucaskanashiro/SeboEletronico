<?php
include '../Utilidades/ConexaoComBanco.php';
?>

<html>
    <head>
        <title>Sebo Eletronico</title>
        <script type="text/javascript">
        function loginsuccessfully(){
            setTimeout("window.location='http://localhost/SeboEletronicov2.0/Visao/indexUsuario.php'",0);
        }
        function loginfailed(){
            setTimeout("window.location='http://localhost/SeboEletronicov2.0/Visao/login.php'",0);
        }
        </script>
    </head>
    <body>
<?php
$email = $_POST['email'];

$senha = $_POST['senha'];

$sql = mysql_query("SELECT * FROM usuario WHERE email_usuario = '".$email."'") or die(mysql_error());
$sql2 = mysql_query("SELECT * FROM senha WHERE codigo_senha ='".$senha."'");
$row = mysql_num_rows($sql);
$row2 = mysql_num_rows($sql2);
if($row == $row2){
    if($row>0){
        session_start();
        $_SESSION['email']=$_POST['email'];
        $_SESSION['senha']=$_POST['senha'];
        echo "<script>alert('Seja bem vindo ao SEBO Eletrônico!')</script>";
        echo"<script>loginsuccessfully()</script>";
    }else{
        echo "<script>alert('Email de usuario ou senha invalido, tente novamente!')</script>";
        echo "<script>loginfailed()</script>"; 
    }
}
?>
    </body>
</html>
