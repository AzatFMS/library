<?php
/* @var $this AuthorsController */
/* @var $model Author */

$this->breadcrumbs=array(
    'Авторы'=>array('admin'),
	$model->name=>array('view','id'=>$model->id),
	'Редактирование',
);
?>

<h1>Редактировнаие автора #<?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>