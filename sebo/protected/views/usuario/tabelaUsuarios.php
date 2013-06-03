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
                                array('label'=>'Alterar', 'url'=>array('/usuario/altera')),
				array('label'=>'Deletar', 'url'=>array('/usuario/deleta'), 'visible'=>Yii::app()->user),
				array('label'=>'Pesquisar', 'url'=>array('/usuario/lista'), 'visible'=>Yii::app()->user)
			),
		)); ?>
	</div>
    
    <br/>
    <br/>
    <br/>
    
    <table class="mapaPerfil" >
 
      
        <td colspan='5' class='icon1'> <h2>Usuários Cadastrados</h2></td>
   
        
  
	  <?php foreach( UsuarioController::actionListaCadastros() as $k => $v) {
              
              if(confereData($v[data])){ 
                   if($v[tipo]==1){
                              
                    ?>
                <tr class="primeira"> 
                    <td class="linha1"> <h4><?php echo modificaData1($v[data]);?></h4></td>
                    <td title="Link" class="Link-green" class="linha1"> <h3> <a href="http://localhost/NoticiarioSala/upload/<?php echo $v[link];?>"><?php echo $v[link];?></a> </h3></td>
                    <td class="linha1" > <h3><?php echo $v[descricao];?></h3></td>
                    
                </tr><?php }else{ ?>
                
                    <tr class="primeira"> 
                    <td class="linha1"> <h4><?php echo modificaData1($v[data]);?></h4></td>
                    <td title="Link" class="Link-green" class="linha1"> <h3> <a href="http://<?php echo $v[link];?>"><?php echo $v[link];?></a> </h3></td>
                    <td class="linha1" > <h3><?php echo $v[descricao];?></h3></td>
                    
                </tr>
                    <?php
                }  
             } 
            }
         
    ?>
    
</body>
</html>