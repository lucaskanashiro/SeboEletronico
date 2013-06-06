<?php
    $id = $_REQUEST['idPessoa'];
    if(empty($id)){
            UsuarioController::actionFEmail();
            exit;
        }
    $cadastro = UsuarioController::actionChecaCadastroId($id);
    $idSenha = $cadastro[0]['senha_id'];
    $senhaFinal = UsuarioController::actionChecaSenhaId($idSenha);
    ?>
<!DOCTYPE HTML>
<html>
<head>	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style2.css" type="text/css" media="all">
        
        
    <title>Alterar Cadastro</title>
      
</head>
<body>
    <div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Cadastrar', 'url'=>array('/usuario/cadastra')),
                                array('label'=>'Alterar', 'url'=>array('/usuario/femail')),
				array('label'=>'Deletar', 'url'=>array('/usuario/deleta'), 'visible'=>Yii::app()->user),
				array('label'=>'Pesquisar', 'url'=>array('/usuario/lista'), 'visible'=>Yii::app()->user)
			),
		)); ?>
	</div>
    
    <br/>
    <br/>
    <br/>
    
    
    <form  name="Insere Dados" action="<?php echo Yii::app()->request->baseUrl; ?>/index.php/usuario/AlterarCadastro" method="post" class="formu">
        
                <table class='insr'>

                <tr>
                    <th class='titlein' > <h5>Aletrar Cadastro</h5></th>
                </tr>
                
                <tr> 
                    <td>
                        <h4> Nome: <input type="text" name="nome" value="<?php echo $cadastro[0]['nome']?>"/></h4> 
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
                    <input type="hidden" name="id_pessoa" value="<?php echo $cadastro[0]['id_pessoa'] ?>" />
                    <input type="submit" name='Enviar' value="ENVIAR" title='Enviar dados' />
                    <input type="reset" name='Limpar' value="LIMPAR DADOS" title='Limpar dados' /> 
                </th>

                </table>    
        
    </form>
    
    
</body>


</html>