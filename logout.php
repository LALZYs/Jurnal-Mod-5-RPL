<?php
session_start();
session_destroy();
header("Location: index.php");
console.log("dah logout");
?>
