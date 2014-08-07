<?php
/* @var $this AuthorsController */
/* @var $model Author */

$this->breadcrumbs=array(
	'Авторы'=>array('admin'),
	'Создание',
);
?>

<h1>Создание нового автора</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>