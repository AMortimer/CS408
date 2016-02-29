<?php
session_start();
  $connection = mysql_connect("devweb2014.cis.strath.ac.uk", "rnb12162", "consista");

  // Selecting Database
  $db = mysql_select_db("rnb12162", $connection);
  session_start();// Starting Session
  // Storing Session
  if(isset($_SESSION['userid'])) {
    $user_check=$_SESSION['userid'];
    // SQL Query To Fetch Complete Information Of User
    $ses_sql=mysql_query("SELECT username FROM users WHERE username='$user_check'", $connection);
    $row = mysql_fetch_assoc($ses_sql);
    $login_session =$row['userid'];
  }
  else {
      http_response_code(400);
  }
?>
