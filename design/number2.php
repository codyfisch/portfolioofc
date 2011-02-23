<?php
include_once '../inc/header.php';
?>
<style type="text/css">
    #page{
        background:none #383838;
    }
#logo a, #menu li a{
    color: #bbb;
}
#logo a:hover{
    color: #c6d1e3;
    text-shadow: 0 0 5px #c6d1e3;
}
#menu li a:hover{
    color: #ffcc00;
    text-shadow: 0 0 5px #ffcc00;
}
    nav.design {
    position: absolute;
    z-index: 4;
    top: -650px;
    left: 0;
    width: 15px;
    height: 270px;
    background: #222;
     -webkit-transition:all 0.4s ease-in-out;
	-moz-transition:all 0.4s ease-in-out;
	-o-transition:all 0.4s ease-in-out;
	transition:all 0.4s ease-in-out;
    overflow: hidden;
}

nav.design:hover{
    width: 100px;
    background: gray;
}

nav.design ul {
    margin: 10px 0;
    padding: 0;
}

nav.design ul li {
    list-style-type:none;
    padding: 0;
    margin:0;
}

nav.design ul li a {
    font-size: 2em;
    text-decoration: none;
    display: block;
    text-align: center;
    padding: 10px 30px;
}

nav.design ul li a:hover{
    background: #222;
}
</style>

<nav class="design">
    <ul>
        <li><a href="../">Back</a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
    </ul>
</nav>

<div id="design"></div>
<div id="num2"></div>

<a href="../design" class="design_back"><--Back</a>



<!--THIS WORKS!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
<video id="movie" width="640" height="360" controls>
        <source src="/portfolioofc/design/assets/Takashi Murakami.MP4" type='video/mp4; codecs="avc1.42E01E, mp4a.40"'>-->
<!--BELOW VIDEO WILL NOT WORK. IT MUST BE THE ENCODER THAT IS CAUSING THE PROBLEM!!-->
   <!--	<source src="/portfolioofc/design/assets/Wildlife.mp4">-->
    <source src="/portfolioofc/design/assets/Wildlife.webm"  type='video/webm; codecs="vp8, vorbis"'>
	<source src="/portfolioofc/design/assets/Wildlife.ogv"  type='video/ogg; codecs="theora, vorbis"'>
	<object width="640" height="360" type="application/x-shockwave-flash" data="__FLASH__.SWF">
		<param name="movie" value="__FLASH__.SWF" />
		<param name="flashvars" value="controlbar=over&amp;image=__POSTER__.JPG&amp;file=__VIDEO__.MP4" />
		<img src="__VIDEO__.JPG" width="640" height="360" alt="__TITLE__"
		     title="No video playback capabilities, please download the video below" />
	</object>
    <p>	<strong>Download Video:</strong>
	Closed Format:	<a href="__VIDEO__.MP4">"MP4"</a>
	Open Format:	<a href="__VIDEO__.OGV">"Ogg"</a>
</p>
</video>
<script> var v = document.getElementById("movie"); v.onclick = function() { if (v.paused) { v.play(); } else { v.pause(); } } </script>


<script type="text/javascript" src="/portfolioofc/js/raphael-1.5.2.min.js"></script>

