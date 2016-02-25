<?php
session_start();
$username;
if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
    $_SESSION['username'] = $username;
    echo "Welcome " . $_SESSION['username'];
}
else {
    echo "huh";
}
//Create Connection

?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Forum</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--        <script>
            $(document).ready(function(){
              $('#forum-trigger').click(function(){
                $(this).next('#forums-content').slideToggle();
                $(this).toggleClass('active');          

                if ($(this).hasClass('active')) $(this).find('span').html('&#x25B2;')
                  else $(this).find('span').html('&#x25BC;')
                })
            });
        </script> -->
    </head>
    <body <!--onload='viewEntries()'-->
        
        <div class ="home">
            <a href="home.php" class="homeBtn">Home</a>
        </div>
        <div class="toolbar">
        <a href="forum.php" class="btn">Forum</a>
        <a href="chat.html" class="btn">Chat</a>
        <a href="about.html" class="btn">Help</a>
        </div>
        <div class ="register">
            <a href="register.html" class="btn">Register to help</a>
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
    <div  id="identity">   
<?php
mysql_connect("devweb2014.cis.strath.ac.uk", "rnb12162", "consista");
mysql_select_db("rnb12162") or die(mysql_error());

$userid = $_SESSION['login'];
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
?>
        <?php
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
    </div> 
<!--        <li id="addPost"> -->
<!--        <a id="addPost-trigger" href='#'>
            Add new forum
        </a> -->
        
        <button id="addForum" onclick = "generateID(4)">Add new forum</button>
        <div id="login-content">
<!--              <span><?php echo $error; ?></span> -->
                <form class="entryForm" action="addPost.php" onsubmit="return checkEntry()" method="POST">
                    <table>
                        <tr>
                            <td>
                                <strong>Title:</strong>  
                            </td>
                            <td>
                                <input id="title" type="text" name="title" size="30">  
                            </td>
                            
                        </tr>
                        <tr>
                            <td><strong>Text:</strong></td>
                            <td><textarea id="entry" name="body" row="10" cols="28"></textarea></td>
                        </tr>
                        <tr>
                            <td><input class="fButton" type="submit" value="Submit"/></td>
                            <td><input class="fButton" type="reset" value="Reset"/></td>
                        </tr>
                    </table>
                </form>
        </div>
<!--        </li> -->
        <div id="addEntry">

            </div>
            <div id="allEntries">
                <table id="forum">
                </table>       
            </div>
        <script>
            	function checkEntry(){
		var title = document.getElementById("title");
		var entry   = document.getElementById("body");
		
		if(title.value === "" || entry.value === "") {
			alert("Please fill in all text fields");
			return false;
                    }
		}
        </script>
        <script>
		function viewEntries() {
                    var xmlhttp;
                    
		if (window.XMLHttpRequest){
		// for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
		} else { // for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		    }
			 xmlhttp.onreadystatechange=function() {
			 if (xmlhttp.readyState===4 && xmlhttp.status===200) {
				document.getElementById("forum").innerHTML=xmlhttp.responseText;
			    }	
			}
			xmlhttp.open("GET","getPost.php?",true);
			xmlhttp.send();
		}
       </script>
    </body>
</html>
