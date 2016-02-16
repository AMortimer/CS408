<?php
// Start the session
session_start();
    $error=''; // Variable To Store Error Message
    if (isset($_POST['submit'])) {
      if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password is invalid";
      }
      else
      {
        // Define $username and $password
        $username=$_POST['username'];
        $password=$_POST['password'];
        // Establishing Connection with Server by passing server_name, user_id and password as a parameter
        $connection = mysql_connect("devweb2014.cis.strath.ac.uk", "rnb12162", "consista"); //username and password
        // To protect MySQL injection for Security purpose
        $username = stripslashes($username);
        $password = stripslashes($password);
        $username = mysql_real_escape_string($username);
        $password = mysql_real_escape_string($password);
        // Selecting Database
        $db = mysql_select_db("rnb12162", $connection); //uname
        // SQL query to fetch information of registerd users and finds user match.
        $query = mysql_query("select * from users where password='$password' AND username='$username'", $connection);
        $rows = mysql_num_rows($query);
        if ($rows == 1) {
          $_SESSION['username']=$username; // Initializing Session
         header("location: home.php"); // Redirecting To Other Page
        } else {
          $error = "Username or Password is invalid";
        }
        mysql_close($connection); // Closing Connection
      }
    }
    ?>
<html>
    <head>
        <title>Supporting Peer Support</title>
        <meta charset="UTF-8">
 <!--       <link type="text/css" rel="stylesheet" href="SPSStylesheet.css"/> -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, 
              maximum-scale=1.0, user-scalable=no">
        <meta name="mobile-web-app-capable" content="yes"/>
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <link rel="icon" sizes="192x192" href="bigAppIcon.png" />
        <link rel="apple-touch-icon" href="bigAppIcon.png" />
        <link rel="shortcut icon" href="smallAppIcon.png" type="image/x-icon" />
  <!--      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> -->
    </head>
    <body>
        <div class ="home">
            <a href="home.php" class="homeBtn">Home</a>
        </div>
        <div class="toolbar">
        <a href="forum.php" class="btn">Forum</a>
        <a href="chat.html" class="btn">Chat</a>
        <a href="about.html" class="btn">Help</a>
        </div>
        <div class ="register">
            <a href="register.html" class="btn">Register</a>
        </div>
    <li id="login">
        <div id="login-content">
            Login
            <form action="home.php" method="post" id="loginForm">
                <fieldset id="inputs">
                    <label>Username:</label>
                    <input id="username" name="username" placeholder="username" type="text" required>
                    <label>Password :</label>
                    <input id="password" name="password" placeholder="******" type="password" required>
                </fieldset>
                <fieldset id="actions">
               <input name="submit" type="submit" value=" Login " >
               <span> <?php echo $error ?> </span>
                </fieldset>
            </form>
        </div>
    </li>
</body>
</html> 