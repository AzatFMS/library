<?php
/* @var $this BooksController */
/* @var $model Book */

$this->breadcrumbs = array(
    'Книги',
);
?>
<h1>Отчёт №3</h1>
<h3>Вывод пяти случайных книг</h3>
<p>Тут я понимаю топорный вариант, но нет уникальности айдишников. Что-то я не нашёл красивого решения.</p>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'book-grid',
    'dataProvider' => $model->getRandom(),
    'filter' => $model,
    'columns' => array(
        'id',
        'name',
        array(
            'class' => 'CButtonColumn',
        ),
    ),
)); ?>
