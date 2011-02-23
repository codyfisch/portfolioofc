<?php



function retrieveEntries($db, $page, $url=NULL)
{
    /*
     * If an entry URL was supplied, load the associated entry
     */
    if(isset($url))
    {
        $sql = "SELECT id, page, title, subheading, entry, created
                FROM entries
                WHERE url=?
                LIMIT 1
                ";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($url));

        // Save the returned entry array
        $e = $stmt->fetch();

        // Set the fulldisp flag for a single entry
        $fulldisp = 1;
    }

    /*
     * If no entry url was supplied, load all entry titles for the page
     */

    else
    {
        $sql = "SELECT id, page, title, subheading, LEFT(entry, 900) AS excerpt, entry, url, created
                FROM entries
                WHERE page=?
                ORDER BY created DESC
                LIMIT 5
                ";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($page));

//        $e = $stmt->fetch();
        $e = NULL; // Declare the variable to avoid errors

        // Loop through returned results and store as an array
        while($row = $stmt->fetch()) {
            if($page=='blog')
            {
                $e[] = $row;
                $fulldisp = 0;
            }
            else
            {
                $e = $row;
                $fulldisp = 1;
            }
        }

        /*
         * If no entries were returned, display a default
         * message and set the fulldisp flag to display a
         * single entry
         */
        if(!is_array($e))
        {
            $fulldisp = 1;
            $e = array(
                'title' => 'No Entries Yet',
                'entry' => 'This page does not have an entry yet!'
            );
        }
    }

    // Add the $fulldisp flag to the end of the array
    array_push($e, $fulldisp);

    return $e;
}

function getArchives($db, $page, $url=NULL){

        $sql = "SELECT id, page, title, url, created
                FROM entries
                WHERE page=?
                ORDER BY created DESC
                ";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($page));

        // Save the returned entry array
      $archive = NULL; // Declare the variable to avoid errors

        // Loop through returned results and store as an array
        while($row = $stmt->fetch()) {
            if($page=='blog')
            {
                $archive[] = $row;
            }
            else
            {
                $archive = $row;
            }
        }

return $archive;

}


function confirmDelete($db, $url)
{
	$e = retrieveEntries($db, '', $url);

//                    todo - /portfolioofc


	return <<<FORM
<form action="/portfolioofc/admin.php" method="post">
	<fieldset>
		<legend>Are You Sure?</legend>
		<p>Are you sure you want to delete the entry
		"$e[title]"?
		</p>
		<input type="submit" name="submit" value="Yes" />
		<input type="submit" name="submit" value="No" />
		<input type="hidden" name="action" value="delete" />
		<input type="hidden" name="url" value="$url" />
	</fieldset>
</form>
FORM;
}



function deleteEntry($db, $url)
{
    /*
     * We need to delete the comments from the blog entry first, otherwise
     * they'll still be present in the database.  Use the url to retrieve the blog
     * entry's id.
     */
    $sql = "SELECT id FROM entries WHERE url=? LIMIT 1";

    $blog_id = $db->prepare($sql);
    $blog_id->execute(array($url));

    if($blog_id->execute(array($url))) {
//        Use the blog entry's id to retrieve any attached comments.
        while($row = $blog_id->fetch()) {
            $sql = "SELECT id FROM comments WHERE blog_id=? ORDER BY date DESC";

            $stmt = $db->prepare($sql);

            if($stmt->execute(array($row['id']))) {
                //Delete all the attached comments

                while($comment = $stmt->fetch()) {

                    $sql = "DELETE FROM comments WHERE id=? LIMIT 1";

                    if($comment_id = $db->prepare($sql)) {
                        //Execute the delete command
                        $comment_id->execute(array($comment['id']));
                        $comment_id->closeCursor();
                    }
                }
                $stmt->closeCursor();
            }
        }
        $blog_id->closeCursor();
    }
    //Now go ahead and delete the entry.

    $sql = "DELETE FROM entries
            WHERE url=?
            LIMIT 1";
    $stmt = $db->prepare($sql);
    return $stmt->execute(array($url));
}



function adminLinks($page, $url)
{

//                    todo - /portfolioofc


    // Format the link to be followed for each option
    $editURL = "/portfolioofc/admin/$page/$url";
    $deleteURL = "/portfolioofc/admin/delete/$url";

    // Make a hyperlink and add it to an array
    $admin['edit'] = "<a href=\"$editURL\">edit</a>";
    $admin['delete'] = "<a href=\"$deleteURL\">delete</a>";

    return $admin;
}



//todo - The problem with the entries is NOT related to this function!
function sanitizeData($data)
{
    if(!is_array($data))
    {
        return strip_tags($data, "<p><a><code><mark><img><br><ol><ul><li><h4><pre><figure><figcaption><div><blockquote><strong><em><span>");
    }
    else
    {
        return array_map('sanitizeData', $data);
    }
}



function makeUrl($title)
{
    $patterns = array(
        '/\s+/',
        '/(?!-)\W+/'
    );
    $replacements = array('-', '');
    return preg_replace($patterns, $replacements, strtolower($title));
}



function formatImage($img=NULL, $alt=NULL)
{
	if(!empty($img))
	{
		return '<img src="'.$img.'" alt="'.$alt.'" />';
	}
	else
	{
		return NULL;
	}
}



function createUserForm()
{

    //                    todo - /portfolioofc

	return <<<FORM
<form action="/portfolioofc/inc/update.inc.php" method="post">
	<fieldset>
		<legend>Create a New Administrator</legend>
		<label>Username
			<input type="text" name="username" maxlength="75" />
		</label>
		<label>Password
			<input type="password" name="password" />
		</label>
		<input type="submit" name="submit" value="Create" />
		<input type="submit" name="submit" value="Cancel" />
		<input type="hidden" name="action" value="createuser" />
	</fieldset>
</form>
FORM;
}



function postToTwitter($title)
{
	$full = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	$short = shortenUrl($full);
	$status = $title . ' ' . $short;
	return 'http://twitter.com/?status='.urlencode($status);
}



function shortenUrl($url)
{
    // Format a call to the bit.ly API
    $api = 'http://api.bit.ly/shorten';
    $param = 'version=2.0.1&longUrl='.urlencode($url).'&login=codyfisch'
        . '&apiKey=R_540343e0d8c3f50fd59a90cd5a9e9bc2&format=xml';

    // Open a connection and load the response
    $uri = $api . "?" . $param;
    $response = file_get_contents($uri);

    // Parse the output and return the shortened URL
    $bitly = simplexml_load_string($response);
    return $bitly->results->nodeKeyVal->shortUrl;
}

?>