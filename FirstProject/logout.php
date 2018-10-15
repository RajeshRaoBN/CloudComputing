<?php
/**
 * Created by IntelliJ IDEA.
 * User: rajeshnarayanarao
 * Date: 16/9/18
 * Time: 9:46 PM
 */
session_start();
session_unset();
session_destroy();
header('location:index.html');