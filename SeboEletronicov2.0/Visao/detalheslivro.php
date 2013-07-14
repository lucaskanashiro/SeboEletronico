<!DOCTYPE HTML>
<html>
<head>	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="http://localhost/SeboEletronicov2.0/Visao/css/UsuarioStyle.css" type="text/css" media="all">
        <link rel="stylesheet" href="http://localhost/SeboEletronicov2.0/Visao/css/main.css" type="text/css" media="all">
        <link rel="shortcut icon" href="http://localhost/SeboEletronicov2.0/Visao/img/android.ico">
        <script src="http://localhost/SeboEletronicov2.0/Utilidades/Redireciona.js"></script> 
        
    <title>Sebo Eletronico</title>
    
</head>
<body>
	<?php
		$_POST['mural'];			
		$_POST['nome_comprador'];
		$_POST ['id_livro'];
                $mural = $_POST['mural'];
		//$nome_comprador = $_POST['nome_comprador'];
			
                include "..\Utilidades\ConexaoComBanco.php";
                if(!$bd) die ("<h1>Falha no bd </h1>");

                //Acessar Informações do comprador
                $id_livro = $_POST['id_livro'];

                $email_usuario = $_POST ["email_usuario"];

                $email_usuario = "joao@hot.com";
                $strSQL4 = "SELECT * FROM usuario WHERE email_usuario = '$email_usuario' ";

                $rs4 = mysql_query($strSQL4);

                while($row = mysql_fetch_array($rs4)) {
                    $nome_comprador = $row['nome_usuario'];
                }
                
                $insere = mysql_query("INSERT INTO mural (texto,nome_pergunta,id_livro) VALUES ('$mural', '$nome_comprador', '$id_livro')");

        ?>
  
    <div id="header">
		<div id="logo"><img src="http://localhost/SeboEletronicov2.0/Visao/img/sebo_header.png" class="imgHeader"/></div>
    </div>
   
   <div id="mainmenu">
       
       <button class="button" onclick="home();">Home</button>
       <button class="button" onclick="user();">Usuario</button>
       <button class="button" onclick="livro();">Livro</button>
       <button class="button" onclick="login();">Login</button>
       
   </div>
   
 
 
 
 <?php
   
   include "..\Utilidades\ConexaoComBanco.php";
	if(!$bd) die ("<h1>Falha no bd </h1>");
   
  //Acessar Informações do comprador
  
   
  $email_usuario = $_POST ["email_usuario"];
  
  $email_usuario = "joao@hot.com";
  $strSQL2 = "SELECT * FROM usuario WHERE email_usuario = '$email_usuario' ";
  
   $rs2 = mysql_query($strSQL2);
		
		while($row = mysql_fetch_array($rs2)) {
	   
		$nome_comprador = $row['nome_usuario'] . "<br />";
		$tel_comprador =  $row['telefone_usuario'] . "<br />";		
		}
 
 
 
 
 
  //Acessando informações do livro escolhido
   
  $id_livro = $_POST["id_livro"];
 
 	$id_livro = 1;
 
 $strSQL = "SELECT * FROM livro WHERE id_livro = '$id_livro' ";
 
 $rs = mysql_query($strSQL);
		
		while($row = mysql_fetch_array($rs)) {
	   
		$titulo2 = $row['titulo_livro'] . "<br />";
		$estado = $row['estado_conserv'] . "<br />";
 		$editora = $row ['editora'] . "<br />"; 
		$autor = $row ['autor'] . "<br />";
		$descricao = $row ['descricao_livro'] . "<br />";
		$id_dono = $row['id_dono'] . "<br />";
		}

  
  //Exibir 
   echo '<font color = "white"> <h1>' ;
   echo $titulo2;
   echo '</h1> </font><br /><br />' ;
  
  
   
   echo'<font size="+2" color ="white">Autor: '; 
   echo $autor;
   echo'</font><br />';
   
   echo'<font size="+2" color ="white">Editora: ';
   echo $editora;
   echo'</font><br />';
   
   
   echo'<font size="+2" color ="white">Descricao: ';
   echo $descricao;
   echo'</font><br /><br />';
   
   ?>
   <?php echo $id_livro; ?>
   <form name="enviarpergunta" method="post" action="detalheslivro.php">     
   <br />
   <textarea name="mural" value="mural" rows="15" cols="85"></textarea>
   <input type="hidden" value="nome_comprador" name="nome_comprador">
   <input type="hidden" name="id_livro" value="<?php echo $id_livro; ?>">
   <input type="submit" value="Enviar" />  
   </form>
   
   
  <form name="comprarlivro" method="post" action="compralivro.php">
  
   <input type = "hidden" name="nome_comprador" value= "<?php echo $nome_comprador; ?>" >
   <input type="hidden" name="tel_comprador" value= " <?php echo $tel_comprador; ?>" >
   <input type="hidden" name="id_livro" value=" <?php echo $id_livro; ?>" >
   <input type="hidden" name="id_dono" value=" <?php echo $id_dono; ?>" >
     <input type="submit" value="Comprar" />
     <label for="pergunta"></label>
  </form>
 
 <br /><br /><br />
 
 	<?php
	
	include "..\Dao\conexao_bd.inc";
	if(!$bd) die ("<h1>Falha no bd </h1>");
	
		
	$strSQL3 = "SELECT * FROM mural WHERE id_livro = $id_livro " ;
						
			
		$rs3 = mysql_query($strSQL3);
		
		while($row3 = mysql_fetch_array($rs3)) {
	   
	   
		echo $row3['nome_pergunta'];
		echo " disse: ";
		echo $row3['texto'];
		echo " <br /> <br />";
		
	
	
                }
	?> 

</body>
</html>