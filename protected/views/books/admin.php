<?php
/* @var $this BooksController */
/* @var $model Book */

$this->breadcrumbs = array(
    'Книги',
);
?>

<h1>Книги</h1>

<p>
    <?php echo CHtml::link('Добавить', ['create'], ['class' => 'btn-blue']); ?>
</p>
<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'book-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'name',
        array(
            'class' => 'CButtonColumn',
        ),
    ),
)); ?>
