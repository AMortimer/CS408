<?php
session_start();
$sessId = session_id();

$log_name = $_GET['y1'];
$log_pass = $_GET['y2'];

$conn = mysqli_connect("devweb2014.cis.strath.ac.uk", "rnb12162", "consista");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (isset($log_name) && isset($log_pass)) {
    $query = ("SELECT * FROM helpers WHERE username = '$log_name' && password = '$log_pass'");
    $idQuery = ("SELECT username FROM helpers WHERE username = '$log_name' && password = '$log_pass'");

    $idResult = mysqli_query($conn, $idQuery);
    $Uid = mysqli_fetch_array($idResult);
    echo $username['username'];
    ?>
    <script>
        var id = "<?php Print($username['username']); ?>";
        if (localStorage) {
            localStorage.username = id;
        }
        document.getElementById("username").value = id;
    </script>
    <?php
    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result);


    if ($count > 0) {
        ?>
        <script type="text/javascript">
            window.location.href = "home.php";
            if (localStorage) {
                if (localStorage.username) {
                    var uName = localStorage.username;
                    console.log(uName);
                    document.getElementById("username").value = uName;
                }
            }
        </script>	
        <?php
    } else {
        ?>
        <script type="text/javascript">
            alert("There is a problem with your login details");
            window.location.href = "home.php";
        </script>	
        <?php
    }
}
?>