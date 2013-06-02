<?php

$this->breadcrumbs=array(
	'Testes',
);

$this->menu=array(
	array('label'=>'Create Teste', 'url'=>array('create')),
	array('label'=>'Manage Teste', 'url'=>array('admin')),
);
?>

<h1>Testes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
