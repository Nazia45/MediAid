<?php
include('../../include/config.php');
if(!empty($_POST["specilizationid"]))
{

 $sql=mysqli_query($con,"select doctorName,id from doctors where specilization='".$_POST['specilizationid']."'");?>
 <option selected="selected">Select Doctor </option>
 <?php
 while($row=mysqli_fetch_array($sql))
 	{?>
  <option value="<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['doctorName']); ?></option>
  <?php
}
}


if(!empty($_POST["doctor"]))
{

 $sql=mysqli_query($con,"select docFees from doctors where id='".$_POST['doctor']."'");
 while($row=mysqli_fetch_array($sql))
 	{?>
 <option value="<?php echo htmlentities($row['docFees']); ?>"><?php echo htmlentities($row['docFees']); ?></option>
  <?php
}
}
if(!empty($_POST["pp"]))
{

 $sql=mysqli_query($con,"select address from users where id='".$_POST['pp']."'");
 while($row=mysqli_fetch_array($sql))
 	{?>
 <option value="<?php echo htmlentities($row['address']); ?>"><?php echo htmlentities($row['address']); ?></option>
  <?php
}
}


?>
