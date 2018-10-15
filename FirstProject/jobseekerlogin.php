<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>The Career Network</title>
    </head>
    <body>
        <?php
        /**
         * Created by IntelliJ IDEA.
         * User: rajeshnarayanarao
         * Date: 7/9/18
         * Time: 9:02 AM
         */

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

        $sql="SELECT * FROM `job_seeker_info` WHERE `job_seeker_user_id`='$userid' && `job_seeker_password`='$passwordencripted'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result)>=1) {
            session_start();
            $_SESSION['jobseekerid'] = $userid;
            $_SESSION['jobseekerauth'] = 'true';
            header('Location: http://localhost:8888/index.php');
        }
        else
            echo "Either the username or password is entered incorrectly"
        ?>

    </body>
</html>
