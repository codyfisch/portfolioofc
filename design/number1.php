<?php include_once '../inc/header.php'; ?>

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
        #canvas{
            width: 1020px;
            height: 1000px;
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
        <li><a href="/">Back</a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
    </ul>
</nav>
<!--<div id="design"></div>-->

<a href="../design" class="design_back"><--Back</a>

	</div><!--#content-->
	</div><!-- #page-->
	<footer>
		<h6 id="copy">&copy; 2010 Cody Fischel</h6>
		</footer>



<script type="text/javascript" src="../js/raphael-1.5.2.min.js"></script>
<script src="../fonts/DTR.font.js"></script>
<script src="../fonts/Aquiline-fontfacekit/AquilineTwo_500.font.js"></script>
<script src="../fonts/leander-fontfacekit/Leander_400.font.js"></script>
<script src="../fonts/Kfon-fontfacekit/KFON_400.font.js"></script>
<script src="../fonts/Efon-fontfacekit/EFON_400.font.js"></script>
<script type="text/javascript">


    var r = Raphael("canvas", 1020, 1000);

     var c = r.circle(510, 300, 100).attr({
        fill: "90-#383838-#f00",
        stroke: 'none'
    });

    var test = r.print(300, 500, "Test String!%&$@", r.getFont("DistrictThinRegular", 800), 50);
    test[0].attr({fill: '#f06'});
    test[4].attr({fill: '#f06'});

    var aquil = r.print(300, 400, "Test String.", r.getFont("AquilineTwo", 800),50);
    var leander = r.print(300, 300, "Test String.", r.getFont("Leander", 800),50);
    var kfon = r.print(50, 200, "Test Stringc", r.getFont("KFON", 800),50);
    var efon = r.print(100, 700, "Test String. v", r.getFont("EFON", 800),50);


    var textBG = r.rect(200,300,100,50).attr({
        fill: '#bbb',
        stroke: 'none'
    });


    var someText = r.text(200, 300, "This is only a test.").attr({
        'font-family': 'AquilineTwo',
        'font-size': 20
    });

    textBG.click(function(){
        this.animate({
            x: 700
        }, 4000, '<>')
    });
    someText.animateWith(textBG, {y: 500}, 4000);


    var ringInner = r.circle(300, 600, 40).attr({
        fill: 'red',
        stroke: 'none'
    }),
    ringMiddle = r.circle(300, 600, 60).attr({
        fill: 'none',
        stroke: '#f06',
        'stroke-width': 10
    }),
    ringOuter = r.circle(300, 600, 80).attr({
        fill: 'none',
        stroke: '#fe6',
        'stroke-width': 10
    });

   

</script>

</body>
</html>