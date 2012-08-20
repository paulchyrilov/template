<?php
$this->breadcrumbs=array(
	(UserModule::t('Users'))=>array('admin'),
	$model->username=>array('view','id'=>$model->id),
	(UserModule::t('Update')),
);
$this->menu=array(
    array('label'=>UserModule::t('Actions'), 'header'),
    array('label'=>UserModule::t('List User'), 'url'=>array('/admin/user')),
    array('label'=>UserModule::t('Manage Users'), 'url'=>array('/admin/user/manage')),
    array('label'=>UserModule::t('View User'), 'url'=>array('view','id'=>$model->id), 'icon' => 'empty'),
    array('label'=>UserModule::t('Update User'), 'url'=>array('update','id'=>$model->id), 'icon' => 'empty', 'active' => true),
    array('label'=>UserModule::t('Delete User'), 'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>UserModule::t('Are you sure to delete this item?')), 'icon' => 'empty'),
    array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('profileField/admin')),
);
?>

<h1><?php echo  UserModule::t('Update User')." ".$model->id; ?></h1>
<div class="row-fluid">
    <div class="span12">
        <?= $this->renderPartial('_form', array('model'=>$model,'profile'=>$profile));?>
    </div>
</div>
