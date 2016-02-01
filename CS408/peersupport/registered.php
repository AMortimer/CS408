<html>
    <head>
        <title>Register</title>
    </head>
    <body>
<?php
    // Check to see values have been set in the $_POST global array
    // for the name emailAddress keys

    // IF values set
    if ($_POST['password'] >= 6) {
        if($_POST['password'] == $_POST['confirm']){
            if(!empty($_POST['firstname']) && !empty($_POST['surname']) && !empty($_POST['email']) && !empty($_POST['course']) 
              && !empty($_POST['year'])){
                // Connect to database server
                mysql_connect("devweb2014.cis.strath.ac.uk", "rnb12162", "consista");

                // Select your database
                mysql_select_db("rnb12162") or die(mysql_error());

                // Build an SQL query to add the new entry into the helpers table
                mysql_query("INSERT INTO helpers
                (firstname, surname, email, course, year, password) VALUES('$_POST[firstname]', '$_POST[surname]', '$_POST[email]', '$_POST[course]', '$_POST[year]', '$_POST[password]' )")
                or die(mysql_error());  
                // Execute the query

                // Redirect to index.html
                header("Location: https://devweb2015.cis.strath.ac.uk/~rnb12162/CS408/peersupport/home.html");
              }
                    else {
                        echo "Form not filled in correctly! <br/>";
                        print_r ($_POST);
                        echo "<a href=https://devweb2015.cis.strath.ac.uk/~rnb12162/CS408/peersupport/register.html> Click here to register again</a>";
                          // provide a link back to addEntry.html
                    }
        }
            else {
                echo "Password does not match confirmation. Please try again.<br/>";
                echo "<a href=https://devweb2015.cis.strath.ac.uk/~rnb12162/CS408/peersupport/register.html> Click here to register again</a>";
            }
    }
      // ELSE values not set 

    else {
        echo "Password must be a minimum of 6 characters";
        echo "<a href=https://devweb2015.cis.strath.ac.uk/~rnb12162/CS408/peersupport/register.html> Click here to register again</a>";
    }
    
?>
</body>
</html>