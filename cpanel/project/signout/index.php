<?php
// session
session_start();
// destroy
session_unset();
session_destroy();

// unset all
?>
<?php
session_start();
$_SESSION['logout']=TRUE;
header('Location: ../');
?>