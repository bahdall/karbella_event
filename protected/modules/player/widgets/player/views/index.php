<?php
$assets = dirname(__FILE__).'/../assets';
$baseUrl = Yii::app()->assetManager->publish($assets);

$sounds = array();
foreach($player->files as $file)
{
    $sounds[] = array(
        'title' => $file->name,
        'mp3' => $file->getUrl(),
        'artist' => $player->name,
    );
}

$jsObject = CJavaScript::encode($sounds);

?>

<style>
    .audiojs .play-pause{
        width: 40px;
    }

    li.playing{
        color: #aaa;
        text-shadow: 1px 1px 0px rgba(255, 255, 255, 0.3);
    }

    li.playing:before {
        content: '♬';
        width: 14px;
        height: 14px;
        padding: 3px;
        line-height: 14px;
        margin: 0px;
        position: absolute;
        left: 0px;
        top: 6px;
        color: #FFF;
        font-size: 13px;
        z-index: 1000;
        text-shadow: 1px 1px 0px rgba(0, 0, 0, 0.2);
    }

    .playlist{
        margin-top: 12px;
        padding-left: 2px;
        list-style: none;
        width: 461px;
        max-height: 135px;
        overflow-y: auto;
        background: #494646;
    }

    .playlist li:after{
        height: 1px;
        content: " ";
        width: 415px;
        position: absolute;
        bottom: 0px;
        left: 18px;
        border-bottom: 1px solid #242423;
    }

    .playlist a{
        border-bottom: none;
    }

    .playlist a:hover , li.playing a{
        border-bottom: none;
        color: #fff;
    }
</style>


<script>
    $(function() {
        // Setup the player to autoplay the next track
        var a = audiojs.createAll({
            trackEnded: function() {
                var next = $('ol li.playing').next();
                if (!next.length) next = $('ol li').first();
                next.addClass('playing').siblings().removeClass('playing');
                audio.load($('a', next).attr('data-src'));
                audio.play();
            }
        });

        // Load in the first track
        var audio = a[0];
        first = $('ol a').attr('data-src');
        $('ol li').first().addClass('playing');
        audio.load(first);

        // Load in a track on click
        $('ol li').click(function(e) {
            e.preventDefault();
            $(this).addClass('playing').siblings().removeClass('playing');
            audio.load($('a', this).attr('data-src'));
            audio.play();
        });
        // Keyboard shortcuts
        $(document).keydown(function(e) {
            var unicode = e.charCode ? e.charCode : e.keyCode;
            // right arrow
            if (unicode == 39) {
                var next = $('li.playing').next();
                if (!next.length) next = $('ol li').first();
                next.click();
                // back arrow
            } else if (unicode == 37) {
                var prev = $('li.playing').prev();
                if (!prev.length) prev = $('ol li').last();
                prev.click();
                // spacebar
            } else if (unicode == 32) {
                audio.playPause();
            }
        })
    });
</script>


<div style="margin-bottom: 10px;">
    <image src="<?php echo $player->getImageUrl("100x100") ?>" style="float: left; margin: 0 16px 0px 0;" /> <h2><?php echo $player->name ?></h2>
</div>




<audio preload></audio>
<ol class="playlist" >
    <?php foreach($sounds as $sound): ?>
    <li style="background: #494646; padding: 3px 18px;position: relative;">
        <a href="#" data-src="<?php echo $sound['mp3'] ?>">
            <?php echo $sound['title'] ?>
        </a>
    </li>
    <?php endforeach; ?>

</ol>