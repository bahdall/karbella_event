<div class="clearfix col1-4 photography">
    <a href="<?php echo $data->getViewUrl() ?>" title="<?php echo $data->title ?>">
        <figure class="images">
            <?php if($data->images): ?>
                <img src="<?php echo $data->images[0]->getUrl('300x280','adaptiveResize') ?>" alt="<?php echo $data->short_description ?><span><?php echo $data->title ?></span><i>→</i>" class="slip" />
            <?php endif; ?>
        </figure>
    </a>
</div>