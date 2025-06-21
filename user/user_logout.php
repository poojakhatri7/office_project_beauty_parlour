<?php

include 'user_session.php';
session_start();
session_unset();
session_destroy();
 header("Location: /beauty_parlour_management_system/login_page.php");
//  header("Location: /beauty_parlour_management_system/admin2/admin_login1.php");
?>