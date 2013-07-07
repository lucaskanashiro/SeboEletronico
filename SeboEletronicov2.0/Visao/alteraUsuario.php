<?php
include '../Controle/UsuarioControlador.php';

    $id = $_REQUEST['idPessoa'];
    $cadastro = UsuarioControlador::checaCadastroId($id);
    $idSenha = $cadastro[0]['senha_id'];
    $senhaFinal = UsuarioControlador::checaSenhaId($idSenha);
    ?>
<!DOCTYPE HTML>
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
       <button class="button" onclick="">Sair</button>
       
   </div>
   <div id="mainmenu">
       
       <button class="button" onclick="cadastra();">Cadastrar</button>
       <button class="button" onclick="altera();">Alterar</button>       
       <button class="button" onclick="deleta();">Deletar</button>   
       
       
   </div>
    
    <br/>
    <br/>
    <br/>
    
    
    <form  name="Insere Dados" action="http://localhost/SeboEletronicov2.0/Utilidades/RecebeForm.php" method="post" class="formu">
        
                <table class='insr'>

                <tr>
                    <th class='titlein' > <h5>Aletrar Cadastro</h5></th>
                </tr>
                
                <tr> 
                    <td>
                        <h2> Nome: <input type="text" name="nome" value="<?php echo $cadastro[0]['nome']?>"/></h2> 
                    </td>
                </tr>
        
                <tr>
                    <td > 
                        <h4> E-mail: <input type="text" name="email" value="<?php echo $cadastro[0]['email']?>"/></h4>
                    </td>
                </tr>
                
                <tr> 
                    <td>
                        <h6> Telefone: <input type="text" name="telefone" value="<?php echo $cadastro[0]['telefone']?>"/></h6> 
                    </td>
                </tr>

                <tr>              
                    <td>
                        <h4> Senha: <input type="password" name="senha[]" value="<?php echo $senhaFinal[0]['codigo_senha']?>"/></h4> <p>
                    </td>    
                </tr>

                <tr>              
                    <td>
                        <h3> Confirmar Senha: <input type="password" name="senha[]" value="<?php echo $senhaFinal[0]['codigo_senha']?>"/></h3> <p>
                    </td>    
                </tr>

                <th>
                    <input type="hidden" name="tipo" value="alterar"/>
                    <input type="hidden" name="id_pessoa" value="<?php echo $cadastro[0]['id_pessoa'] ?>" />
                    <input type="submit" name='Enviar' value="ENVIAR" title='Enviar dados' />
                    <input type="reset" name='Limpar' value="LIMPAR DADOS" title='Limpar dados' /> 
                </th>

                </table>    
        
    </form>
    
    
</body>


</html>