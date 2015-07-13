
<script>
	jQuery(window).bind("load", function(){
		jQuery('.sliphover-container').sliphover({
			target: '.sliphover-item',
			caption: 'data-caption'
		});
	});
</script>

<?php

/**
 * View Event
 * @var Event $model
 */

// Set meta tags
$this->pageTitle       = ($model->meta_title) ? $model->meta_title : $model->title;
$this->pageKeywords    = $model->meta_keywords;
$this->pageDescription = $model->meta_description;

?>
<div class="element clearfix col4-3 home grey sliphover-container" style="padding: 25px 35px;" >
	<h2><?php echo $model->title; ?></h2>
	<p>
		<?php echo $model->full_description; ?>
	</p>

	<?php if($model->images): ?>
		<?php foreach($model->images as $image): ?>

			<div class="clearfix col1-1 e-photo" >
				<a href="<?php echo $image->getUrl("1000x1000") ?>" data-title="<?php echo $model->title; ?>" data-fancybox-group="group1" class="popup">
					<figure class="images gallery">
						<img class="sliphover-item"
							 src="<?php echo $image->getUrl("200x200",'adaptiveResize') ?>"
							 data-caption="<img src='<?php echo Yii::app()->theme->baseUrl ?>/assets/images/bar-arc-photo.png' />"
							 alt="<img src='<?php echo Yii::app()->theme->baseUrl ?>/assets/images/Magnifier_64.png' />"

						/>
					</figure>
				</a>
			</div>

		<?php endforeach; ?>
	<?php endif; ?>
</div>