<script type="text/javascript">


    var r = Raphael("canvas", 1020, 600);

    var Block = r.rect(0,300,150,150,10).attr({stroke: 'none', opacity: 0.8});

     for(var yellowBlock = 0; yellowBlock<6;yellowBlock+=1){
        var randX = yellowBlock* (Math.random());
        Block.clone().attr({fill: '#fed11c'}).animate({
            x: 100 + (200*randX)
//            y: 50*randX,
//            width: 200*randX,
//            height: 200*randX
        }, 2000, 'backOut')
    }
     for(var blueBlock = 0; blueBlock<6;blueBlock+=1){
        var randX = blueBlock* (Math.random());
        Block.clone().attr({fill: '#c6d1e3', height: 50, y: 50*randX}).animate({
            x: 100 + (200*randX)
//            y: 50*randX,
//            width: 200*randX,
//            height: 200*randX
        }, 2000, 'backOut')
    }

    var c = r.circle(100, 100, 50).attr({
        fill: "90-#383838-#f06",
        stroke: 'none'
    });

     for(var i = 0; i < 7; i+=1) {
    var multiplier = i*2;
    c.clone().translate(100*multiplier , 0);
     }

    for(var g = 0; g < 7; g+=1) {
    var multi = g*2;
        var s = Math.random() + 0.5;
    c.clone().translate(0, 100*multi).attr({
        scale: s
    })
     }


    var repeating = r.circle(400, 300, 100).attr({stroke: 'none', fill: '#f06'});

   var outer = r.path("m 200,200 c 27.6142,0 50,22.3858 50,50 0,27.6143 -22.3858,50.00002 -50,50.00002 -27.6142,0 -50,-22.38572 -50,-50.00002").attr({stroke:'red',fill:'none', 'stroke-width': 20,opacity: 0});
   var middle = r.path("m 200,280 c -16.5685,0 -30,-13.4314 -30,-30 0,-16.5685 13.4315,-30 30,-30 16.5685,0 30,13.4315 30,30").attr({stroke:'orange',fill:'none', 'stroke-width': 20,opacity: 0});
   var inner = r.circle(200,250,20).attr({stroke:'none',fill:'green',opacity: 0});
//   var inner = r.path("m 210,250 a 10,10 0 1 1 -20,0 10,10 0 1 1 20,0 z").attr({stroke:'none',fill:'green',opacity: 0});


    outer.animate({
        rotation: 320,
        opacity: 1
    },1000, 'backOut');

    middle.animate({
        rotation: 380,
        opacity: 1
    }, 1000, 'backOut');

    inner.animate({
        opacity: 1
    }, 1200);



    var j = Raphael("num2", 1020, 300);

    var fj = j.rect(100,100,100,100).attr({stroke: 'none'});

    for(var orangeBlock = 0; orangeBlock<10;orangeBlock+=1){
        var randX = orangeBlock* (Math.random() + 0.5);
        fj.clone().translate(60*randX, 0).attr({fill:'orange',stroke:'none',opacity: 0.4})
    }
    for(var greenBlock = 0; greenBlock<10;greenBlock+=1){
        var randX = greenBlock* (Math.random() + 0.5);
        fj.clone().translate(60*randX, 0).attr({fill:'green',stroke:'none',opacity: 0.4})
    }
    for(var blu = 0; blu<10;blu+=1){
        var randX = blu* (Math.random() + 0.5);
        fj.clone().translate(60*randX, 0).attr({fill:'blue',stroke:'none',opacity: 0.4})
    }

    var aBlock = j.rect(0, 200, 100, 100, 10).attr({stroke: 'none', opacity: 0.4});

    for(var wBlock = 0; wBlock<14;wBlock+=1){
        var randX = wBlock* (Math.random() - 0.2);
        aBlock.clone().attr({fill: 'white'}).animate({
            x: 100*randX
        }, 3000, '<>')
    }
    for(var rBlock = 0; rBlock<14;rBlock+=1){
        var randX = rBlock* (Math.random() - 0.2);
        aBlock.clone().attr({fill: 'red'}).animate({
            x: 100*randX
        }, 3500, '<>')
    }
     for(var bBlock = 0; bBlock<14;bBlock+=1){
        var randX = bBlock* (Math.random() - 0.2);
        aBlock.clone().attr({fill: 'blue'}).animate({
            x: 100*randX
        }, 4000, '<>')
    }
//    var red = j.set();
//    red.push(bBlock);
//
//    red.hover(function(){
//        this.animate({
//            fill: 'blue'
//        }, 1000);
//    },function(){
//        this.animate({
//            fill: 'red'
//        }, 1000);
//    });

</script>


<?php
include_once '../inc/footer.php';
?>