<?php
$this->breadcrumbs=array(
	UserModule::t('Users')=>array('/user'),
	UserModule::t('Manage'),
);

$this->menu=array(
    array('label'=>UserModule::t('Actions'), 'header'),    
    array('label'=>UserModule::t('List User'), 'url'=>array('/admin/user')),
    array('label'=>UserModule::t('Manage Users'), 'url'=>array('/admin/user/manage'), 'active' => true),
    array('label'=>UserModule::t('Create User'), 'url'=>array('/admin/user/create'), 'icon' => 'empty'),
    array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('profileField/admin')),
);

?>
<div class="row-fluid">
    <div class="span12">
        <h1><?php echo UserModule::t("Manage Users");?></h1>

        <?php $this->widget('bootstrap.widgets.BootGridView', array(
            'id'=>'user-grid',
            'dataProvider'=>$model->search(),
            'filter'=>$model,
            'columns'=>array(
                array(
                    'name' => 'id',
                    'type'=>'raw',
                    'value' => 'CHtml::link(CHtml::encode($data->id),array("admin/update","id"=>$data->id))',
                ),
                array(
                    'name' => 'username',
                    'type'=>'raw',
                    'value' => 'CHtml::link(UHtml::markSearch($data,"username"),array("admin/view","id"=>$data->id))',
                ),
                array(
                    'name'=>'email',
                    'type'=>'raw',
                    'value'=>'CHtml::link(UHtml::markSearch($data,"email"), "mailto:".$data->email)',
                ),
                'create_at',
                'lastvisit_at',
                array(
                    'name'=>'superuser',
                    'value'=>'User::itemAlias("AdminStatus",$data->superuser)',
                    'filter'=>User::itemAlias("AdminStatus"),
                ),
                array(
                    'name'=>'status',
                    'value'=>'User::itemAlias("UserStatus",$data->status)',
                    'filter' => User::itemAlias("UserStatus"),
                ),
                array(
                    'class'=>'bootstrap.widgets.BootButtonColumn',
                ),
            ),
        )); ?>
    </div>
</div>

