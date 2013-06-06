<?php
    $id = $_REQUEST['id'];
    if(empty($id)){
            UsuarioController::actionLista();
            exit;
        }
    $usuario = UsuarioController::actionChecaCadastroId($id);
    
    ?>
<! DOCTYPE html>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style2.css" type="text/css" media="all">
        
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
    
    <table class="insr" >
 
      
        <td class="titlein"> <h5>Usuários Cadastrados</h5></td>
   
        
  
	  <?php 
          
         
          
            foreach($usuario as $k => $v) {
                                      
                    ?>
                <tr>
                    <td> <h4>Nome:</h4> <h2><?php echo $v['nome'];?></h2></td>
                </tr>
                <tr>
                    <td> <h4> Email: </h4><h2><?php echo $v['email'];?></h2></td>
                </tr>
                <tr>
                    <td> <h4> Telefone: </h4><h2><?php echo $v['telefone'];?></h2></td>
                </tr>
          <?php
                  }?>
    </table>
</body>
</html>