<?php
$this->breadcrumbs=array(
	UserModule::t('Profile Fields')=>array('admin'),
	UserModule::t($model->title),
);
$this->menu=array(
    array('label'=>UserModule::t('Actions'), 'header'),
    array('label'=>UserModule::t('List User'), 'url'=>array('/admin/user')),
    array('label'=>UserModule::t('Manage Users'), 'url'=>array('/admin/user/manage')),
    array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('profileField/admin')),
    array('label'=>UserModule::t('View Profile Field'), 'url'=>array('view','id'=>$model->id), 'icon' => 'empty', 'active' => true),
    array('label'=>UserModule::t('Update Profile Field'), 'url'=>array('update','id'=>$model->id), 'icon' => 'empty'),
    array('label'=>UserModule::t('Delete Profile Field'), 'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>UserModule::t('Are you sure to delete this item?')), 'icon' => 'empty'),
);
?>
<div class="row-fluid">
    <div class="span12">
        <h1><?php echo UserModule::t('View Profile Field #').$model->varname; ?></h1>

        <?php $this->widget('bootstrap.widgets.BootDetailView', array(
            'data'=>$model,
            'attributes'=>array(
                'id',
                'varname',
                'title',
                'field_type',
                'field_size',
                'field_size_min',
                'required',
                'match',
                'range',
                'error_message',
                'other_validator',
                'widget',
                'widgetparams',
                'default',
                'position',
                'visible',
            ),
        )); ?>
    </div>
</div>
