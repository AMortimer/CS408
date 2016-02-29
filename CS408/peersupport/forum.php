<?php
include 'ChromePhp.php';
session_start();
if (!isset($_SESSION['userid'])) {
    http_response_code(400);
    ChromePhp::log('here');
    return;
}
else {
    ChromePhp::log('session');
}
//Create Connection

mysql_connect("devweb2014.cis.strath.ac.uk", "rnb12162", "consista");
mysql_select_db("rnb12162") or die(mysql_error());

//$userid = $_GET['userid'];
if (isset($userid)) {
    $query = "SELECT * FROM users WHERE (userid = '$userid')";
    $data = mysql_query($query);
    $var = mysql_num_rows($data);
    
    while ($var > 0) {
        $row = mysql_fetch_assoc($data);
        echo $row['userid'];
        $id = $row['userid'];
        echo $row['username'];
        echo "<br>";
        $var--;
    }
    
}
/*        mysql_connect("devweb2014.cis.strath.ac.uk", "rnb12162", "consista");
 //       $username = $_SESSION['username'];
        $userid = $_SESSION['userid'];
        mysql_select_db("rnb12162") or die(mysql_error());
        $query = "SELECT * FROM users";

        $result = mysql_query($query) or die(mysql_error());
        if(mysql_num_rows($result) > 0) {
            $id = mysql_fetch_array($result);
            echo $id['userid'];
        } */
        ?> 

        


