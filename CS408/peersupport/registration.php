<?php

session_start();

$info = json_decode(file_get_contents('php://input'), true);
$username=$info['username'];
$name=$info['name'];
$password=$info['password'];

mysql_connect("devweb2014.cis.strath.ac.uk", "rnb12162", "consista") or die(mysql(mysql_error()));
mysql_select_db("rnb12162") or die(mysql_error());

/* $username = (isset($_GET['w1']) ? $_GET['w1'] : null);
$name = (isset($_GET['w2']) ? $_GET['w2'] : null);
$password = (isset($_GET['w3']) ? $_GET['w3'] : null); */


if (isset($username) && isset($name) && isset($password)) {
    $dupsql = "SELECT * FROM users WHERE (username = '$username')";
    $dupquery = mysql_query($dupsql);
    if (mysql_num_rows($dupquery) > 0) {
        ?>
        <script type="text/javascript">
            alert("duplicate");
            window.location.href = "register.html";
        </script>
        <?php
    if (!empty($_POST['username'])) {   //checking the 'user' name which is from register.html, is it empty or have some text
        $query = mysql_query("SELECT * FROM users WHERE username = $username") or die(mysql_error());
        }
        else {
            ?>
            <script type="text/javascript">
                alert("nousername");
                window.location.href = "register.html";
            </script>
            <?php
        }
        if (!$row = mysql_fetch_array($query) or die(mysql_error())) {
        } else {
            echo "SORRY...YOU ARE ALREADY REGISTERED USER...";
        }
    if (!empty($_POST['name'])) {   //checking the 'user' name which is from register.html, is it empty or have some text
        $query = mysql_query("SELECT * FROM users WHERE name = '$_POST[name]'") or die(mysql_error());
    }
        else {
            ?>
            <script type="text/javascript">
                alert("noname");
                window.location.href = "register.html";
            </script>
            <?php
        }
    }
    if (strlen($_POST['password' < 6])) {
        echo "Password must be 6 characters.";
    }
        
     else {
         ChromePhp::log('password > 6');
        // Connect to database server
        mysql_connect("devweb2014.cis.strath.ac.uk", "rnb12162", "consista");

        // Select your database
        mysql_select_db("rnb12162") or die(mysql_error());
        mysql_query("INSERT INTO users
                (username, name, password) VALUES('$_POST[username]', '$_POST[name]', '$_POST[password]' )")
                or die(mysql_error()); 

        // Redirect to index.html
                header("Location: https://devweb2015.cis.strath.ac.uk/~rnb12162/CS408/peersupport/home.php");
    }
}
else {
    header("Location: https://devweb2015.cis.strath.ac.uk/~rnb12162/CS408/peersupport/register.html");
}
?>