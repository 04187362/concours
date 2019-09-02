
<?php
	session_start();
	unset($_SESSION);
	session_destroy();
	header("location:index.php?module=users&action=login");
?>
