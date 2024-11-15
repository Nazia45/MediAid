<?php
session_start();
//error_reporting(0);
include('../../include/config.php');
include('include/checklogin.php');
check_login();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Pharmacist | Medicine Stock</title>
		<meta charset="utf-8" />
		<meta http-equiv="refresh" content="stock.php">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="../../vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="../../vendor/fontawesome/css/font-awesome.min.css">
		<!-- <link rel="stylesheet" href="../../vendor/themify-icons/themify-icons.min.css"> -->
		<link href="../../vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="../../vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="../../vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="../../vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="../../vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="../../vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="../../vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="../../assets/css/styles.css">
		<link rel="stylesheet" href="../../assets/css/plugins.css">
		<!-- <link rel="stylesheet" href="../../assets/css/themes/theme-1.css" id="skin_color" /> -->

		<link rel="stylesheet" href="../../include/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
    	<link rel="stylesheet" href="../../include/DataTables/Buttons-1.5.6/css/buttons.bootstrap4.min.css">

		<link rel="stylesheet" href="include/sidebar-menu.css">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

		<style>
		body{
				padding: 0;
				margin: 0;
				background: #607d8b;
				}
		 div#table_filter label::before{
				 content:"🔍 ";
				 font-size: 18px;
		}
		.panel-title{
					color: #00BCD4 !important;
					font-size: 20px !important;
				}
		</style>

	</head>
	<body>
		<div id="app">
			<?php include('include/sidebar-menu.php');?>
			<div class="app-content">

				<!-- end: TOP NAVBAR -->
				<div class="main-content">
					<div class="wrap-content container" id="container" style="margin-bottom: 20px">
						<!-- start: PAGE TITLE -->
						<section id="page-title" style="border-bottom:2px solid black; background-color:#673AB7;">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle" style="color: floralwhite"><b>Medicine Stock</b></h1>
								</div>

							</div>
						</section>

							<div class="row" style="padding: 20px 15px;">
						<a href="add.php" style="float:right; background: #3F51B5; border-radius: 8px">
							<button type="add" class="btn btn-o btn-primary" name="add" style="color: white">+ Add Medicine</button>
						</a> <br>

								<div class="col-md-12">
									<div class="row margin-top-30">
										<div class="col-lg-11 col-md-12" style="background: white; padding: 20px">
												<div class="panel-heading">
													<h5 class="panel-title">Medicine Stock List</h5>
											</div>

												<div class="panel-body">

															<?php

										          $sql = " SELECT * FROM medicine WHERE  p_id='".$_SESSION['id']."'";
										          $result = mysqli_query($con, $sql);
										          if (mysqli_num_rows($result) > 0) {
										          $output .= '
										          <div class="table-responsive">

										          <table id="table" class="table table-striped table-bordered">
										          <thead>
										          <tr>
										           <th>Medicine Name</th>
										           <th>Company Name</th>
										           <th>Available</th>
										           <th width="30%;">Description</th>
										           <th>Update</th>
										           <th>Delete</th>
										          </tr>
										          </thead>';} ?>
										          <tbody>
										            <?php
										          $sql = " SELECT * FROM medicine WHERE  p_id='".$_SESSION['id']."'";
										               while($row = mysqli_fetch_assoc($result)) {
										                $output .= '

										                <tr>
										                  <td> '. $row["name"].' </td>
										                  <td> '. $row["CompanyName"].' </td>
										                  <td> '. $row["status"].' </td>
										                  <td> '. $row["description"].' </td>
										                  <td><a href="update_medicine.php?id='.$row['id'].'"><i class="fa fa-edit" style="margin-left: 3px; color: blue; font-size:20px;"></i></a></td>
										                  <td><a href="delete.php?id='.$row['id'].'"><i class="fa fa-trash" style="margin-left: 3px; color: red; font-size:20px;"></i></a>
										                  </td>
										                </tr>';}
																		echo $output;
										           ?>
										        </tbody>
										    </table>


													<?php
													// include('../../include/config.php');
													// $sql = "SELECT id, name, catagory, status FROM medicine";
													// $result = mysqli_query($con, $sql);
													// mysqli_close($con);
													?>


													<p style="color:green; text-align:center; font-size: 20px;"> <span><?php echo $_SESSION['msg']; ?><?php echo $_SESSION['msg']="";?></span></p>
													<p style="color:red; text-align:center; font-size: 20px;"> <span><?php echo $_SESSION['msg1']; ?><?php echo $_SESSION['msg1']="";?></span></p>

												</div>
											</div>
										</div>

											</div>
										</div>

									</div>
								</div>
							</div>
						</div>

				<!-- start: FOOTER -->
					<?php include('../../include/footer.php');?>
				<!-- end: FOOTER -->
			</div>
			<!-- start: MAIN JAVASCRIPTS -->
			<script src="../../vendor/jquery/jquery.min.js"></script>
			<script src="../../assets/js/bootstrap.bundle.min.js"></script>

			<script src="../../include/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
			<script src="../../include/DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js"></script>

			<script src="../../include/DataTables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
			<script src="../../include/DataTables/Buttons-1.5.6/js/buttons.bootstrap4.min.js"></script>
			<script src="../../include/DataTables/JSZip-2.5.0/jszip.min.js"></script>
			<script src="../../include/DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
			<script src="../../include/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
			<script src="../../include/DataTables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
			<script src="../../include/DataTables/Buttons-1.5.6/js/buttons.print.min.js"></script>


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
			});
			</script>
			<!-- end: JavaScript Event Handlers for this page -->
			<!-- end: CLIP-TWO JAVASCRIPTS -->

			<script>
	        $(document).ready(function() {
	            var table = $('#table').DataTable( {
	                buttons: [ 'copy','csv','print', 'excel', 'pdf' ],
	                dom:
	                "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
	                "<'row'<'col-md-12'tr>>" +
	                "<'row'<'col-md-5'i><'col-md-7'p>>",
	                lengthMenu:[
	                    [5,10,25,50,100,-1],
	                    [5,10,25,50,100,"All"]
	                ]

							} );

	            table.buttons().container()
	                .appendTo( '#table_wrapper .col-md-5:eq(0)' );
	        } );
	    </script>
<script type="text/javascript">
if ( window.history.replaceState ) {
			 window.history.replaceState( null, null, window.location.href );
	 }
</script>
	</body>
</html>
