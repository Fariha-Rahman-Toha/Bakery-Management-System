<?php
include('../sqlconfig/con-config.php');
    session_destroy();// logs out
    header('location:login.php');
?>