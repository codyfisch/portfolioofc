<aside>
    <div class="bracket"></div>

    <section class="archive">

<h3>post</h3>

<?php
$archive = getArchives($db, $page, $url);
$archive = sanitizeData($archive);
?>
<ul>
<?php
// Loop through each title
foreach($archive as $a) {
?>

<li><a href="/portfolioofc/<?php echo $a['page'] ?>/<?php echo $a['url'] ?>">
 <?php echo $a['title'] ?></a>

</li>

<?php
} // End the foreach loop
?>
</ul>
</section>

<section class="updates">

<h3>((( tweet )))</h3>


<div class="tweet_box">
    <div class="twitter_div"><ul id="twitter_update_list"><li>&nbsp;</li></ul></div>
</div>


</section><!--updates -->

<div class="chain"></div>
    <div class="chain" style="left: 155px;"></div>


</aside>