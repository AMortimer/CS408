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
        <script>
            $(document).ready(function(){
              $('#forum-trigger').click(function(){
                $(this).next('#forums-content').slideToggle();
                $(this).toggleClass('active');          

                if ($(this).hasClass('active')) $(this).find('span').html('&#x25B2;')
                  else $(this).find('span').html('&#x25BC;')
                })
            });
        </script>
    </head>
    <body onload='viewEntries()'>
        
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
        <li id="addPost">
        <a id="addPost-trigger" href='#'>
            Add new forum
        </a>
        <div id="login-content">
              <span><?php echo $error; ?></span>
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
        </li>
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
		
		if(title.value == "" || entry.value == "") {
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
			 if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				document.getElementById("forum").innerHTML=xmlhttp.responseText;
			    }	
			}
			xmlhttp.open("GET","getPost.php?",true);
			xmlhttp.send();
		}
       </script>
    </body>
</html>
