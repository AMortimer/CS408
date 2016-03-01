<?php
include 'ChromePhp.php';
session_start();
    $info = json_decode(file_get_contents('php://input'), true);
    ChromePhp::log($info);
    $username=$info['username'];
    $name=$info['name'];
    $password=$info['password'];
    $confirm=$info['confirm'];
    ChromePhp::log($username);
    ChromePhp::log($name);
    ChromePhp::log($password);
    ChromePhp::log($confirm);
    
    mysql_connect("devweb2014.cis.strath.ac.uk", "rnb12162", "consista") or die(mysql_error());
    mysql_select_db("rnb12162") or die(mysql_error());

    $dupsql = "SELECT * FROM users WHERE (username = '$username')";
    $dupquery = mysql_query($dupsql);
    ChromePhp::log($dupsql);
    if (mysql_num_rows($dupquery) > 0) {
        ChromePhp::log('User already exists.');
        ?>
        <script type="text/javascript">
            alert("This username is already registered.");
        </script>
        <?php
    }
    else if (!isset($username)) {
        echo "Please provide a username";
        ChromePhp::log('No username');
    }
    else if (!isset($name)) {
        echo "Please provide a name";
        ChromePhp::log('No username');
    }
    else if (strlen($password) < 6) {
        echo "Password must be 6 characters.";
        ChromePhp::log('password < 6');
    }
    else if ($password != $confirm) {
        echo "Password does not match confirmation.";
        ChromePhp::log('password != confirm');
    }
        
    else {
        ChromePhp::log('password > 6');
        mysql_query("INSERT INTO users
            (username, name, password) VALUES('$username', '$name', '$password')")
            or die(mysql_error()); 
    }
?>