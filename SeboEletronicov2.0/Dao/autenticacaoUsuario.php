<?php
$host = "localhost";
$user = "root";
$pass = "";
$banco = "sebo eletronico";
$conexao = mysql($host, $user, $pass) or die(mysql_error());
mysql_select_db($banco) or die(mysql_error());
?>

<html>
    <head>
        <title></tittle>
        <script type="text/javascript">
        function loginsuccessfully(){
            setTimeout("window.location='indexUsuario.php'", 5000);
        }
        function loginfailed(){
            setTimeout("window.location='login.php'", 5000);
        }
        </script>
    </head>
    <body>
<?php
$email = $_POST['email'];
$senha = $_POST['senha'];
$sql = mysql_query("SELECT * FROM usuario WHERE email_usuario = '$email' and senha_usuario = '$senha'") or die(mysql_error());
$row = mysql_num_rows($sql);
if($row>0){
    session_start();
    $_SESSION['email']=$_POST['email'];
    $_SESSION['senha']=$_POST['senha'];
    echo "<center>Seja bem vindo ao SEBO Eletrônico!</center>";
    echo"<script>loginsuccessfully()</script>";
}else{
    echo "<center>Email de usuario ou senha invalido, tente novamente!</center>";
    echo "<script>loginfailed()</script>"; 
}
?>
    </body>
</html>
