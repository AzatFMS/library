<?php
/* @var $this AuthorsController */
/* @var $model Author */

$this->breadcrumbs=array(
	'Авторы'
);
?>

<h1>Авторы</h1>
<p>
    <?php echo CHtml::link('Добавить', ['create'], ['class' => 'btn-blue']); ?>
</p>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'author-grid',
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
