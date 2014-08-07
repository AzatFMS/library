<?php
/* @var $this AuthorsController */
/* @var $model Author */

$this->breadcrumbs=array(
	'Отчёт №2'
);
?>

<h1>Отчёт №2</h1>
<h3>Авторы, чьи книги в данный момент читает более трех читателей</h3>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'author-grid',
	'dataProvider'=>$model->getAuthorsWithReaders(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
	),
)); ?>
