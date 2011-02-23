<?php

    session_start();

    include_once  'inc/functions.inc.php';
    include_once 'inc/db.inc.php';

    include_once  'inc/header.php';

    // Open a database connection
    $db = new PDO(DB_INFO, DB_USER, DB_PASS) or die('There was a problem connecting to the database.');



   // Figure out what page is being requested (default is home)
    if(isset($_GET['page']))
    {
        $page = htmlentities(strip_tags($_GET['page']));

    }
    else
    {
        $page = 'home';
    }




//SERVE UP THE PAGES!!!

if ($page == 'home') {
    include_once 'home.php';
}

if ($page=='blog'){
      include_once 'blog.php';
}

if ($page == 'about'){
    include_once 'about.php';
}

if ($page == 'design'){
    include_once 'design/design.php';
}



include_once 'inc/footer.php';

?>