<?php
session_start();
include('../../include/config.php');
$_SESSION['plogin']=="";
date_default_timezone_set('Asia/Dhaka');
$ldate=date( 'd-m-Y h:i:s A', time () );
mysqli_query($con,"UPDATE plog  SET logout = '$ldate' WHERE uid = '".$_SESSION['id']."' ORDER BY id DESC LIMIT 1");
session_unset();
//session_destroy();
$_SESSION['errmsg']="You have successfully logout";
?>
<script language="javascript">
document.location="sign-in-up.php";
</script>
