<?php
/* @var $this TesteController */
/* @var $model Teste */

$this->breadcrumbs=array(
	'Testes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Teste', 'url'=>array('index')),
	array('label'=>'Manage Teste', 'url'=>array('admin')),
);
?>

<h1>Create Teste</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>