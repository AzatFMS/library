<?php
/* @var $this AuthorsController */
/* @var $model Author */

$this->breadcrumbs=array(
    'Авторы'=>array('admin'),
	$model->name,
);
?>

<h1>Просмотр автора #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'time_updated:datetime',
		'time_created:datetime',
	),
)); ?>
