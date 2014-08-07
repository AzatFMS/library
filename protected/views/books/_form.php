<?php
/* @var $this BooksController */
/* @var $model Book */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'book-form',
        'enableAjaxValidation' => false,
    )); ?>


    <div class="row">
        <?php echo $form->labelEx($model, 'name'); ?>
        <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 500)); ?>
        <?php echo $form->error($model, 'name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'readers'); ?>
        <?php echo $form->dropDownList($model, 'readers_data',
            CHtml::listData(Reader::model()->findAll(['order' => 'name']), 'id', 'name'),
            array('multiple' => 'multiple')); ?>
        <?php echo $form->error($model, 'readers_data'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'authors'); ?>
        <?php echo $form->dropDownList($model, 'authors_data',
            CHtml::listData(Author::model()->findAll(['order' => 'name']), 'id', 'name'),
            array('multiple' => 'multiple')); ?>
        <?php echo $form->error($model, 'authors_data'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => 'btn-blue']); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->