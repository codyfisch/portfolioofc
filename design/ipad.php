<?php
include_once '../inc/header.php';
?>
<link rel="stylesheet"
      type="text/css"
      href="../css/ipad-styles.css"
      media="all">

<div id="design">
    <div id="d1" class="box-round scale"></div>
    <div id="d2" class="box-round"></div>
    <div class="box-round"></div>
    <div class="box-round"></div>
    <div class="box-round"></div>
    <div class="box-round"></div>
</div>

<div id="test_space">

    <div class="box rotate1">
        <p>Yo.</p>
    </div>

    <div class="box popup1">
        <p>Yo, Yo!</p>
    </div>

    <div class="box pulsate">
        pulsing!
    </div>

    <div class="box scale">
        scaling!
    </div>


<!-- Video for Everybody, Kroc Camen of Camen Design -->
<video width="640" height="360" controls>
<!--	<source src="/portfolioofc/design/assets/Wildlife.iphone.MP4"  type="video/mp4" />-->
    <source src="/portfolioofc/design/assets/Wildlife.webmvp8.WEBM"  type="video/webm" />
	<source src="/portfolioofc/design/assets/Wildlife.theora.OGV"  type="video/ogg" />
	<object width="640" height="360" type="application/x-shockwave-flash" data="__FLASH__.SWF">
		<param name="movie" value="__FLASH__.SWF" />
		<param name="flashvars" value="controlbar=over&amp;image=__POSTER__.JPG&amp;file=__VIDEO__.MP4" />
		<img src="__VIDEO__.JPG" width="640" height="360" alt="__TITLE__"
		     title="No video playback capabilities, please download the video below" />
	</object>
</video>
<p>	<strong>Download Video:</strong>
	Closed Format:	<a href="__VIDEO__.MP4">"MP4"</a>
	Open Format:	<a href="__VIDEO__.OGV">"Ogg"</a>
</p>
<!--    <div class="videoplayer">-->
<!--        <div class="videocontainer">-->
<!--            <video controls>-->
<!--        <source src="/portfolioofc/design/assets/EvnJkn_01_AKIKO_(1280x720).iphone.MP4" type='video/mp4; codecs="avc1.42E01E, mp4a.40"'>-->
<!--    <source src="/portfolioofc/design/assets/EvnJkn.webmvp8.webm" type='video/webm; codec="VP8, vorbis"'>-->
<!--</video>-->
<!--    <video controls>-->
<!--    <source src="/portfolioofc/design/assets/Takashi Murakami.MP4" type='video/mp4; codecs="avc1.42E01E, mp4a.40"'>-->
<!--    <source src="/portfolioofc/design/assets/TakashiMurakami.webmvp8.webm" type='video/webm; codecs="VP8, vorbis"'>-->
<!--</video>-->
<!--    <video controls>-->
<!--    <source src="/portfolioofc/design/assets/YouTube - The Secret Of Kells - Promotional Trailer(4).iphone.MP4" type='video/mp4; codecs="avc1.42E01E, mp4a.40"'>-->
<!--    </video>-->
<!--    <video controls>-->
<!--    <source src="/portfolioofc/design/assets/Wildlife.iphone.MP4" type='video/mp4; codecs="avc1.42E01E, mp4a.40"'>-->
<!--    </video>-->
<!--    <video controls>-->
<!--    <source src="/portfolioofc/design/assets/Wonderful animation that explains how neurons work.iphone.MP4" type='video/mp4; codecs="avc1.42E01E, mp4a.40"'>-->
<!--    </video>-->
<!--        </div>-->
<!--    </div>-->
<!--    <p id="slide1_controls">-->
<!--	<span id="slide1-1">video 1</span>-->
<!--	<span id="slide1-2">video 2</span>-->
<!--	<span id="slide1-3">video 3</span>-->
<!--	<span id="slide1-4">video 4</span>-->
<!--	<span id="slide1-5">video 5</span>-->
<!--    </p>-->
<!--</div>-->




<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" ></script>
<!-- <script src="http://code.jquery.com/mobile/1.0a1/jquery.mobile-1.0a1.min.js"></script>-->
<script type="text/javascript" src="/portfolioofc/js/ipad-script.js"></script>
<?php
include_once '../inc/footer.php';
?>
 
