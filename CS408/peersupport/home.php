<?php
// Start the session
session_start();
?>
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
            <a href="register.html" class="btn">Register</a>
        </div>
        <section id="mainsection" class="mainsection">
         <!--   <input type="text" name ="display" size="16" id="input" readonly><br> -->
         <br>
         <br>
         <?php if (isset($_SESSION['userid'])) {
             echo "Welcome";
             ?>
            <div id="signOut">
            <a href="logout.php" class="btn">Log Out</a>
            </div>
        <?php     
         }
         else {
             echo "Please sign in";
             ?>
            <div id="signIn">
            <a href="login.html" class="btn">Log In</a>
            </div>
         <?php
         }
         ?>
        </section>
        <script src="newIdentity.js"</script>
     <!--           <footer>&copy; 2015 Andrew Mortimer</footer>-->
   <!--     <script src="SPSModel.js"></script>
        <script src="SPSView.js"></script>
        <script src="SPSController.js"></script>-->
    </body>
</html>