<?php

// Determine if an entry URL was passed
    $url = (isset($_GET['url'])) ? $_GET['url'] : NULL;

    // Load the entries
    $e = retrieveEntries($db, $page, $url);

    // Get the fulldisp flag and remove it from the array
    $fulldisp = array_pop($e);

    // Sanitize the entry data
    $e = sanitizeData($e);


// If the full display flag is set, show the entry
if($fulldisp==1)
{

    // Get the URL if one wasn't passed
    $url = (isset($url)) ? $url : $e['url'];

    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == 1)
    {
        // Build the admin links
        $admin = adminLinks($page, $url);
    }
    else
    {
    	$admin = array('edit'=>NULL, 'delete'=>NULL);
    }

    // Format the image if one exists
//    $img = formatImage($e['image'], $e['title']);

    if($page=='blog')
    {
        // Load the comment object
        include_once  'inc/comments.inc.php';
        $comments = new Comments();
        $comment_disp = $comments->showComments($e['id']);
        $comment_form = $comments->showCommentForm($e['id']);
        // Generate a Post to Twitter link
        $twitter = postToTwitter($e['title']);
    }
    else
    {
        $comment_form = NULL;
        $twitter = NULL;
    }

//                    todo - /portfolioofc   for /feeds/rss.php

//include_once 'blog_sidebar.php';

    ?>
    <div class="blog_page">
        <h1 class="big_title">blog.</h1>

    <section class="articles">

<!--     <p>-->
<!--            <a href="/portfolioofc/feeds/rss.php" class="rss_icon">-->
<!--                Subscribe via RSS!-->
<!--            </a>-->
<!--        </p>-->
    <article class="fulldisp">
        <hgroup>
			<h1><?php echo  $e['title'] ?></h1>
			<h5><?php echo $e['subheading'] ?></h5>
			<h6><?php
            $time = strtotime($e['created']);
            $myDate = date('F jS, Y', $time);
            echo $myDate;
            ?></h6>
        </hgroup>

			 <div><?php echo $e['entry'] ?></div>


            <p>
            <?php echo $admin['edit'] ?>
            <?php if($page=='blog') echo $admin['delete'] ?>
        </p>

        <?php if($page=='blog'): ?>
        <div class="bird">
            <a href="<?php echo $twitter ?>" class="twitter"><img src="../images/twitter.png"
                                                  alt="post to twitter"><br>Tweet this!</a></div>
                <p>
            <a href="./" class="goback">~ Back to previous entries ~</a>
        </p>


            <div class="comment_box">
        <h3 class="comment_title">Comments</h3>
        <?php echo $comment_disp, $comment_form; endif; ?>
            </div>


</article>
</section><!--.articles-->
</div>
<?php

    include_once 'blog_sidebar.php';


} else{
// If the full display flag is 0, format linked entry titles


//    include_once 'blog_sidebar.php';


    ?>
    <div class="blog_page">
        <h1 class="big_title">blog.</h1>

<section class="articles">

<!--             <p>-->
<!--            <a href="/portfolioofc/feeds/rss.php" class="rss_icon">-->
<!--                Subscribe via RSS!-->
<!--            </a>-->
<!--        </p>-->

            <?php

    // Loop through each entry
    foreach($e as $entry) {
  ?>


      <article>

          <hgroup>
			<h2><a href="/portfolioofc/<?php echo $entry['page'] ?>/<?php echo $entry['url'] ?>" class="moreLink">
         <?php echo $entry['title'] ?></a></h2>
<!--			<h5>--><?php //echo $entry['subheading'] ?><!--</h5>-->
              <?php
            $time = strtotime($entry['created']);
            $myDate = date('F jS, Y', $time);
          $dt = date('Y-m-d', $time);
          ?>
              <time datetime="<?php echo $dt ?>" pubdate>
			<h6><?php
            echo $myDate;
            ?></h6></time>
            </hgroup>

<div>
			 <?php
                $break = strrpos($entry['excerpt'], '<p>');
                 echo substr($entry['excerpt'], 0, $break);
            ?>
</div>


        <p><a href="/portfolioofc/<?php echo $entry['page'] ?>/<?php echo $entry['url'] ?>" class="moreLink">
            <span style="font-weight: bold; font-size: 20px;">+</span> Read the rest...</a></p>


</article>


 <?php

} // End the foreach loop
?>
    
</section><!--.articles-->

</div>


    <?php

    include_once 'blog_sidebar.php';

} // End the else

?>
    


        <p class="backlink">
<?php

if($page=='blog'
    && isset($_SESSION['loggedin'])
    && $_SESSION['loggedin'] == 1):


?>



            <a href="/portfolioofc/admin/<?php echo $page ?>">
                Post a New Entry
            </a>
<?php endif; ?>
        </p>


