<?php
/* @var $this TesteController */
/* @var $model Teste */

$this->breadcrumbs=array(
	'Testes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Teste', 'url'=>array('index')),
	array('label'=>'Create Teste', 'url'=>array('create')),
	array('label'=>'View Teste', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Teste', 'url'=>array('admin')),
);
?>

<h1>Update Teste <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>