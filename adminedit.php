<?php
  session_start();
  
  $sessname=$_SESSION['NAME'];

  if(!isset($_SESSION['NAME'])){
    header("Location: admin.php");
    exit();
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Staff</title>
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
      input[type="email"]:hover {
        background: #c0e5f2;
        color:;
      }
      textarea:hover{
        background: #c0e5f2;
      }
      select:hover{
        background: #c0e5f2;
      }
    </style>

    <style type="text/css">
    .circularphoto {
      box-shadow: 0 0 20px rgba(30,144,255, .9);
      -webkit-box-shadow: 0 0 20px rgba(30,144,255, .9);
      -moz-box-shadow: 0 0 20px rgba(30,144,255, .9);
    }
  </style>

<style type="text/css">
      .circular {
      width: 75px;
      height: 75px;
      border-radius: 75px;
      -webkit-border-radius: 75px;
      -moz-border-radius: 70px;
      box-shadow: 0 0 30px rgba(30,144,255, .9);
      -webkit-box-shadow: 0 0 30px rgba(30,144,255, .9);
      -moz-box-shadow: 0 0 30px rgba(30,144,255, .9);
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
    include_once("employeesclass.php");
    $employee= new employeesclass();
    $employeeinfo = $employee-> getEmployeeById($id);
    $row=$employee->fetch();
    $i=0;
    while($row){
      $id=$row['ID'];
      $photo=$row['PHOTO_ADDRESS'];
      $name=$row['NAME'];
      $staffid=$row['STAFF_ID'];
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

    if(isset($_REQUEST['save'])){
      $root = getcwd()."/";
      $name = $_REQUEST['name'];
      $staffid = $_REQUEST['staffid'];
      $office = $_REQUEST['office'];
      $rank = $_REQUEST['rank'];
      $division = $_REQUEST['division'];
      $department = $_REQUEST['department'];
      $email = $_REQUEST['email'];
      $gota = $_REQUEST['gota'];
      $phone = $_REQUEST['phone'];
      $ext = $_REQUEST['ext'];
      $profile = $_REQUEST['profile'];

        //File upload into the server location
        $target_dir = "photos/";
        if(basename($_FILES["photonew"]["name"]) == "") {
          $target_file = $photo;
        }else{
          unlink($photo);
          $target_file = $target_dir . basename($_FILES["photonew"]["name"]);
        }
        echo $target_file;
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "File already exists.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $root.$target_file)) {
                echo "The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

            include_once("employeesclass.php");
            $edit= new employeesclass();
            $editinfo = $edit-> editEmployee($id,$staffid,$name,$office,$rank,$division,$department,$ext,$email,$phone,$target_file,$gota,$profile);

            header("Location:adminadd.php");
    }
    ?>


    <!-- Start Top Bar -->
    <div class="top-bar">
      <div class="top-bar-left">
        <ul class="menu">
          <li class="menu-text">NCA Staff Directory</li>
          <li>
            <?php
            echo "Welcome <b style='color:#1E90FF'>".$sessname."</b>";
            ?>
          </li>
        </ul>
      </div>
      <div class="top-bar-right">
        <ul class="menu">
          <li><a href="adminadd.php" class="button">Home</a></li>
          <li><a href="logout.php" class="button"> Logout</a></li>
        </ul>
      </div>
    </div>
    <!-- End Top Bar -->

    <br>
    <div class="row large-centered">
      
      <div class=" panel callout secondary medium">
        <form  name="form" id="formId" action="" method="POST" enctype="multipart/form-data">
          <div class="row column center">
              <h3>Edit Employee Information:</h3>
              <div class="columns medium-3">
                <label>Upload New Photo<b></b></label>
                <img id="photo" name="photo" class="circularphoto small-block-grid-1 medium-block-grid-1 large-block-grid-1" src="<?php echo $photo?>"/>
                <br><br>
                <input type="file" name="photonew" id="photonew">
              </div>
              <div class="columns medium-9">
                <div class="row">
                  <div class="columns medium-6">
                    <label>Name</label>
                    <input type="text" class="span2" id="name" name="name" value="<?php echo $name?>">
                  </div>
                  <div class="columns medium-2">
                    <label>Staff ID</label>
                    <input type="text" class="span2" id="staffid" name="staffid" value="<?php echo $staffid?>">
                  </div>
                  <div class="columns medium-4">
                    <label>Office</label>
                    <select id="office" class="span2" type="select" name="office" >
                    <?php
                        include_once("employeesclass.php");
                        $offices= new employeesclass();
                        $officeinfo = $offices-> getOffices();

                        $row=$offices->fetch();
                        $i=0;

                        echo"<option value=''>Select Office</option>";
                        while($row){
                          if($office==$row['NAME']){
                            $selected="selected";
                          }else{
                            $selected="";
                          }
                          echo"<option $selected value='{$row['NAME']}''>{$row['NAME']}</option>";
                          $i++;
                          $row=$offices->fetch();
                        }
                    ?>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="columns medium-4">
                    <label>Designation/Rank</label>
                    <select type="select" class="span2" id="rank"  name="rank" required>
                    <?php
                        include_once("employeesclass.php");
                        $ranks= new employeesclass();
                        $rankinfo = $ranks-> getRank();

                        $row=$ranks->fetch();
                        $i=0;

                        echo"<option value=''>Select Rank</option>";
                        while($row){
                          if($rank==$row['NAME']){
                            $selected="selected";
                          }else{
                            $selected="";
                          }
                          echo"<option $selected value='{$row['NAME']}''>{$row['NAME']}</option>";
                          $i++;
                          $row=$ranks->fetch();
                        }
                    ?>
                    </select>
                  </div>
                  <div class="columns medium-4">
                    <label>Division</label>
                    <select type="select" class="span2" id="division" name="division" required>
                    <?php
                      include_once("employeesclass.php");
                      $divisions= new employeesclass();
                      $divisioninfo = $divisions-> getDivision();

                      $row=$divisions->fetch();
                      $i=0;

                      echo"<option value=''>Select Division</option>";
                      while($row){
                        if($division==$row['NAME']){
                            $selected="selected";
                          }else{
                            $selected="";
                          }
                        echo"<option $selected value='{$row['NAME']}''>{$row['NAME']}</option>";
                        $i++;
                        $row=$divisions->fetch();
                      }
                  ?>
                  </select>
                  </div>
                  <div class="columns medium-4">
                    <label>Department</label>
                    <input type="text" class="span2" id="department" name="department" value="<?php echo $department?>">
                  </div>
                </div>
                <div class="row">
                  <div class="columns medium-4">
                    <label>Email</label>
                    <input id="email" type="email" name="email" value="<?php echo $email?>">
                  </div>
                  <div class="columns medium-3">
                    <label>GOTA Number</label>
                    <input type="text" class="span2" id="gota" name="gota" value="<?php echo $gota?>">
                  </div>
                  <div class="columns medium-3">
                    <label>Mobile Number</label>
                    <input type="text" class="span2" id="phone" name="phone" value="<?php echo $phone?>">
                  </div>
                  <div class="columns medium-2">
                    <label>Phone Extension</label>
                    <input type="text" class="span2" id="ext" name="ext" value="<?php echo $ext?>">
                  </div>
                </div>
                <label>Brief Profile</label>
                <textarea id="profile" name="profile" style="height:115px;" value="<?php echo $profile?>"><?php echo $profile?></textarea>
              </div>
            
          </div>

          <input id="save" type="submit" class="button expanded" name="save" value="Save Information">
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
