
<?php

include 'db_connection.php';
session_start();
session_unset();
session_destroy();
  header("Location: /beauty_parlour_management_system/login_page.php");
?>