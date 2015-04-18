<?php
$this->pageTitle = Yii::app()->name . ' - ' . Yii::t('taxRates', 'Tax Rates');
$this->breadcrumbs = array(
    Yii::t('taxRates', 'Tax Rates'),
);
?>

<div class="row-fluid">
    <div class="span9"><h1><i class="icon-sitemap"></i>&nbsp;<?php echo Yii::t('taxRates', 'Tax Rates'); ?></h1></div>
    <div class="span2">
        <div class="btn-group">
            <a href="<?php echo $this->createUrl('create'); ?>" class="btn btn-primary"><?php echo Yii::t('common', 'Insert'); ?></a>
            <a id="btnDeleteAll" class="btn btn-danger"><?php echo Yii::t('common', 'Delete'); ?></a>
        </div>
    </div>
</div>

<br />

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th style="width: 1px;"><?php echo CHtml::checkBox('checkall', false); ?></th>
            <th><?php echo Yii::t('taxRates', 'Tax Name'); ?></th>
            <th style="width: 150px;"><?php echo Yii::t('taxRates', 'Tax Rate'); ?></th>
            <th style="width: 150px;"><?php echo Yii::t('taxRates', 'Type'); ?></th>
            <th style="width: 150px;"><?php echo Yii::t('taxRates', 'Geo Zone'); ?></th>
            <th style="width: 150px;"><?php echo Yii::t('taxRates', 'Date Added'); ?></th>
            <th style="width: 150px;"><?php echo Yii::t('taxRates', 'Date Modified'); ?></th>
            <th style="width: 80px;"><?php echo Yii::t('taxRates', 'Action'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($taxRates as $taxRate): ?>
        <tr>
            <td><?php echo CHtml::checkBox('selected[]', false, array('value'=>$taxRate->tax_rate_id)); ?></td>
            <td><?php echo $taxRate->name; ?></td>
            <td><?php echo $taxRate->rate; ?></td>
            <td><?php echo $taxRate->getType(); ?></td>
            <td><?php echo $taxRate->geoZone->name; ?></td>
            <td><?php echo $taxRate->getDateAdded(); ?></td>
            <td><?php echo $taxRate->getDateModified(); ?></td>
            <td><a class="btn btn-success btn-mini" href="<?php echo $this->createUrl('update', array('id'=>$taxRate->tax_rate_id)); ?>"><?php echo Yii::t('common', 'Edit'); ?></button></td>
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