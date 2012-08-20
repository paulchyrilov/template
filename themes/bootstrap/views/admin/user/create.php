<?php
$this->breadcrumbs=array(
	UserModule::t('Users')=>array('admin'),
	UserModule::t('Create'),
);

$this->menu=array(
    array('label'=>UserModule::t('Actions'), 'header'),
    array('label'=>UserModule::t('List User'), 'url'=>array('/admin/user')),
    array('label'=>UserModule::t('Manage Users'), 'url'=>array('/admin/user/manage')),
    array('label'=>UserModule::t('Create User'), 'url'=>array('/admin/user/create'), 'icon' => 'empty', 'active' => true),
    array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('profileField/admin')),
);
?>
<div class="row-fluid">
    <div class="span12">
        <h1><?php echo UserModule::t("Create User"); ?></h1>

        <?= $this->renderPartial('_form', array('model'=>$model,'profile'=>$profile));?>
    </div>
</div>
