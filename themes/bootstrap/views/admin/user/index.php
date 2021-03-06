<?php
$this->breadcrumbs=array(
	UserModule::t("Users"),
);
if(UserModule::isAdmin()) {
	$this->layout='//layouts/column2';
	$this->menu=array(
        array('label'=>UserModule::t('Actions'), 'header'),
	    array('label'=>UserModule::t('List User'), 'url'=>array('/admin/user'), 'active' => true),
        array('label'=>UserModule::t('Manage Users'), 'url'=>array('/admin/user/manage')),
        array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('profileField/admin')),
	);
}
?>
<div class="row-fluid">
    <div class="span12">
        <h1><?php echo UserModule::t("List User"); ?></h1>

        <?php $this->widget('bootstrap.widgets.BootGridView', array(
            'dataProvider'=>$dataProvider,
            'columns'=>array(
                array(
                    'name' => 'username',
                    'type'=>'raw',
                    'value' => 'CHtml::link(CHtml::encode($data->username),array("user/view","id"=>$data->id))',
                ),
                'create_at',
                'lastvisit_at',
            ),
        )); ?>
    </div>
</div>
