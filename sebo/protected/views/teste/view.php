<?php

$this->breadcrumbs=array(
	'Testes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Teste', 'url'=>array('index')),
	array('label'=>'Create Teste', 'url'=>array('create')),
	array('label'=>'Update Teste', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Teste', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Teste', 'url'=>array('admin')),
);
?>

<h1>View Teste #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'descricao',
		'ok',
	),
)); ?>
