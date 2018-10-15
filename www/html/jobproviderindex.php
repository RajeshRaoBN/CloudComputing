<?php
/**
 * Created by IntelliJ IDEA.
 * User: rajeshnarayanarao
 * Date: 16/9/18
 * Time: 6:28 PM
 */
session_start();
if(!$_SESSION['jobproviderauth']) {
    header('Location: landing2.html');
}
echo '<p align="right">Jobprovider Signed in as '.$_SESSION['jobproviderid'].'     <a href="jobproviderlogout.php">Logout</a></p>';
echo '<h1 align="center">The Career Network</h1>';
echo '<h3 align="center">Welcome '.$_SESSION['jobproviderid'].'</h3>';