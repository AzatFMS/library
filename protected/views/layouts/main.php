<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="language" content="en"/>

    <!-- blueprint CSS framework -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css"
          media="screen, projection"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css"
          media="print"/>
    <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css"
          media="screen, projection"/>
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css"/>

    <title><?php echo Yii::app()->name; ?></title>
</head>

<body>

<div class="container" id="page">

    <div id="header">
        <div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
    </div>
    <!-- header -->

    <div id="mainmenu">
        <?php $this->widget('zii.widgets.CMenu', array(
            'activeCssClass' => 'active',
            'activateParents' => true,
            'items' => array(
                array('label' => 'Главная', 'url' => array('site/index')),
                array('label' => 'Книги', 'url' => array('books/admin')),
                array('label' => 'Авторы', 'url' => array('authors/admin')),
                array('label' => 'Читатели', 'url' => array('readers/admin')),
                array('label' => 'Отчёт №1', 'url' => array('books/reading')),
                array('label' => 'Отчёт №2', 'url' => array('authors/reading')),
                array('label' => 'Отчёт №3', 'url' => array('books/random')),
            ),
        )); ?>
    </div>
    <!-- mainmenu -->

    <?php $this->widget('zii.widgets.CBreadcrumbs', array(
        'links' => $this->breadcrumbs,
    )); ?><!-- breadcrumbs -->

    <div class="container">
        <div id="content">
            <?php echo $content; ?>
        </div>
        <!-- content -->
    </div>

    <div id="footer">
        Copyright &copy; <?php echo date('Y'); ?> by Azat Gumerov.<br/>
        All Rights Reserved.<br/>
        <?php echo Yii::powered(); ?>
    </div>
    <!-- footer -->

</div>
<!-- page -->

</body>
</html>