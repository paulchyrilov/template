<?php
$this->breadcrumbs=array(
	UserModule::t('Profile Fields')=>array('admin'),
	UserModule::t('Manage'),
);
$this->menu=array(
    array('label'=>UserModule::t('Actions'), 'header'),
    array('label'=>UserModule::t('List User'), 'url'=>array('/admin/user')),
    array('label'=>UserModule::t('Manage Users'), 'url'=>array('/admin/user/manage')),
    array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('profileField/admin'), 'active' => true),
    array('label'=>UserModule::t('Create Profile Field'), 'url'=>array('create'), 'icon' => 'empty'),
);

?>
<div class="row-fluid">
    <div class="span12">
        <h1><?php echo UserModule::t('Manage Profile Fields'); ?></h1>

        <?php $this->widget('bootstrap.widgets.BootGridView', array(
            'dataProvider'=>$model->search(),
            'filter'=>$model,
            'columns'=>array(
                'id',
                array(
                    'name'=>'varname',
                    'type'=>'raw',
                    'value'=>'UHtml::markSearch($data,"varname")',
                ),
                array(
                    'name'=>'title',
                    'value'=>'UserModule::t($data->title)',
                ),
                array(
                    'name'=>'field_type',
                    'value'=>'$data->field_type',
                    'filter'=>ProfileField::itemAlias("field_type"),
                ),
                'field_size',
                //'field_size_min',
                array(
                    'name'=>'required',
                    'value'=>'ProfileField::itemAlias("required",$data->required)',
                    'filter'=>ProfileField::itemAlias("required"),
                ),
                //'match',
                //'range',
                //'error_message',
                //'other_validator',
                //'default',
                'position',
                array(
                    'name'=>'visible',
                    'value'=>'ProfileField::itemAlias("visible",$data->visible)',
                    'filter'=>ProfileField::itemAlias("visible"),
                ),
                //*/
                array(
                    'class'=>'bootstrap.widgets.BootButtonColumn',
                ),
            ),
        )); ?>
    </div>
</div>
