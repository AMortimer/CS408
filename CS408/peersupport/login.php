<?php
session_start();
$sessId = session_id();

$username = $_GET['username'];
$password = $_GET['password'];

$conn = mysqli_connect("devweb2014.cis.strath.ac.uk", "rnb12162", "consista");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (isset($username) && isset($password)) {
    $query = ("SELECT * FROM users WHERE username = '$username' && password = '$password'");
    $idQuery = ("SELECT userid FROM users WHERE username = '$username' && password = '$password'");

    $idResult = mysqli_query($conn, $idQuery);
    $userid = mysqli_fetch_array($idResult);
    echo $userid['userid'];
    ?>
    <script>
        var id = "<?php Print($userid['userid']); ?>";
        if (localStorage) {
            localStorage.username = id;
        }
        document.getElementById("userid").value = id;
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