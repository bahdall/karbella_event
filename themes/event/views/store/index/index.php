


<div class="element  clearfix col2-3 home about grey" style="position: absolute; left: 0px; top: 0px;">
	<?php $this->widget('application.modules.core.widgets.IncludeFile.IncludeFile',array('file' => 'about')) ?>
</div>


<?php $this->widget("application.modules.events.widgets.LastEvents.LastEvents",array(
	'count' => 3
)) ?>

<?php $this->widget("application.modules.pages.widgets.LastNews.LastNews",array(
	'count' => 3,
	'section_id' => 7,
)) ?>


<div class="element  clearfix col1-3 home grey">
	<?php $this->widget("application.modules.poll.widgets.poll.PollWidget",array(
		'poll_id' => 4,
	)) ?>
</div>



<div class="element  clearfix col21-3 home grey" >
	<?$this->widget('application.modules.player.widgets.player.PlayerWidget', array(
		'playlist_id' => 65
	))?>
</div>


<div class="element  clearfix col1-3 home contact grey">
	<?php $this->widget('application.modules.core.widgets.IncludeFile.IncludeFile',array('file' => 'address_block')) ?>
</div>



<?php $this->widget("application.modules.pages.widgets.LastNews.LastNews",array(
	'count' => 0,
	'section_id' => 13,
	'view' => 'gallery'
)) ?>



<div class="element clearfix col1-3 about hybrid" style="position: absolute; left: 903px; top: 562px; display: none;">
	<div class="images"> <img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/images/about02.jpg" alt="John Doe"> </div>
	<div class="elem-content">
		<p class="small">Founder</p>
		<h3>John Doe</h3>
		<div class="bottom">
			<p>"I have not failed. I've just found 10,000 ways that won't work."</p>
			<ul class="social-list clearfix">
				<li><a href="http://ppp-templates.de/hr/#" class="behance"></a></li>
				<li><a href="http://ppp-templates.de/hr/#" class="gplus"></a></li>
				<li><a href="http://ppp-templates.de/hr/#" class="twitter"></a></li>
				<li><a href="http://ppp-templates.de/hr/#" class="youtube"></a></li>
				<li><a href="http://ppp-templates.de/hr/#" class="xing"></a></li>
			</ul>
		</div>
	</div>
</div>
<div class="element clearfix col1-3 about hybrid" style="position: absolute; left: 602px; top: 843px; display: none;">
	<div class="images"> <img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/images/about01.jpg" alt="Mark Smith"> </div>
	<div class="elem-content">
		<p class="small">Designer</p>
		<h3>Mark Smith</h3>
		<div class="bottom">
			<p>"I have not failed. I've just found 10,000 ways that won't work."</p>
			<ul class="social-list clearfix">
				<li><a href="http://ppp-templates.de/hr/#" class="behance"></a></li>
				<li><a href="http://ppp-templates.de/hr/#" class="gplus"></a></li>
				<li><a href="http://ppp-templates.de/hr/#" class="twitter"></a></li>
				<li><a href="http://ppp-templates.de/hr/#" class="youtube"></a></li>
				<li><a href="http://ppp-templates.de/hr/#" class="xing"></a></li>
			</ul>
		</div>
	</div>
</div>
<div class="element  clearfix col1-3 grey about" style="position: absolute; left: 903px; top: 843px; display: none;"> <a href="http://player.vimeo.com/video/98330466?title=0&byline=0&portrait=0&color=ffffff=0&autoplay=1" data-title="Our Reel" class="video-popup whole-tile">
		<p class="small">Vimeo</p>
		<h3>Agency Reel 2015</h3>
		<div class="bottom">
			<div class="icons video"></div>
			<p class="alignleft">Play the Video</p>
			<span class="arrow">→</span></div>
	</a> </div>
<div class="element clearfix col1-3 about hybrid" style="position: absolute; left: 0px; top: 1124px; display: none;">
	<div class="images"> <img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/images/about03.jpg" alt="Jane McDonald"> </div>
	<div class="elem-content">
		<p class="small">Developer</p>
		<h3>Jane McDonald</h3>
		<div class="bottom">
			<p>"I have not failed. I've just found 10,000 ways that won't work."</p>
			<ul class="social-list clearfix">
				<li><a href="http://ppp-templates.de/hr/#" class="behance"></a></li>
				<li><a href="http://ppp-templates.de/hr/#" class="gplus"></a></li>
				<li><a href="http://ppp-templates.de/hr/#" class="twitter"></a></li>
				<li><a href="http://ppp-templates.de/hr/#" class="youtube"></a></li>
				<li><a href="http://ppp-templates.de/hr/#" class="xing"></a></li>
			</ul>
		</div>
	</div>
</div>



