<?php
/* @var $this BooksController */
/* @var $model Book */

$this->breadcrumbs = array(
    'Книги',
);
?>
<h1>Отчёт №1</h1>
<h3>Книги , находящиеся на руках у читателей, и имеющие не менее трех со-авторов</h3>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'book-grid',
    'dataProvider' => $model->getBooksWithReadersAndAuthors(),
    'filter' => $model,
    'columns' => array(
        'id',
        'name',
        array(
            'class' => 'CButtonColumn',
        ),
    ),
)); ?>
