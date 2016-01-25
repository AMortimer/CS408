<?php

    //Create Connection
     mysql_connect("devweb2014.cis.strath.ac.uk", "rnb12162", "consista");

      mysql_select_db("rnb12162") or die(mysql_error());

     $query = "SELECT * FROM forum 
	       ORDER BY date
	       DESC";
	       
      $result = mysql_query($query) or die(mysql_error());

  if(mysql_num_rows($result) > 0) {
	  	echo "<table id='forum'><tr><th>Date</th><th>Title</th><th>Entry</th>";

        while($row = mysql_fetch_array($result)){
			echo "<tr>";
			echo "<td>" . $row['date']  . "</td>";
			echo "<td>" . $row['title'] . "</td>";
			echo "<td>" . $row['body']	 . "</td>";
			echo "</tr>";
		}
		echo "</table>";
	  
	} else {
			echo "No entries";
	}
?>