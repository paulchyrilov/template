<?php
$baseUrl = Yii::app()->request->baseUrl;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <?php if (isset($this->title)):?>
            <title><?=$this->title?></title>
        <?php endif;?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Le styles -->
        <style type="text/css">
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
        </style>

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Le fav and touch icons -->
        <link rel="shortcut icon" href="<?= $baseUrl; ?>/images/favicon.ico">
    </head>

    <body class="customized">
        <?php $this->widget('bootstrap.widgets.BootNavbar', array(
            'fixed'    => true,
            'fluid'    => true,
            'brand'    => 'Admin Panel',
            'brandUrl' => Yii::app()->createUrl('/admin'),
            'collapse' => false, // requires bootstrap-responsive.css
            'htmlOptions' => array('class' => 'navbar-fixed-top'),
            'items'    => array(
                array(
                    'class' => 'bootstrap.widgets.BootMenu',
                    'htmlOptions' => array('class' => 'pull-right main'),
                    'items' => array(
                        array('label'=>'Home', 'url'=>array('/site/index')),
                        array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
                        array('label'=>'Contact', 'url'=>array('/site/contact')),
                        array('url'=>Yii::app()->getModule('user')->loginUrl, 'label'=>Yii::app()->getModule('user')->t("Login"), 'visible'=>Yii::app()->user->isGuest),
                        array('url'=>Yii::app()->getModule('user')->registrationUrl, 'label'=>Yii::app()->getModule('user')->t("Register"), 'visible'=>Yii::app()->user->isGuest),
                        array('url'=>Yii::app()->getModule('user')->profileUrl, 'label'=>Yii::app()->getModule('user')->t("Profile"), 'visible'=>!Yii::app()->user->isGuest),
                        array('url'=>Yii::app()->getModule('user')->logoutUrl, 'label'=>Yii::app()->getModule('user')->t("Logout").' ('.Yii::app()->user->name.')', 'visible'=>!Yii::app()->user->isGuest),
                    ),
                ),
            ),
        )); ?>

        <div class="container-fluid">
            <?php $this->widget('bootstrap.widgets.BootAlert'); ?>

            <?php if(isset($this->breadcrumbs)) { ?>
                <?php $this->widget('bootstrap.widgets.BootBreadcrumbs', array(
                    'links'=>$this->breadcrumbs,
                )); ?><!-- breadcrumbs -->
            <?php } ?>

            <?= $content; ?>

            <hr>


        <?php $this->widget('bootstrap.widgets.BootNavbar', array(
            'fixed'    => 'bottom',
            'fluid'    => true,
            'brand'    => false,
            'htmlOptions' => array('id' => 'homeFooter'),
            'items'    => array(
                array(
                    'class' => 'bootstrap.widgets.BootMenu',
                    'items' => array(
                        array('label' => 'About', 'url' => array('/site/page', 'view'=>'about')),
                        array('label' => 'Contact', 'url' => array('/site/contact')),
                    )
                ),
            ),
        )); ?>

        </div> <!-- /container -->


    </body>
</html>
