<?php
session_start();
session_destroy();
echo " <script>alert('Anda telah logout');</script>";
echo "<script>location='loginadmin.php'</script>";


?>