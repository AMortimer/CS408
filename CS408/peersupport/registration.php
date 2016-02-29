<?php
include 'ChromePhp.php';
session_start();
    $info = json_decode(file_get_contents('php://input'), true);
    ChromePhp::log($info);
    $username=$info['username'];
    $name=$info['name'];
    $password=$info['password'];
    ChromePhp::log($username);
    ChromePhp::log($name);
    ChromePhp::log($password);
    
    mysql_connect("devweb2014.cis.strath.ac.uk", "rnb12162", "consista") or die(mysql_error());
    mysql_select_db("rnb12162") or die(mysql_error());

if (isset($username) && isset($name) && isset($password)) {
//    $dupsql = "SELECT * FROM users WHERE (username = '$username')";
//    $dupquery = mysql_query($dupsql);
//    ChromePhp::log($dupsql);
//    if (mysql_num_rows($dupquery) > 0) {
        ?>
<!--        <script type="text/javascript">
            alert("duplicate");
            window.location.href = "register.html";
        </script>-->
        <?php
 //   if (!empty($username)) {   //checking the 'user' name which is from register.html, is it empty or have some text
   //     $query = mysql_query("SELECT * FROM users WHERE username = '$username'") or die(mysql_error());
     //   }
   //     else {
            ?>
       <!--     <script type="text/javascript"> 
                alert("nousername");
                window.location.href = "register.html";
            </script>-->
            <?php
//        }
//        if (!$row = mysql_fetch_array($query) or die(mysql_error())) {
//        } else {
//            echo "SORRY...YOU ARE ALREADY REGISTERED USER...";
//        }
//    if (!empty($name)) {   //checking the 'user' name which is from register.html, is it empty or have some text
//        $query = mysql_query("SELECT * FROM users WHERE name = '$name'") or die(mysql_error());
//    }
//        else {
//            ?>
<!--            <script type="text/javascript">
                alert("noname");
                window.location.href = "register.html";
            </script>-->
            <?php
//        }
    }
    if (strlen($password) < 6) {
        echo "Password must be 6 characters.";
        ChromePhp::log('password < 6');
    }
        
     else {
         ChromePhp::log('password > 6');
        // Connect to database server
  //      mysql_connect("devweb2014.cis.strath.ac.uk", "rnb12162", "consista");

        // Select your database
  //      mysql_select_db("rnb12162") or die(mysql_error());
        mysql_query("INSERT INTO users
                (username, name, password) VALUES('$username', '$name', '$password' )")
                or die(mysql_error()); 

        // Redirect to index.html
               // header("Location: https://devweb2015.cis.strath.ac.uk/~rnb12162/CS408/peersupport/home.php");
    }
//}
//else {
   // header("Location: https://devweb2015.cis.strath.ac.uk/~rnb12162/CS408/peersupport/register.html");
//}
?>