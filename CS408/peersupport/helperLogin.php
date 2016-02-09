<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
              $('#login-trigger').click(function(){
                $(this).next('#login-content').slideToggle();
                $(this).toggleClass('active');          

                if ($(this).hasClass('active')) $(this).find('span').html('&#x25B2;')
                  else $(this).find('span').html('&#x25BC;')
                })
            });
        </script>
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
    <li id="login">
        <a id="login-trigger" href='#'>
            Log In
        </a>
        <div id="login-content">
            <h2>Login Form</h2>
            <form action="" method="post" id="loginForm">
                <fieldset id="inputs">
                    <label>Username:</label>
                    <input id="name" name="username" placeholder="username" type="text">
                    <label>Password :</label>
                    <input id="password" name="password" placeholder="******" type="password">
                </fieldset>
                <fieldset id="actions">
                    <input name="submit" type="submit" value=" Login ">
                </fieldset>
              <span><?php echo $error; ?></span>
            </form>
        </div>
        </li>

<?php
session_start(); // Starting Session
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
    $query = mysql_query("select * from login where password='$password' AND username='$username'", $connection);
    $rows = mysql_num_rows($query);
    if ($rows == 1) {
      $_SESSION['login_user']=$username; // Initializing Session
      header("location: index.html"); // Redirecting To Other Page
    } else {
      $error = "Username or Password is invalid";
    }
    mysql_close($connection); // Closing Connection
  }
}
?>
       
    </body>
</html>

