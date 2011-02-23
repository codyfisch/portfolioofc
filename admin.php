<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 2);
session_start();

include_once  'inc/header.php';

// If the user is logged in, we can continue
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==1):

    /*
     * Include the necessary files
     */
    include_once  'inc/functions.inc.php';
    include_once 'inc/db.inc.php';

    // Open a database connection
    $db = new PDO(DB_INFO, DB_USER, DB_PASS) or die("There was a problem connecting to the database.");

    //MAKE SURE PAGE IS BLOG
    if(isset($_GET['page']))
    {
        $page = htmlentities(strip_tags($_GET['page']));
    }
    else
    {
        $page = 'blog';
    }

    //ENTRY DELETION BEHAVIOR
    if(isset($_POST['action']) && $_POST['action'] == 'delete')
    {
        if($_POST['submit'] == 'Yes')
        {
            $url = htmlentities(strip_tags($_POST['url']));
            if(deleteEntry($db, $url))
            {
                header("Location: /portfolioofc/");
                exit;
            }
            else
            {
                exit("Error deleting the entry!");
            }
        }
        else
        {
            //                    todo - /portfolioofc
            header("Location: /portfolioofc/blog/$_POST[url]");
        }
    }

//    Clean the URL and perform administration tasks
    if(isset($_GET['url']))
    {
        $url = htmlentities(strip_tags($_GET['url']));

        // Check if the entry should be deleted
        if($page == 'delete')
        {
            $confirm = confirmDelete($db, $url);
        }

        // Set the legend of the form
        $legend = "Edit This Entry";

        $e = retrieveEntries($db, $page, $url);
        $id = $e['id'];
        $title = $e['title'];
        $subheading = $e['subheading'];
        $img = $e['image'];
        $entry = $e['entry'];
    }
    else
    {

        // Check if we're creating a new user
        if($page == 'createuser')
        {
        	$create = createUserForm();
        }

    	// Set the legend
        $legend = "New Entry Submission";

        // Set the variables to null if not editing
        $id = NULL;
        $title = NULL;
        $subheading = NULL;
        $img = NULL;
        $entry = NULL;
    }

    if($page == 'delete'):
    {
        echo $confirm;
    }

    elseif($page == 'createuser'):
    {
    	echo $create;
    }
    else:

//Show the form for filling out the blog entry.

//        todo - In the future, we may want to include a "Save for later" and "Publish" function, using sessions.
        //                    todo - /portfolioofc

        ?>

    <form method="post" action="/portfolioofc/inc/update.inc.php" enctype="multipart/form-data">

        <fieldset>

            <legend><?php echo $legend ?></legend>

            <label>Title 
                <input type="text" name="title" maxlength="150" value="<?php echo $title ?>" />
            </label>

            <label>Subheading
                <input type="text" name="subheading" maxlength="200" value="<?php echo $subheading ?>">
            </label>

            <label>Image
                <input type="file" name="image" />
            </label>

            <label>Entry 
                <textarea name="entry" cols="45" rows="10"><?php echo $entry ?></textarea>
            </label>

            <input type="hidden" name="id" value="<?php echo $id ?>" />

            <input type="hidden" name="page" value="<?php echo $page ?>" />

            <input type="submit" name="submit" value="Save Entry" />
            <input type="submit" name="submit" value="Cancel" />

        </fieldset>
    </form>

<?php endif; ?>

<?php

/*
 * If we get here, the user is not logged in. Display a form 
 * and ask them to log in.
 */
else:
//todo - For later, try to clean up the pages and add HTML 5 tags...

//                    todo - /portfolioofc
    
?>

    <form method="post" 
        action="/portfolioofc/inc/update.inc.php"
        enctype="multipart/form-data">
        <fieldset>
            <legend>Please Log In To Continue</legend>
            <label>Username 
                <input type="text" name="username" maxlength="75" value="login"/>
            </label>
            <label>Password 
                <input type="password" name="password" maxlength="150" value="none"/>
            </label>
            <input type="hidden" name="action" value="login" />
            <input type="submit" name="submit" value="Log In" />
        </fieldset>
    </form>

<?php endif; ?>

<?php
include_once 'inc/footer.php';
?>