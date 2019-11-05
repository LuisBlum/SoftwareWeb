<?php
session_start();
session_unset();
session_destroy();
header("Location: ../ventanas/login.php", true, 301);
exit();