<?php
/* @var $this BooksController */
/* @var $model Book */

$this->breadcrumbs=array(
    'Книги' => array('admin'),
	$model->name,
);

?>

<h1>Просмотр книги #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'time_updated:datetime',
		'time_created:datetime',
        'readersString',
        'authorsString',
	),
)); ?>
