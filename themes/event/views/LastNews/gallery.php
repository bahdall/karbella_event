<?php foreach($news as $item): ?>

    <div class="element clearfix col1-3 gallery photography">
        <a href="<?php echo $item->getViewUrl() ?>" title="<?php echo $item->title ?>">
            <figure class="images">
                <?php if($item->mainImage): ?>
                    <img src="<?php echo $item->mainImage->getUrl('300x280','cropFromCenter') ?>" alt="<?php echo $item->short_description ?><span><?php echo $item->title ?></span><i>→</i>" class="slip" />
                <?php endif; ?>
            </figure>
        </a>
    </div>

<?php endforeach; ?>
