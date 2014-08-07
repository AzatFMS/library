<?php
/* @var $this ReadersController */
/* @var $model Reader */

$this->breadcrumbs=array(
    'Читатели'=>array('admin'),
	$model->name=>array('view','id'=>$model->id),
	'Редактирование',
);
?>

<h1>Изменение читателя #<?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>