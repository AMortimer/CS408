<!--<html>
    <head>
        <title>Forum</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        
        <div class ="home">
            <a href="index.html" class="homeBtn">Home</a>
        </div>
        <div class="toolbar">
        <a href="forum.html" class="btn">Forum</a>
        <a href="chat.html" class="btn">Chat</a>
        <a href="about.html" class="btn">Help</a>
        </div>
        <div class ="register">
            <a href="register.html" class="btn">Register to help</a>
        </div>
        <div id="allEntries">
            <table id="forum">
            </table>       
        </div> -->

<?php
//create an html file and redirect to it 

//set some basic html content 
$sHTML_Header = "<html><head><title>Test an html page</title></head><body>"; 
$sHTML_Content = "<h2><center>This is a Test Page</center><h2><br /><hr />"; 
$sHTML_Footer =  "</body></html>"; 

$filename = "test.html"; 

// Let's make sure the file exists and is writable first. 
if (is_writable($filename)) { 

   // In our example we're opening $filename in append mode. 
   // The file pointer is at the bottom of the file hence 
   // that's where $somecontent will go when we fwrite() it. 
   if (!$handle = fopen($filename, 'w')) { 
         echo "Cannot open file ($filename)"; 
         exit; 
   } 

   // Write $somecontent to our opened file. 
   if (fwrite($handle, $sHTML_Header) === FALSE) { 
       echo "Cannot write to file ($filename)"; 
       exit; 
   }else{ 
      //file is ok so write the other elements to it 
      fwrite($handle, $sHTML_Content); 
      fwrite($handle, $sHTML_Footer); 
   } 

   fclose($handle); 

}else{ 
   echo "The file $filename is not writable"; 
} 

//redirect the user to the html page 
header("location:$filename"); 
?>

?>
    
    
<!--    </body>
</html>-->


