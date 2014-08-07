<?php
/* @var $this ReadersController */
/* @var $model Reader */

$this->breadcrumbs=array(
    'Читатели'=>array('admin'),
	'Создание',
);
?>

<h1>Создание нового читателя</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>