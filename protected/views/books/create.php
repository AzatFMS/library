<?php
/* @var $this BooksController */
/* @var $model Book */

$this->breadcrumbs = array(
    'Книги' => array('admin'),
    'Создание',
);

?>
<h1>Создание новой книги</h1>
<?php $this->renderPartial('_form', array('model' => $model)); ?>