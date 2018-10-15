<?php
/**
 * Created by IntelliJ IDEA.
 * User: rajeshnarayanarao
 * Date: 16/9/18
 * Time: 6:28 PM
 */
session_start();
if(!$_SESSION['jobseekerauth']) {
    header('Location: landing1.html');
}
echo '<p align="right">Jobseeker Signed in as '.$_SESSION['jobseekerid'].'     <a href="jobseekerlogout.php">Logout</a></p>';
echo '<h1 align="center">The Career Network</h1>';
echo '<h3 align="center">Welcome '.$_SESSION['jobseekerid'].'</h3>';