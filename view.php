<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>View Employee</title>
    <link rel="shortcut icon" type="image/png" href="NCA.png"/>
    <link rel="stylesheet" href="css/foundation.min.css">
    <link rel="stylesheet" href="css/foundation-datepicker.css">
    <link rel="stylesheet" href="foundation/fonts/foundation-icons.css">

    <style type="text/css">
      .button{
        background-color:#42b2d7;
      }
      .top-bar{
        background-color:#262626;
        color:white;
        width:100%;
      }
      .top-bar .menu{
        background-color:#262626;
      }
      .top-bar .button{
        background-color:#404040;
      }
      .top-bar .button:hover{
        background-color:#1a1a1a;
      }
      input[type="text"]:hover {
        background: #c0e5f2;
        color:;
      }
      textarea:hover{
        background: #c0e5f2;
      }
    </style>

    <style type="text/css">
    .circularphoto {
      box-shadow: 0 0 10px rgba(30,144,255, .9);
      -webkit-box-shadow: 0 0 10px rgba(30,144,255, .9);
      -moz-box-shadow: 0 0 10px rgba(30,144,255, .9);
    }
  </style>

  <style type="text/css">
      .circular {
      width: 75px;
      height: 75px;
      border-radius: 75px;
      -webkit-border-radius: 75px;
      -moz-border-radius: 70px;
      box-shadow: 0 0 30px rgba(4, 17, 22, .9);
      -webkit-box-shadow: 0 0 30px rgba(4, 17, 22, .9);
      -moz-box-shadow: 0 0 30px rgba(4, 17, 22, .9);
    }
</style>

<style type="text/css">
      .circularbottom {
      width: 30px;
      height: 30px;
      border-radius: 30px;
      -webkit-border-radius: 30px;
      -moz-border-radius: 70px;
      box-shadow: 0 0 20px rgba(30,144,255, .9);
      -webkit-box-shadow: 0 0 20px rgba(30,144,255, .9);
      -moz-box-shadow: 0 0 20px rgba(30,144,255, .9);
    }
</style>

  </head>
  <body>
    <?php
    $id=$_REQUEST['id'];
    //$id="UTESt";
    include_once("employeesclass.php");
    $employee= new employeesclass();
    $employeeinfo = $employee-> getEmployeeById($id);
    $row=$employee->fetch();
    $i=0;
    while($row){
      $photo=$row['PHOTO_ADDRESS'];
      $name=$row['NAME'];
      $office=$row['LOCATION'];
      $rank=$row['DESIGNATION'];
      $division=$row['DIVISION'];
      $department=$row['DEPARTMENT'];
      $email=$row['OFFICE_EMAIL'];
      $gota=$row['GOTANUMBER'];
      $phone=$row['MOBILE_PHONE'];
      $ext=$row['EXTENSION'];
      $profile=$row['PROFILE'];
      $i++;
      $row=$employee->fetch();
    }
    ?>

    <!-- Start Top Bar -->
    <div class="top-bar">
      <div class="top-bar-left">
        <ul class="menu">
          <li class="menu-text">NCA Employee Directory</li>
        </ul>
      </div>
      <div class="top-bar-right">
        <ul class="menu">
          <li><a href="index.php" class="button">Home</a></li>
          <li><a href="admin.php" class="button">Admin Access</a></li>
        </ul>
      </div>
    </div>
    <!-- End Top Bar -->

    <br>
    <div class="row large-centered">
      
      <div class=" panel callout medium" style="color:#42b2d7;">
        <form  name="form" id="formId" action="" method="POST" enctype="multipart/form-data">
          <div class="row column center">
              <h3>Employee Information:</h3>
              <div class="columns medium-3">
                <label>Employee Photo<b></b></label>
                <img id="photo" name="photo" class="circularphoto small-block-grid-1 medium-block-grid-1 large-block-grid-1" src="<?php echo $photo?>"/>
              </div>
              <div class="columns medium-9">
                <div class="row">
                  <div class="columns medium-7">
                    <label>Name</label>
                    <input type="text" class="span2" id="name" disabled name="name" value="<?php echo $name?>">
                  </div>
                  <div class="columns medium-5">
                    <label>Office</label>
                    <input id="office" class="span2" type="text" name="office" disabled value="<?php echo $office?>">
                  </div>
                </div>
                <div class="row">
                  <div class="columns medium-4">
                    <label>Designation/Rank</label>
                    <input type="text" class="span2" id="rank" disabled name="rank" value="<?php echo $rank?>">
                  </div>
                  <div class="columns medium-4">
                    <label>Division</label>
                    <input type="text" class="span2" id="division" disabled name="division" value="<?php echo $division?>">
                  </div>
                  <div class="columns medium-4">
                    <label>Department</label>
                    <input type="text" class="span2" id="department" disabled name="department" value="<?php echo $department?>">
                  </div>
                </div>
                <div class="row">
                  <div class="columns medium-4">
                    <label>Email</label>
                    <input id="email" type="text" name="email" disabled value="<?php echo $email?>">
                  </div>
                  <div class="columns medium-3">
                    <label>GOTA Number</label>
                    <input type="text" class="span2" id="gota" disabled name="gota" value="<?php echo $gota?>">
                  </div>
                  <div class="columns medium-3">
                    <label>Mobile Number</label>
                    <input type="text" class="span2" id="phone" disabled name="phone" value="<?php echo $phone?>">
                  </div>
                  <div class="columns medium-2">
                    <label>Phone Extension</label>
                    <input type="text" class="span2" id="ext" disabled name="ext" value="<?php echo $ext?>">
                  </div>
                </div>
                <label>Brief Profile</label>
                <textarea id="profile" name="profile" style="height:115px;" disabled value="<?php echo $profile?>"><?php echo $profile?></textarea>
              </div>
            
          </div>
        </form>
      </div>


    <hr>

    <div class="row text-center">
          <p>© Copyright - 2016. National Communications Authority. All rights reserved. <a href='http://intranet.nca.org.gh/' target="_blank"><img class="circularbottom" src="NCA logo.jpg" alt="NCA logo.jpg"></a> <a href="intranet.nca.org.gh" target="_blank">Intranet Portal Home</a></p>
      </div> 
    
    </div>

    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src='lib/moment.min.js'></script>
    <script src='lib/jquery.min.js'></script>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>

    <script>
      $(document).foundation();
    </script>
    
  </body>
<html>
