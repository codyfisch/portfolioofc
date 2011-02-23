<?php
include_once '../inc/header.php';
?>
<style>
    .photo_gallery{
        width: 1000px;
        margin: auto;
    background: #eee;
    }
    .photo_gallery img{
        width: 500px;
        float: left;
    }
    #zoom{
        width: 500px;
          -webkit-transition: width 1s;
          -moz-transition: width 1s;
          -o-transition: width 1s;
          transition: width 1s;
    }
    #zoom:target {
        width: 100%;
    }
    .photo_gallery ul {
        list-style: none;
        margin:0;
        padding: 0;
    }
    .photo_gallery ul li {
        display: inline;
    }

</style>
<div class="photo_gallery">
    <ul>
        <li><a href="#zoom"><img src="../images/005.jpg" alt="photo" id="zoom"></a></li>
        <li><a href="#"><img src="../images/008.jpg" alt="photo"></a></li>
        <li><a href="#"><img src="../images/014.jpg" alt="photo"></a></li>
        <li><a href="#"><img src="../images/060.jpg" alt="photo"></a></li>
        <li><a href="#"><img src="../images/1251.jpg" alt="photo"></a></li>
        <li><a href="#"><img src="../images/2222.jpg" alt="photo"></a></li>
    </ul>
</div>





<?php
include_once '../inc/footer.php';
?>

