<html>
    <head>
        <title>Register</title>
    </head>
    <body>
<?php

session_start();

$conn = mysql_connect("devweb2014.cis.strath.ac.uk", "rnb12162", "consista");
mysql_select_db("rnb12162") or die(mysql_error());

/* $username = (isset($_GET['w1']) ? $_GET['w1'] : null);
$name = (isset($_GET['w2']) ? $_GET['w2'] : null);
$password = (isset($_GET['w3']) ? $_GET['w3'] : null); */

$username=$_POST['username'];
$name=$_POST['name'];
$password=$_POST['password'];

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
        $query = mysql_query("SELECT * FROM users WHERE username = '$_POST[username]'") or die(mysql_error());

        if (!$row = mysql_fetch_array($query) or die(mysql_error())) {
        } else {
            echo "SORRY...YOU ARE ALREADY REGISTERED USER...";
        }
    }
        
    } else {
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
?>
</body>
</html>