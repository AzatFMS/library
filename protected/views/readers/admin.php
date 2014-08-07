<?php
/* @var $this ReadersController */
/* @var $model Reader */

$this->breadcrumbs=array(
	'Читатели'
);
?>

<h1>Читатели</h1>
<p>
    <?php echo CHtml::link('Добавить', ['create'], ['class' => 'btn-blue']); ?>
</p>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'reader-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
