<?php
    
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
                                array('label'=>'Alterar', 'url'=>array('/usuario/altera')),
				array('label'=>'Deletar', 'url'=>array('/usuario/deleta'), 'visible'=>Yii::app()->user),
				array('label'=>'Pesquisar', 'url'=>array('/usuario/lista'), 'visible'=>Yii::app()->user)
			),
		)); ?>
	</div>
    
    <br/>
    <br/>
    <br/>
    
    <form  name="Insere Dados" action="<?php echo Yii::app()->request->baseUrl; ?>/index.php/usuario/checaCadastro" method="post" class="formu">
        
                <table class='insr'>

                <tr>
                    <th class='titlein' > <h5>Confirmar Informações</h5></th>
                </tr>
                
                <tr>
                    <td > 
                        <h4> E-mail: <input type="text" name="email"/></h4>
                    </td>
                </tr>
                
                <tr>
                    <td > 
                        <h4> Senha: <input type="password" name="senha"/></h4>
                    </td>
                </tr>
                
                <th>
                    <input type="submit" name='Enviar' value="ENVIAR" title='Enviar dados' />
                    <input type="reset" name='Limpar' value="LIMPAR DADOS" title='Limpar dados' /> 
                </th>

                </table>    
        
    </form>
    
    
</body>


</html>