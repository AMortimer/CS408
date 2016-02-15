<?php
  $connection = mysql_connect("devweb2014.cis.strath.ac.uk", "rnb12162", "consista");

  // Selecting Database
  $db = mysql_select_db("rnb12162", $connection);
  session_start();// Starting Session
  // Storing Session
  if(isset($_SESSION['username'])) {
    $user_check=$_SESSION['username'];
    // SQL Query To Fetch Complete Information Of User
    $ses_sql=mysql_query("SELECT username FROM helpers WHERE username='$user_check'", $connection);
    $row = mysql_fetch_assoc($ses_sql);
    $login_session =$row['username'];
  }
//   if(!isset($login_session)){
//     mysql_close($connection); // Closing Connection
//     header('Location: main.php'); // Redirecting To Home Page
//   }
?>
