<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Nasir">
	
  <!-- Bootstrap core CSS-->
  <link href="assets\css\bootstrap.min.css" rel="stylesheet">
  <!-- Main styles -->
  <link href="assets\css\admin.css" rel="stylesheet">
  <!-- Icon fonts-->
  <link href="assets\font-awesome\css\font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Plugin styles -->
  <link href="assets\css\dataTables.bootstrap4.css" rel="stylesheet">
  <!-- WYSIWYG viewor -->
  <link rel="stylesheet" href="assets\summer-note\summernote-bs4.css">
  <!-- Your custom styles -->
  <link href="assets\css\default.css" rel="stylesheet">
  <link href="assets\css\custom.css"  rel="stylesheet">
	
</head>
<body class="fixed-nav sticky-footer" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">
    <a class="navbar-brand" href="../index.php">
      <!-- <img src="img\logo.svg" data-retina="true" alt="" width="142" height="36"> -->
      <h2 class="text-white" style="height: 36px">Doctors Appiontment</h2>
    </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

      <li class="nav-item " >
        <a class="nav-link" href="home.php">
          <i class="fa fa-fw fa-dashboard"></i>
          <span class="nav-link-text font-josefin">Dashboard</span>
        </a>
      </li>

      <li class="nav-item dropdown " type="button" data-toggle="collapse" data-target="#post-dropdown" aria-expanded="false" aria-controls="post-dropdown">
        <span class="nav-link">
          <i class="fa fa-users fa-fw" aria-hidden="true"></i>
          <span class="nav-link-text font-josefin">Doctors</span>
        </span>
        <div class="collapse " id="post-dropdown">
          <div class="card card-body bg-dark">
           
              <a class="nav-link" href="all-doctor.php">
                <i class="fa fa-list-ul fa-fw" aria-hidden="true"></i>
                <span class="nav-link-text font-josefin">All Doctors</span>
              </a>
              <a class="nav-link" href="add-doctor.php">
                <i class="fa fa-plus-circle fa-fw" aria-hidden="true"></i>
                <span class="nav-link-text font-josefin">Add Doctors</span>
              </a>

          </div>
        </div>
      </li>


      <li class="nav-item " >
        <a class="nav-link" href="appiontment.php">
          <i class="fa fa-fw fa-edit"></i>
          <span class="nav-link-text font-josefin">Appointment</span>
        </a>
      </li>
      
      <li class="nav-item " >
        <a class="nav-link" href="profile.php">
          <i class="fa fa-fw fa-user"></i>
          <span class="nav-link-text font-josefin">Profile (<?php echo $session->get('login_user_name')?>)</span>
        </a>
      </li>


      


      <li class="nav-item " >
        <a class="nav-link" href="log-out.php">
          <i class="fa fa-fw fa-dashboard"></i>
          <span class="nav-link-text font-josefin">logout</span>
        </a>
      </li>

		
	
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>

    </div>
  </nav>
  <!-- /Navigation-->