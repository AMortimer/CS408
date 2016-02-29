<?php
include 'ChromePhp.php';
// Start the session
session_start();
ChromePhp::log('SET');
    $error=''; // Variable To Store Error Message
    $info = json_decode(file_get_contents('php://input'), true);
            // Define $username and $password
            $username=$info['username'];
            $password=$info['password'];
            // Establishing Connection with Server by passing server_name, user_id and password as a parameter
            mysql_connect("devweb2014.cis.strath.ac.uk", "rnb12162", "consista"); //username and password
            // To protect MySQL injection for Security purpose
//            $username = stripslashes($username);
//            $password = stripslashes($password);
//            $username = mysql_real_escape_string($username);
//            $password = mysql_real_escape_string($password);
            // Selecting Database
            mysql_select_db("rnb12162") or die(mysql_error()); //uname
            // SQL query to fetch information of registerd users and finds user match.
            $query = mysql_query("SELECT * FROM users WHERE username='$username' AND password='$password'") or die(mysql_error());
            $rows = mysql_num_rows($query);
            if ($rows == 1) {
                $result = mysql_fetch_assoc($query);
                $userid = $result['userid'];
                $_SESSION['userid']=$userid; // Initializing Session
                ChromePhp::log($_SESSION);
                header("location: home.php"); // Redirecting To Other Page
                http_response_code(200);
                return "Got here.";
            } else {
              $error = "Username or Password is invalid";
            }
    ?>