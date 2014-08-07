<?php
/* @var $this ReadersController */
/* @var $model Reader */

$this->breadcrumbs=array(
	'Читатели'=>array('admin'),
	$model->name,
);

?>

<h1>Просмотр читателя #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'time_updated:datetime',
		'time_created:datetime',
	),
)); ?>
