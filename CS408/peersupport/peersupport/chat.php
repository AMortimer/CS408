<html>
    <head>
        <title>Chat</title>
    </head>
    <body>
        <div class ="home">
            <a href="index.html" class="homeBtn">Home</a>
        </div>
        <div class="toolbar">
        <a href="forum.html" class="btn">Forum</a>
        <a href="chat.php" class="btn">Chat</a>
        <a href="help.html" class="btn">Help</a>
        </div>
        <div class ="register">
            <a href="register.html" class="btn">Register to help</a>
        </div>
        <main>
            <div id="chatHolder">
                <table id="entries">
                </table>       
            </div>
            <div id="addEntry">
                <form class="entryForm" action="addChat.php" onsubmit="return checkEntry()" method="POST">
                    <table>
                        <tr>
                            <td><strong>Message:</strong></td>
                            <td><textarea id="entry" name="entryText" row="10" cols="28"></textarea></td>
                        </tr>
                        <tr>
                            <td><input class="fButton" type="submit" value="Submit"></td>
                            <td><input class="fButton" type="reset" value="Reset"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </main>

<?php

function addNewPost($post){
    
      mysql_connect("devweb2014.cis.strath.ac.uk", "rnb12162", "consista"); //username and password
      
      mysql_select_db("rnb12162") or die(mysql_error());

      mysql_query("INSERT INTO SupportChat (comment)
      VALUES ('$post')")
      or die(mysql_error());
      
      header('Location: ');
      
}

function test_data($data) {

    	  // Make a connection
	  $conn = mysql_connect("devweb2014.cis.strath.ac.uk", "rnb12162", "consista"); //uname password
    	  // Selecting Database
	  $db = mysql_select_db("rnb12162") or die(mysql_error());
	  
  $data = trim($data);
  $data = stripslashes($data);
  $data = mysql_real_escape_string($data);
  $data = htmlspecialchars($data);
  return $data;
}

$post     = test_data($_POST['entryText']);
addNewPost($post);
?>
    </body>
</html>

