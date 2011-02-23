<?php
$bg_picture =  array( 1=> '2222small.jpg', '005small.jpg', '1251small.jpg', '008small.jpg');

$bg = $bg_picture[rand(1,4)];
?>


<div class="slogan">
<h2>This is my <br> totally-awesome <br> website!</h2>
</div>
<h1 class="big_title">welcome.</h1>
<div class="splash">
        <h2 class="intro">This is the Personal Portfolio of Cody, <br><span>"Interwebs Pioneer!"</span></h2>

    <div class="slogan whatThe">
        <h2>So, what's this <br> all about?</h2>
    </div>
    <h2 class="guide_text">According to my extensive analysis: you are either lost or my mom. But in case you're neither of those, here are
                <em><strong>just a few</strong></em>  reasons to stick around!</h2>
    <ul class="reasons"><h4>
        <li><span>X</span> The pages found here represent what a burgeoning young web designer thinks
        looks good (or good-enough). So, get ready to scratch your chin and go, "Hmmm, interesting(?)..."</li>
        <li><span>Y</span> There's a blog!<br> <strong>"Read all about it!"</strong> </li>
        <li><span>Z</span> I hope you brought popcorn because there's more than just words here!
        There's a media section devoted to new web technologies (mostly HTML5, CSS3, and
        JavaScript-based) where you'll find things which range from canvas animations
        to (eventually) interactive galleries and Videos!</li>

    </h4></ul>

    <div class="slogan whoThe">
        <h2>Whoa! Whoa! <br>Who's this guy and <br> what's he after?!</h2>
    </div>


        <ul class="vitals"><h2>Vitals:</h2>

            <h4>
            <li><strong>Born:</strong> 01/18/1984</li>
            <li><strong>Education:</strong> M.S. Physiology</li>
            <li><strong>Fun Fact:</strong> I have an identical twin! Therefore I also have ESP.</li>
            <li><strong>Likes:</strong> People who visit his website!</li>
            <li><strong>Dislikes:</strong> Cumbersome, over-priced web design software.</li></h4>
        </ul>
    <h3 class="guide_text"><span>{</span>To be honest, the only point to this site is to have some fun! <br>So, get your finger ready for clickin' (or
    tappin') and browse away <br>to your heart's content!<span class="right_bracket">}</span></h3>

    <h4 class="guide_text" >Still not convinced?
        <br><em>Here's some sample content:</em></h4>
    <div class="splash_img">
        
        <img src="./images/<?php echo $bg ;?>" alt="splash">

        <p>"Oooh, photography!!"<br>(Store coming soon.)
        </p>

    </div>
    <h1 class="guide_text">That's pretty much all there is to Portfolio of C, so get clickin'!!!</h1>

</div>
