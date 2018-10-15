<h1 align="center">The Career Network</h1>
<?php
/**
 * Created by IntelliJ IDEA.
 * User: rajeshnarayanarao
 * Date: 7/9/18
 * Time: 9:02 AM
 */
$useremail = $_POST["useremail"];
$userid = $_POST["userid"];
$password = $_POST["password"];
$passwordencripted = md5($password);
$mysql_host='localhost';
$mysql_user='root';
$mysql_password='root';
$mysql_database='jobboard';
$mysql_port=8889;

$conn = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_database, $mysql_port);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT `job_seeker_email` FROM `job_seeker_info` WHERE `job_seeker_email`='$useremail'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>=1) {
    echo '<h3 align="center">Your email already exists</h3>';
    echo '<meta HTTP-EQUIV="REFRESH" content="5; url=landing1.html">';
    echo '<div align="center"><a href="landing1.html">Click here for job seeker login or you will be redirected in 5.. sec</a></div>';
    echo '<div align="center"><a href="jsforgottenpassword.html">Click here to recover forgotten password</a></div>';
}
else {
    $result = mysqli_query($conn,"SELECT `job_seeker_user_id` FROM `job_seeker_info` WHERE `job_seeker_user_id`='$userid'");
    if(mysqli_num_rows($result)>=1) {
        echo '<h3 align="center">The userid is already taken</h3>';
        echo '<meta HTTP-EQUIV="REFRESH" content="5; url=jobseekersignup.html">';
        echo '<div align="center"><a href="jobseekersignup.html">Click here to choose a new userid you will be redirected in 5.. sec</a></div>';
    }
    else {
        $sql = "INSERT INTO `job_seeker_info` (`job_seeker_id`, `job_seeker_email`, `job_seeker_user_id`, `job_seeker_password`) VALUES (NULL, '$useremail', '$userid', '$passwordencripted');";
        if ($conn->query($sql) === TRUE) {
            echo '<h3 align="center">Your login has been successfully created</h3><br><br>';
            echo '<meta HTTP-EQUIV="REFRESH" content="5; url=landing1.html">';
            echo '<div align="center"><a href="landing1.html">Click here for job seeker login you will be redirected in 5.. sec</a></div>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}