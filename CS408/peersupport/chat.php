<?php

    //Create Connection
     mysql_connect("devweb2014.cis.strath.ac.uk", "rnb12162", "consista");

      mysql_select_db("rnb12162") or die(mysql_error());

     $query = "SELECT * FROM chat 
	       ORDER BY date DESC
               LIMIT 30";
	       
      $result = mysql_query($query) or die(mysql_error());

  if(mysql_num_rows($result) > 0) {
	  	echo "<table id='entries'><tr><th>Date</th><th>Message</th>";

        while($row = mysql_fetch_array($result)){
			echo "<tr>";
			echo "<td>" . $row['date']  . "</td>";
			echo "<td>" . $row['message']	 . "</td>";
			echo "</tr>";
		}
		echo "</table>";
	  
	} else {
			echo "No one is chatting";
	}
?>