<div class="element  clearfix col1-3 about grey" style="position: absolute; left: 0px; top: 1405px; display: none;"> <a href="http://www.awfwwards.com/" data-title="" target="_blank" class="whole-tile">
		<p class="small">Awwwards</p>
		<h3>Best Website Award May 2015</h3>
		<div class="bottom">
			<div class="icons winner"></div>
			<p class="alignleft">Read More</p>
			<span class="arrow">→</span></div>
	</a> </div>






<div class="element  clearfix col2-3 contact auto" style="position: absolute; left: 0px; top: 2248px; display: none;">
	<div id="map"></div>
</div>


<div class="element clearfix col1-3 double contact" style="position: absolute; left: 602px; top: 2248px; display: none;">
	<div class="elem-content">
		<p class="small">Contact Form</p>
		<h3>Drop Us a Line</h3>
		<form class="form-part" method="post" action="http://ppp-templates.de/hr/contact.php" name="contactform" id="contactform" autocomplete="off">
			<input name="name" type="text" id="name" size="30" title="Name">
			<input name="email" type="text" id="email" size="30" title="Email">
			<textarea name="comments" cols="40" rows="3" id="comments" title="Tell us what you think!"></textarea>
			<div class="input-wrapper clearfix">
				<input type="submit" class="send-btn" value="Send" id="submit" name="Submit">
				<span id="message"></span></div>
		</form>
	</div>
</div>

<div class="element  clearfix col1-3 contact grey" style="position: absolute; left: 0px; top: 1686px; display: none;"> <a href="http://ppp-templates.de/hr/#" data-title="" class="whole-tile">
		<p class="small">Facebook</p>
		<h3>We Now Have 4000+ Followers</h3>
		<div class="bottom">
			<div class="icons like"></div>
			<p class="alignleft">Follow Us</p>
			<span class="arrow">→</span></div>
	</a> </div>


<div class="element  clearfix col1-3 double pricing auto" >
	<figure class="price-table">
		<div class="heading">
			<h3>Basic</h3>
		</div>
		<p class="price"><span>$</span>29</p>
		<p class="price-details">Free Support<br>
			Updates<br>
			Live Demo<br>
			15 Demos Included<br>
			Newsletter<br>
			Working Contact Form<br>
			<span class="line-through">Unlimited Domains</span></p>
		<a href="http://ppp-templates.de/hr/#" class="button">Sign Up</a> </figure>
</div>
<div class="element  clearfix col1-3 double pricing auto" style="position: absolute; left: 0px; top: 2810px; display: none;">
	<figure class="price-table">
		<div class="heading">
			<p class="small">Best Choice</p>
			<h3>Advanced</h3>
		</div>
		<p class="price"><span>$</span>89</p>
		<p class="price-details">Free Support<br>
			Updates<br>
			Live Demo<br>
			25 Demos Included<br>
			Newsletter<br>
			Working Contact Form<br>
			<span class="line-through">Unlimited Domains</span></p>
		<a href="http://ppp-templates.de/hr/#" class="button">Sign Up</a> </figure>
</div>



<div class="element  clearfix col1-3 double pricing auto" style="position: absolute; left: 0px; top: 3372px; display: none;">
	<figure class="price-table">
		<div class="heading">
			<h3>Ulitmate</h3>
		</div>
		<p class="price"><span>$</span>149</p>
		<p class="price-details">Free Support<br>
			Updates<br>
			Live Demo<br>
			50 Demos Included<br>
			Newsletter<br>
			Working Contact Form<br>
			Unlimited Domains</p>
		<a href="http://ppp-templates.de/hr/#" class="button">Sign Up</a> </figure>
</div>
<div class="element  clearfix col1-3 pricing" style="position: absolute; left: 301px; top: 3372px; display: none;">
	<figure class="images"> <img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/images/pic01.jpg" alt=""> </figure>
</div>
<div class="element  clearfix col1-3 pricing grey" style="position: absolute; left: 602px; top: 3372px; display: none;"> <a href="http://ppp-templates.de/hr/#contact" data-title="" class="whole-tile">
		<div class="icons chat"></div>
		<h4>Not finding the right deal or have any questions?</h4>
		<div class="bottom">
			<p class="alignleft">Send us an email</p>
			<span class="arrow">→</span></div>
	</a> </div>
<div class="element  clearfix col1-3 pricing" style="position: absolute; left: 903px; top: 3372px; display: none;">
	<figure class="images"> <img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/images/pic02.jpg" alt=""> </figure>
</div>
<div class="element  clearfix col1-3 pricing" style="position: absolute; left: 301px; top: 3653px; display: none;">
	<figure class="images"> <img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/images/pic03.jpg" alt=""> </figure>
</div>
