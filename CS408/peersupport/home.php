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
        <a href="forum.php" class="btn">Forum</a>
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
         <?php if (!empty($_POST['username'])) {
             echo "Welcome ";
             
         }
         else {
             echo "Please sign in";
         }
         ?>
    <div id="signOut">
        <a href="logout.php" class="btn">Log Out</a>
    </div>
    
    <script>        
/*       function randomNumber() {
           var randNo = Math.floor(100000 + Math.random() * 900000);
           if ((randNo%5===0) || (randNo%2===0)) {
               randomNumber();
           }
           else {
               console.log(randNo);
               return randNo;
           }
       } */
       function firstID(){
           var firstId;
            //   firstId = randomNumber();
           firstId = Math.floor(100000 + Math.random() * 900000);
           return firstId;
       }

       function getOldID(n) {
            n = firstID();
            return n;
       }

       function generateID(n) {
           var newId;
           var id;
           if(n<=1) {
              newId = getOldID(n); 
           }
           else {
              id = (getOldID(n)*n); 
              newId=id%1000000;
           }
               
           console.log(n);
           console.log(newId);
           return newId;
       }
    </script>     
         
    <div id="signIn">
        <a href="login.php" class="btn">Log In</a>
    </div>
         <button id="test" onclick = "generateID(3)">Test</button>
        </section>
        <script src="newIdentity.js"</script>
     <!--           <footer>&copy; 2015 Andrew Mortimer</footer>-->
   <!--     <script src="SPSModel.js"></script>
        <script src="SPSView.js"></script>
        <script src="SPSController.js"></script>-->
    </body>
</html>