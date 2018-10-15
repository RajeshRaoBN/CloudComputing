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

        $sql="SELECT * FROM `job_provider_info` WHERE `job_provider_user_id`='$userid' && `job_provider_password`='$passwordencripted'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result)>=1) {
            session_start();
            $_SESSION['jobproviderid'] = $userid;
            $_SESSION['jobproviderauth'] = 'true';
            header('Location: jobproviderindex.php');
        }
        else
            echo '<div align="center">Either the username or password is entered incorrectly</div>';
            echo '<meta HTTP-EQUIV="REFRESH" content="5; url=landing2.html">';
            echo '<div align="center"><a href="landing2.html">Click here for job provider login you will be redirected in 5.. sec</a></div>';
        
        ?>

    </body>
</html>
