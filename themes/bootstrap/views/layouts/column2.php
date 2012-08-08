<?php $this->beginContent('//layouts/main'); ?>
<div class="row-fluid">
    <div class="span10">
        <?= $content; ?>
    </div>
    <div class="span2">
        <?php
            if(isset($this->menu)) {
                $this->widget('bootstrap.widgets.BootMenu', array(
                    'items'=>$this->menu,
                    'type' => 'list',
                    'htmlOptions'=>array('class'=>'operations'),
                ));
            }
        ?>
    </div>
</div>
<?php $this->endContent(); ?>