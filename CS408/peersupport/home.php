<!DOCTYPE html>
<!-- https://devweb2015.cis.strath.ac.uk/~rnb12162/CS408/peersupport/home.html -->

<!-- https://devweb2014.cis.strath.ac.uk/~jwb09185/317/prac3/main.html -->
<html>
    <head>
        <title>Supporting Peer Support</title>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="SPSStylesheet.css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, 
              maximum-scale=1.0, user-scalable=no">
        <meta name="mobile-web-app-capable" content="yes"/>
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <link rel="icon" sizes="192x192" href="bigAppIcon.png" />
        <link rel="apple-touch-icon" href="bigAppIcon.png" />
        <link rel="shortcut icon" href="smallAppIcon.png" type="image/x-icon" />
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
        <a href="forum.html" class="btn">Forum</a>
        <a href="chat.html" class="btn">Chat</a>
        <a href="about.html" class="btn">Help</a>
        </div>
        <div class ="register">
            <a href="register.html" class="btn">Register to help</a>
        </div>
        <section id="mainsection" class="mainsection">
         <!--   <input type="text" name ="display" size="16" id="input" readonly><br> -->
         <br>
         <br>
         Welcome.
         <div id="signIn">
    <li id="login">
        <a id="login-trigger" href='#'>
            Sign in <span>▼</span>
        </a>
        <div id="login-content">
            <h2>Login Form</h2>
            <form action="" method="post" id="loginForm">
                <fieldset id="inputs">
                    <label>Email:</label>
                    <input id="name" name="username" placeholder="username" type="text" required>
                    <label>Password :</label>
                    <input id="password" name="password" placeholder="******" type="password" required>
                </fieldset>
                <fieldset id="actions">
                    <input name="submit" type="submit" value=" Login ">
                </fieldset>
              <span><?php echo $error; ?></span>
            </form>
        </div>
    </li>
         </div>
        </section>

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
                <footer>&copy; 2015 Andrew Mortimer</footer>
        <script src="SPSModel.js"></script>
        <script src="SPSView.js"></script>
        <script src="SPSController.js"></script>
    </body>
</html>