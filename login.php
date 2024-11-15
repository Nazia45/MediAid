<?php
session_start();
if(isset($_SESSION['role'])){
  switch ($_SESSION['role']) {
    case 'doctor':
      header("location: MAIN/doctor/dashboard.php");
    break;
    case 'patient':
      header("location: MAIN/patient/dashboard.php");
    break;
    case 'pharmacist':
      header("location: MAIN/pharmacist/dashboard.php");
    break;
    case 'admin':
      header("location: MAIN/admin/dashboard.php");
    break;

    default:
      // code...
      break;
  }
}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>MediAid | Login</title>
    <link rel="stylesheet" href="homecss/login.css">

    <!-- <style media="screen">
      *{
        margin:0;
        padding:0;
      }

    </style> -->
  </head>
  <body>
<section class="total-bdy">
      <header>
          <a href="index.html" class="logo"><h2 style="color:white; margin:00;">MediAid</h2> A online medical service platform</a>
          <!-- <a href="#" class="contact">Contact</a> -->
      </header>

      <div class="contain" id="contain">

              <div class="card">
                  <div class="box" id="img1">
                      <div class="content">
                          <h3>Doctor</h3>
                          <p>Hello, <br>You can login or register yourself here as a Doctor</p>
                            <a href="MAIN/doctor/dashboard.php" class="si">Sign In</a> <!-- <a href="#" class="su">Sign up</a> -->
                      </div>
                  </div>
              </div>

              <div class="card">
                  <div class="box" id="img2">
                      <div class="content">
                          <!-- <h2>02</h2> -->
                          <h3>Patient</h3>
                          <p>Hello, <br>You can login or register yourself here as a Patient</p>
                          <a href="MAIN/patient/dashboard.php" class="si">Sign In</a>
                      </div>
                  </div>
              </div>


              <div class="card">
                  <div class="box" id="img4">
                      <div class="content">
                          <!-- <h2>04</h2> -->
                          <h3>Admin</h3>
                          <p>Hello, <br>Login here and manage everything</p>
                          <a href="MAIN/admin/dashboard.php" class="si">Sign In</a>
                      </div>
                  </div>
              </div>


              <div class="card">
                  <div class="box" id="img3">
                      <div class="content">
                          <!-- <h2>03</h2> -->
                          <h3>Pharmacist</h3>
                          <p>Hello, <br>You can login or register yourself here as a Pharmacist</p>
                          <a href="MAIN/pharmacist/dashboard.php" class="si">Sign In</a>
                      </div>
                  </div>
              </div>



              <div class="card">
                  <div class="box" id="img5">
                      <div class="content">
                          <!-- <h2>05</h2> -->
                          <h3>Laboratorist</h3>
                          <p>Hello, <br>You can login or register yourself here as a Laboratorist</p>
                          <a href="Page Not found/index.html" class="si">Sign In</a>
                      </div>
                  </div>
              </div>
              </div>

    </section>



<!-- footer -->
    <div class="copyrightText">
      <p>
        Copyright © 2022 By MediAid. All Rights Reserved.
      </p>
    </div>

    <script type="text/javascript">
      // For Sticky Nav Bar
      window.addEventListener("scroll", function(){
          var header = document.querySelector("header");
          header.classList.toggle("sticky", window.scrollY > 0);
        })

    </script>

  </body>
</html>
