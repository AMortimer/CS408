<?php

$username = (isset($_GET['w1']) ? $_GET['w1'] : null);
$name = (isset($_GET['w2']) ? $_GET['w2'] : null);
$password = (isset($_GET['w3']) ? $_GET['w3'] : null);

$conn = mysql_connect("devweb2014.cis.strath.ac.uk", "rnb12162", "consista");
mysql_select_db("rnb12162") or die(mysql_error());


if (isset($username) && isset($name) && isset($password)) {
    $dupsql = "SELECT * FROM helpers WHERE (username = '$username')";
    $dupquery = mysql_query($dupsql);
    if (mysql_num_rows($dupquery) > 0) {
        ?>
        <script type="text/javascript">
            alert("duplicate");
            window.location.href = "register.html";
        </script>
        <?php

        
    } else {
        $query = "INSERT INTO helpers (username,name,password) VALUES ('$username','$name','$password')";
        $data = mysql_query($query) or die(mysql_error());

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

if (!empty($_POST['username'])) {   //checking the 'user' name which is from register.html, is it empty or have some text
    $query = mysql_query("SELECT * FROM helpers WHERE username = '$_POST[username]'") or die(mysql_error());

    if (!$row = mysql_fetch_array($query) or die(mysql_error())) {
    } else {
        echo "SORRY...YOU ARE ALREADY REGISTERED USER...";
    }
}
?>