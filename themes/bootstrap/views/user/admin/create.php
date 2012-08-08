<?php
$this->breadcrumbs=array(
	UserModule::t('Users')=>array('admin'),
	UserModule::t('Create'),
);

$this->menu=array(
    array('label'=>UserModule::t('Manage Users'), 'url'=>array('admin')),
    array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('profileField/admin')),
    array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
);
?>
<div class="row-fluid">
    <div class="span12">
        <h1><?php echo UserModule::t("Create User"); ?></h1>

        <?= $this->renderPartial('_form', array('model'=>$model,'profile'=>$profile));?>
    </div>
</div>
