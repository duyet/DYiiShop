<?php
$this->pageTitle = Yii::app()->name . ' - ' . Yii::t('manufacturers', 'Manufacturers');
$this->breadcrumbs = array(
    Yii::t('manufacturers', 'Manufacturers'),
);
?>

<div class="row-fluid">
    <div class="span9"><h1><i class="icon-building"></i>&nbsp;<?php echo Yii::t('manufacturers', 'Manufacturers'); ?></h1></div>
    <div class="span2">
        <div class="btn-group">
            <a class="btn btn-primary" href="<?php echo $this->createUrl('create'); ?>"><?php echo Yii::t('common', 'Insert'); ?></a>
            <a id="btnDeleteAll" class="btn btn-danger"><?php echo Yii::t('common', 'Delete'); ?></a>
        </div>
    </div>
</div>

<br />

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th style="width: 1px;"><?php echo CHtml::checkBox('checkall', false); ?></th>
            <th><?php echo Yii::t('manufacturers', 'Manufacturer Name'); ?></th>
            <th style="width: 80px;"><?php echo Yii::t('manufacturers', 'Sort Order'); ?></th>
            <th style="width: 80px;"><?php echo Yii::t('manufacturers', 'Action'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($manufacturers as $manufacturer): ?>
            <tr>
                <td><?php echo CHtml::checkBox('selected[]', false, array('value'=>$manufacturer->manufacturer_id)); ?></td>
                <td><?php echo $manufacturer->name; ?></td>
                <td><?php echo $manufacturer->sort_order; ?></td>
                <td><a class="btn btn-success btn-mini" href="<?php echo $this->createUrl('update', array('id'=>$manufacturer->manufacturer_id)); ?>">Edit</button></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#btnDeleteAll').on('click', function(){   
            if(confirm('<?php echo Yii::t('common', 'Delete/Uninstall cannot be undone! Are you sure you want to do this?'); ?>')){
                var ids = $('input[name="selected[]"]').map(function(){
                    return this.checked ? this.value : null;
                }).get();

                document.location = '<?php echo $this->createUrl('delete'); ?>/?ids=' + ids;
            }
        });
    });
</script>