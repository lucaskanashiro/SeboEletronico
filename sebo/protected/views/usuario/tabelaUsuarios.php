<html>
<head>

</head>

<body>
<div id="mainmenu">
<?php $this->widget('zii.widgets.CMenu',array(
'items'=>array(
array('label'=>'Home', 'url'=>array('/site/index')),
array('label'=>'Alterar Cadastro', 'url'=>array('/usuario/ALTERAAAAAAAA')),
array('label'=>'Excluir Cadastro', 'url'=>array('/usuario/EXCLUIIIIIIR')),
array('label'=>'Logout ', 'url'=>array('/site/logout'), 'visible'=>Yii::app()->user)
),
)); ?>
</div>

<br/>
<br/>


<img src="<?php echo Yii::app()->request->baseUrl; ?>/img/sejaBemVindo.jpg" class="img"/>


</body>
</html>