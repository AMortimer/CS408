<?php

function addNewPost($post){
    
      mysql_connect("devweb2014.cis.strath.ac.uk", "rnb12162", "consista");
      
      mysql_select_db("rnb12162") or die(mysql_error());

      mysql_query("INSERT INTO SupportChat (comment)
      VALUES ('$post')")
      or die(mysql_error());
      
      header('Location: chatcity.html');
      
}

function test_data($data) {

    	  // Make a connection
	  $conn = mysql_connect("devweb2014.cis.strath.ac.uk", "tjb12207", "ialivess");
    	  // Selecting Database
	  $db = mysql_select_db("tjb12207") or die(mysql_error());
	  
  $data = trim($data);
  $data = stripslashes($data);
  $data = mysql_real_escape_string($data);
  $data = htmlspecialchars($data);
  return $data;
}

$post     = test_data($_POST['entryText']);
addNewPost($post);
?>

