<?php

function addNewPost($title, $post){
    
      mysql_connect("devweb2014.cis.strath.ac.uk", "rnb12162", "consista");
      
      mysql_select_db("rnb12162") or die(mysql_error());

      mysql_query("INSERT INTO forum (title, body)
      VALUES ('$title', '$post')")
      or die(mysql_error());
      
      header('Location: forum.php');
}

function test_data($data) {

    	  // Make a connection
	  $conn = mysql_connect("devweb2014.cis.strath.ac.uk", "rnb12162", "consista");

    	  // Selecting Database
	  $db = mysql_select_db("rnb12162") or die(mysql_error());
	  
  $data = trim($data);
  $data = stripslashes($data);
  $data = mysql_real_escape_string($data);
  $data = htmlspecialchars($data);
  return $data;
}

$title    = test_data($_POST['title']);
$post     = test_data($_POST['body']);
addNewPost($title, $post);
?>