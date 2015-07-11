<?php foreach($events as $event): ?>

    <div class="element  clearfix col1-3 home portfolio photography">
        <a href="<?php echo $event->getViewUrl() ?>" title="<?php echo $event->title ?>">
            <figure class="images">
                <?php if($event->images): ?>
                    <img src="<?php echo $event->images[0]->getUrl('300x280','cropFromCenter') ?>" alt="<?php echo $event->short_description ?><span><?php echo $event->title ?></span><i>→</i>" class="slip" />
                <?php endif; ?>
            </figure>
        </a>
    </div>

<?php endforeach; ?>


<div class="element  clearfix col1-3 home portfolio photography">
    <a href="<?php echo Yii::app()->createUrl("/events/events/list") ?>" title="" class="whole-tile">

        <div class="bottom">
            <p class="alignleft">Все события</p>
            <span class="arrow">→</span>
        </div>
    </a>
</div>