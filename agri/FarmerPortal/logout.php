<?php
session_start();
session_destroy();
echo "<script>window.open('../../home.html','_self')</script>";
?>
