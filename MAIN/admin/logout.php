<?php
session_start();
include('include/config.php');
$_SESSION['adminlogin']=="";
date_default_timezone_set('Asia/Dhaka');
$ldate=date( 'd-m-Y h:i:s A', time () );
session_unset();
//session_destroy();
$_SESSION['errmsg']="You have successfully logout";
?>
<script language="javascript">
document.location="sign-in-up.php";
</script>
