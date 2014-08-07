<?php
/* @var $this BooksController */
/* @var $model Book */

$this->breadcrumbs=array(
    'Книги' => array('admin'),
	$model->name=>array('view','id'=>$model->id),
	'Редактирование',
);
?>

<h1>Изменение книги #<?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>