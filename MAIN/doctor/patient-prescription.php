<?php
session_start();
//error_reporting(0);
include('../../include/config.php');

include('include/checklogin.php');
check_login();
date_default_timezone_set('Asia/Dhaka');
$up_date=date( 'd-m-Y h:i:s A', time () );

// $phe = mysqli_query($con,"SELECT * FROM patientcode WHERE ph_id='".$_SESSION['id']."'");
// $ro=mysqli_fetch_array($phe);
// if($ro>0){
	$value=0;
	$up=mysqli_query($con,"UPDATE patientcode set value='$value' WHERE ph_id= '".$_SESSION['id']."'");
// }


if(isset($_POST['submit']))
{
	$emailph = mysqli_query($con,"SELECT * FROM users WHERE uniqueid='".$_POST['uniqueid']."'");
	if(mysqli_num_rows($emailph)>0)
	{
		$row=mysqli_fetch_array($emailph);
	$phemail=$row['email'];
	$uniqueid=$_POST['uniqueid'];
	$_SESSION['uniqueid']=$uniqueid;
		header("Location: deno.php");
	}
	
	
	// $ucode=substr(rand(),0,4);

	
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Doctor  | Create Prescription</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../../vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="../../vendor/fontawesome/css/font-awesome.min.css">
		<link href="../../vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="../../vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="../../vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="../../vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="../../vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="../../vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="../../vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="../../assets/css/styles.css">
		<link rel="stylesheet" href="../../assets/css/plugins.css">
		<link rel="stylesheet" href="include/sidebar-menu.css">

		<style>
			body{
				padding: 0;
				margin: 0;
				background: #607D8B;
			}
		</style>
	</head>
	<body>
		<div id="app">
<?php include('include/sidebar-menu.php');?>
			<div class="app-content">

				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title" style="border-bottom:2px solid black; background-color:#673ab7;">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle" style="color: floralwhite"><b>Patients History</b></h1>
								</div>
							</div>
						</section>

								<div class="row"> <br><br>
										<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-2">
										<div class="box-login" style="outline:#4CAF50 solid 2px;">
													<form class="form-login" autocomplete="off" method="post" action="">
        							<fieldset>
        							<legend>
        								Fill up the form
        							</legend>
        							<p>
        								Please enter Patient Unique Id.<br />
        								<span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span>
        							</p>
        							<div class="form-group">
                       			 <span class="input-icon">
        									<input type="text" class="form-control" name="uniqueid" placeholder=" Enter Patient's Unique Id" required>
        									<i class="fa fa-id-card-o" style="font-size:18px;color:green"></i> </span>
        							</div>
        								<button type="submit" class="btn btn-primary pull-right" name="submit">
        									Get Prescription <i class="fa fa-arrow-circle-right"></i>
        								</button>
        							</div>
									</form>
                   					 </div>

								</div>

						</div>

				</div>
			</div>
			<br><br><br><br>
			<!-- start: FOOTER -->
	<?php include('../../include/footer.php');?>
			<!-- end: FOOTER -->

		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="../../vendor/jquery/jquery.min.js"></script>
		<script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="../../vendor/modernizr/modernizr.js"></script>
		<script src="../../vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="../../vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="../../vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="../../vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="../../vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="../../vendor/autosize/autosize.min.js"></script>
		<script src="../../vendor/selectFx/classie.js"></script>
		<script src="../../vendor/selectFx/selectFx.js"></script>
		<script src="../../vendor/select2/select2.min.js"></script>
		<script src="../../vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="../../vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="../../assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="../../assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();

				$("#table").on('click','.submit',function(){
						// get the current row
						var currentRow=$(this).closest("tr"); 
						
						var col1=currentRow.find("td:eq(0)").text(); // get current row 1st TD value
						
						$.ajax({
							url:"patient_ind_history.php",
							method:"POST",
							data:{phis:col1}
						}).done(function(data){
							$('#result').html(data);
						});
						
					});
			});
		</script>
		
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
		<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
	</body>
</html>
