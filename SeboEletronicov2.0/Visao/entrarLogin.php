<html>
<head>	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="http://localhost/SeboEletronicov2.0/Visao/css/UsuarioStyle.css" type="text/css" media="all">
        <link rel="stylesheet" href="http://localhost/SeboEletronicov2.0/Visao/css/main.css" type="text/css" media="all">
        <link rel="shortcut icon" href="http://localhost/SeboEletronicov2.0/Visao/img/android.ico">
        <script src="http://localhost/SeboEletronicov2.0/Utilidades/Redireciona.js"></script> 
        <title>Sebo Eletrônico</title>
        
</head>
<body>
    <div id="header">
		<div id="logo"><img src="http://localhost/SeboEletronicov2.0/Visao/img/sebo_header.png" class="imgHeader"/></div>
    </div>
   
   <div id="mainmenu">
       
       <button class="button" onclick="home();">Home</button>
       <button class="button" onclick="login();">Login</button>
       
   </div> 
    
    <br/>
    <br/>
    <br/>

        <form name="loginform" method="post" action="http://localhost/SeboEletronicov2.0/Dao/autenticacaoUsuario.php">
            <table class='insr'>

                <tr>
                    <th class='titlein' > <h5>Login do Usuário</h5></th>
                </tr>
                
                <tr> 
                    <td>
                        <h4> E-mail: <input type="text" name="email"/></h4> 
                    </td>
                </tr>
                <tr> 
                    <td>
                        <h4> Senha: <input type="password" name="senha"/></h4> 
                    </td>
                </tr>
                <th>
                    <input type="submit" value="Entrar" /><br><br>
                    <a href="cadastrarUsuario.php">Cadastre-se</a>
                </th>
            </table>
        </form>
    
</html>