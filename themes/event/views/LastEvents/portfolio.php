
<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$provider,
    'htmlOptions' => array(
        'class' => 'element clearfix grey col4-3 portfolio'
    ),
    'ajaxUpdate'=>true,
    'template'=>'{items} {pager}',
    'itemView'=>'_event',
    'itemsCssClass' => 'portfolio-items',
    'pagerCssClass' => 'clearfix portfolio-pagination',
    'pager' => array(
        'htmlOptions' => array(
            'class' => 'pager',
        ),
        'header' => false,
        'maxButtonCount' => 4,
        'lastPageCssClass' => 'hidden',
        'firstPageCssClass' => 'hidden',
        'nextPageLabel' => '<i class="icon-right-open-2"></i>',
        'prevPageLabel' => '<i class="icon-left-open-2"></i>',
    ),
));
?>
