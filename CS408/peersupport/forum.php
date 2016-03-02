<?php
include 'ChromePhp.php';
session_start();
if (!isset($_SESSION['userid'])) {
    http_response_code(400);
    ChromePhp::log('session not set');
    return;
}
else {
    $info = json_decode(file_get_contents('php://input'), true);
    ChromePhp::log($info);
    ChromePhp::log('session');
    $title = $info['title'];
    $body = $info['body'];
    $identity = $info['identity'];
    ChromePhp::log($identity);
    $userid=$_SESSION['userid'];
    ChromePhp::log($userid);
    ?>
<?php
//Create Connection

mysql_connect("devweb2014.cis.strath.ac.uk", "rnb12162", "consista");
mysql_select_db("rnb12162") or die(mysql_error());

//$query = mysql_query("SELECT * FROM forum WHERE title='$title' AND entry='$entry'") or die(mysql_error());
//$rows = mysql_num_rows($query);
//if ($rows == 1) {
    ChromePhp::log('inserting values');
    mysql_query("INSERT INTO forum (title, body, userid, identity) VALUES('$title', '$body', '$userid', '$identity')")
    or die(mysql_error()); 
    
//    if (isset($userid)) {
//    $query = "SELECT * FROM users WHERE (userid = '$userid')";
//    $data = mysql_query($query);
//    $var = mysql_num_rows($data);
    
//    while ($var > 0) {
//        $row = mysql_fetch_assoc($data);
//        echo $row['userid'];
//        $id = $row['userid'];
//        echo $row['username'];
//        echo "<br>";
//        $var--;
//    } 
//}
}
?> 

        


