<?php require("includes/function.php") ?>
<?php require("includes/session.php") ?>
<?php
session_destroy();
Redirect_to("user.php");
 ?>
