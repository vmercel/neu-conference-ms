<?php
//echo "Hi";
$msg = "Hi";
$addr = "vmercel@yahoo.com";
header("Location: testmail.php?message=".$msg."&receiver=".$addr);
?>