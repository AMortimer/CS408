<?php
include 'ChromePhp.php';
session_start();
mysql_connect("devweb2014.cis.strath.ac.uk", "rnb12162", "consista");
mysql_select_db("rnb12162") or die(mysql_error());
ChromePhp::log('get post');
$info = json_decode(file_get_contents('php://input'), true);
$title = $info['title'];
//create an html file and redirect to it 

$query = mysql_query("SELECT * FROM forum WHERE title = '$title'") or die(mysql_error());

if(mysql_num_rows($query) > 0) {
    echo "<table id='forum'><tr><th>Date</th><th>Title</th><th>Identity</th><tr>";

    while($row = mysql_fetch_array($result)){
                    echo "<tr>";
                    echo "<td>" . $row['date']  . "</td>";
                    echo "<td>" . '<a href="forumPost.html">'.$row['title'] .'</a>'. "</td>";
                    echo "<td>" . $row['identity']	 . "</td>";
                    echo "</tr>";
            }
            echo "</table>";
//set some basic html content
//$sHTML_Header = "<html><head><title>Forum Post</title></head><body>"; 
//$sHTML_Content = "<h2><center>hmm?</center><h2><br /><hr />"; 
//$sHTML_Footer =  "</body></html>"; 

//$filename = "forumPost.html"; 

// Let's make sure the file exists and is writable first. 
//if (is_writable($filename)) { 
//
//   // In our example we're opening $filename in append mode. 
//   // The file pointer is at the bottom of the file hence 
//   // that's where $somecontent will go when we fwrite() it. 
//   if (!$handle = fopen($filename, 'w')) { 
//         echo "Cannot open file ($filename)"; 
//         exit; 
//   } 
//
//   // Write $somecontent to our opened file. 
//   if (fwrite($handle, $sHTML_Header) === FALSE) { 
//       echo "Cannot write to file ($filename)"; 
//       exit; 
//   }else{ 
//      //file is ok so write the other elements to it 
//      fwrite($handle, $sHTML_Content); 
//      fwrite($handle, $sHTML_Footer); 
//   } 
//
//   fclose($handle); 
//
//}else{ 
//   echo "The file $filename is not writable"; 
//} 
//
////redirect the user to the html page 
//header("location:$filename"); 
}
?>  