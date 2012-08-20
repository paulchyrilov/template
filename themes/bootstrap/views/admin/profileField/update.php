<?php
$this->breadcrumbs=array(
	UserModule::t('Profile Fields')=>array('admin'),
	$model->title=>array('view','id'=>$model->id),
	UserModule::t('Update'),
);
$this->menu=array(
    array('label'=>UserModule::t('Actions'), 'header'),
    array('label'=>UserModule::t('List User'), 'url'=>array('/admin/user')),
    array('label'=>UserModule::t('Manage Users'), 'url'=>array('/admin/user/manage')),
    array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('profileField/admin')),
    array('label'=>UserModule::t('View Profile Field'), 'url'=>array('view','id'=>$model->id), 'icon' => 'empty'),
    array('label'=>UserModule::t('Update Profile Field'), 'url'=>array('update','id'=>$model->id), 'icon' => 'empty', 'active' => true),
    array('label'=>UserModule::t('Delete Profile Field'), 'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>UserModule::t('Are you sure to delete this item?')), 'icon' => 'empty'),
);
?>
<div class="row-fluid">
    <div class="span12">
        <h1><?php echo UserModule::t('Update Profile Field ').$model->id; ?></h1>
        
        <?= $this->renderPartial('_form', array('model'=>$model)); ?>
    </div>
</div>