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
    <title>Admin Access</title>
    <link rel="shortcut icon" type="image/png" href="NCA.png"/>

    <link rel="stylesheet" href="css/foundation.min.css">
    <link rel="stylesheet" href="foundation/fonts/foundation-icons.css">
    <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="css/dataTables.foundation.min.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.foundation.min.css">

    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src='lib/moment.min.js'></script>
    <script src='lib/jquery.min.js'></script>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <script src="dist/sweetalert.min.js"></script>
    <script type="text/javascript" language="javascript" src="js/jquery.js"></script> 
    <script type="text/javascript" language="javascript" src="js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="js/dataTables.foundation.min.js"></script>
    <script type="text/javascript" language="javascript" src="js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" language="javascript" src="js/responsive.foundation.min.js"></script>
  
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

    <style type="text/css">
    .circularphoto {
      box-shadow: 0 0 10px rgba(30,144,255, .9);
      -webkit-box-shadow: 0 0 10px rgba(30,144,255, .9);
      -moz-box-shadow: 0 0 10px rgba(30,144,255, .9);
    }

    .inactivephoto {
      box-shadow: 0 0 10px rgba(4, 17, 22, .9);
      -webkit-box-shadow: 0 0 10px rgba(4, 17, 22, .9);
      -moz-box-shadow: 0 0 10px rgba(4, 17, 22, .9);
    }
    .effect {
      border: none;
      margin: 0 auto;
    }
    .effect:hover {
      -webkit-transform: scale(5);
      -moz-transform: scale(5);
      -o-transform: scale(5);
      transform: scale(5);
      transition: all 0.3s;
      -webkit-transition: all 0.3s;
    }
  </style>

  <script type="text/javascript" language="javascript" >
      $(document).ready(function() {
          var dataTable = $('#employee').DataTable( {
            "responsive": true,
            "columnDefs":[
                  {"width":"5%","targets": 0}
              ],
              "order":[[1,"asc"]],
              "processing": true,
              "serverSide": true,
              "ajax":{
                  url :"adminemployeedata.php", // json datasource
                  type: "post",  // method  , by default get
                  error: function(){  // error handling
                      $(".employee-error").html("");
                      $("#employee").append('<tbody class="sample-data-error"><tr><th colspan="5">No data found in the server</th></tr></tbody>');
                      $("#employee_processing").css("display","none");             
                  }
              }
          } );
      } );
  </script>

  <script type="text/javascript" language="javascript" >
      $(document).ready(function() {
          var dataTable = $('#inactiveemployee').DataTable( {
            "responsive": true,
            "columnDefs":[
                  {"width":"5%","targets": 0}
              ],
              "order":[[1,"asc"]],
              "processing": true,
              "serverSide": true,
              "ajax":{
                  url :"adminemployeeinactivedata.php", // json datasource
                  type: "post",  // method  , by default get
                  error: function(){  // error handling
                      $(".inactiveemployee-error").html("");
                      $("#inactiveemployee").append('<tbody class="sample-data-error"><tr><th colspan="5">No data found in the server</th></tr></tbody>');
                      $("#inactiveemployee_processing").css("display","none");             
                  }
              }
          } );
      } );
  </script>

  </head>
  <body>
<?php
if (isset($_REQUEST['submit'])) {

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
  $target_file = $target_dir . basename($_FILES["photo"]["name"]);
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
      $add= new employeesclass();
      $addinfo = $add-> addEmployee($staffid,$name,$office,$rank,$division,$department,$ext,$email,$phone,$target_file,$gota,$profile);

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
          <li><a href="logout.php" class="button"> Logout</a></li>
        </ul>
      </div>
    </div>
    <!-- End Top Bar -->

    <br>
    
    <div class="row column">
      <ul class="vertical medium-horizontal menu expanded text-center">

        <li><a href="#"><div class="stat">
        <?php
            include_once("employeesclass.php");
            $staff= new employeesclass();
            $staffinfo = $staff-> getEmployees();

            $row=$staff->fetch();
            $i=0;
            while($row){
              $i++;
              $row=$staff->fetch();
            }
            echo $i;
        ?></div><span>Total Number of Employees</span></a></li>
        <li><a href="#"><div class="stat">
        <?php
            include_once("employeesclass.php");
            $staff= new employeesclass();
            $staffinfo = $staff-> getInactiveEmployees();

            $row=$staff->fetch();
            $i=0;
            while($row){
              $i++;
              $row=$staff->fetch();
            }
            echo $i;
        ?></div><span>Past Employees</span></a></li>
        <li><a href='#'><img class="circular" src="NCA logo.jpg" alt="NCA logo.jpg"></a></li>
        <li><a href="#"><div class="stat">
        <?php
            include_once("employeesclass.php");
            $staff= new employeesclass();
            $o=0;
            $staffinfo = $staff-> getEmployeeByOffice("Tamale");
            $row=$staff->fetch();
            $m=0;
            while($row){
              $m++;
              $row=$staff->fetch();
            }
            $staffinfo = $staff-> getEmployeeByOffice("Bolgatanga");
            $row=$staff->fetch();
            $n=0;
            while($row){
              $n++;
              $row=$staff->fetch();
            }
            echo $m+$n;
        ?>
        </div><span>Northen Ghana Employees</span></a></li>
        <li><a href="#"><div class="stat">
        <?php
            include_once("employeesclass.php");
            $staff= new employeesclass();
            $k=0;
            $l=0;
            $m=0;
            $staffinfo = $staff-> getEmployees();
            $row=$staff->fetch();
            $i=0;
            while($row){
              $i++;
              $row=$staff->fetch();
            }
            $staffinfo = $staff-> getEmployeeByOffice("Tamale");
            $row=$staff->fetch();
            $j=0;
            while($row){
              $j++;
              $row=$staff->fetch();
            }
            $staffinfo = $staff-> getEmployeeByOffice("Bolgatanga");
            $row=$staff->fetch();
            $k=0;
            while($row){
              $k++;
              $row=$staff->fetch();
            }
            echo $i-$k-$j;
        ?></div><span>Southern Ghana Employees</span></a></li>
      </ul>

    </div>

    <div class="row large-centered">
      <hr>
      <div class="columns medium-6">
        <input id="add" type="submit" class="button expanded" name="add" value="Add New Employee" onclick="addformShow()">
      </div>
      <div class="columns medium-6">
        <input id="edit" type="submit" class="button expanded" name="edit" value="Edit Employee" onclick="editformShow()">
      </div>
    </div>
    
    <div class="row large-centered">
    
  <div id="formEditDiv" style="display:none;">
    <hr>
  <div class=" callout secondary medium" >
  <form id="formEdit" action="">
    <ul class="tabs" data-tabs id="example-tabs">
      <li class="tabs-title is-active"><a href="#panel1" aria-selected="true">Active Staff</a></li>
      <li class="tabs-title"><a href="#panel2">Inactive Staff</a></li>
    </ul>
    <div class="tabs-content" data-tabs-content="example-tabs">
      <div class="tabs-panel is-active" id="panel1" style="background-color:#F5F5F5;">
        <div class="row column center" style="width:100%;color:#42b2d7;">
            <table id="employee"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
              <thead>
                  <tr>
                      <th>Photo</th>
                      <th>Employee Name</th>
                      <th>Division</th>
                      <th>Location</th>
                      <th></th>
                      <th></th>
                  </tr>
              </thead>
              <tfoot>
                  <tr>
                      <th>Photo</th>
                      <th>Employee Name</th>
                      <th>Division</th>
                      <th>Location</th>
                      <th></th>
                      <th></th>
                  </tr>
              </tfoot>
            </table>
        </div>
      </div>
      <div class="tabs-panel" id="panel2">
        <div class="row column center" style="width:100%;">
          <table id="inactiveemployee"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Employee Name</th>
                    <th>Division</th>
                    <th>Location</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Photo</th>
                    <th>Employee Name</th>
                    <th>Division</th>
                    <th>Location</th>
                    <th></th>
                    <th></th>
                </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </form>
    </div>
  </div>

  <div id="formAddDiv" style="display:none;">
    <hr>
  <div class=" panel callout secondary medium" >
  <form id="formAdd" action="" method="POST" enctype="multipart/form-data">
    <div class="row column center">
      <h3>Employee Information:</h3>
      <div class="columns medium-12">
          <div class="row">
            <div class="columns medium-3">
              <label for="inputFile">Attach File</label>
              <input type="file" name="photo" id="photo" required>
            </div>
            <div class="columns medium-4">
              <label>Name</label>
              <input type="text" class="span2" id="name" name="name" placeholder="eg. Firstname Surname" required>
            </div>
            <div class="columns medium-2">
              <label>Staff ID</label>
              <input type="text" class="span2" id="staffid" name="staffid" placeholder="eg. U5DS9" required>
            </div>
            <div class="columns medium-3">
              <label>Office</label>
              <select id="office" class="span2" type="select" name="office" required>
              <?php
                  include_once("employeesclass.php");
                  $office= new employeesclass();
                  $officeinfo = $office-> getOffices();

                  $row=$office->fetch();
                  $i=0;

                  echo"<option value=''>Select Office</option>";
                  while($row){
                    echo"<option value='{$row['NAME']}''>{$row['NAME']}</option>";
                    $i++;
                    $row=$office->fetch();
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
                  $rank= new employeesclass();
                  $rankinfo = $rank-> getRank();

                  $row=$rank->fetch();
                  $i=0;

                  echo"<option value=''>Select Rank</option>";
                  while($row){
                    echo"<option value='{$row['NAME']}''>{$row['NAME']}</option>";
                    $i++;
                    $row=$rank->fetch();
                  }
              ?>
              </select>
            </div>
            <div class="columns medium-4">
              <label>Division</label>
              <select type="select" class="span2" id="division" name="division" required>
                <?php
                  include_once("employeesclass.php");
                  $division= new employeesclass();
                  $divisioninfo = $division-> getDivision();

                  $row=$division->fetch();
                  $i=0;

                  echo"<option value=''>Select Division</option>";
                  while($row){
                    echo"<option value='{$row['NAME']}''>{$row['NAME']}</option>";
                    $i++;
                    $row=$division->fetch();
                  }
              ?>
              </select>
            </div>
            <div class="columns medium-4">
              <label>Department</label>
              <input type="text" class="span2" id="department"  name="department" required>
            </div>
          </div>
          <div class="row">
            <div class="columns medium-4">
              <label>Email</label>
              <input id="email" type="email" name="email" required>
            </div>
            <div class="columns medium-3">
              <label>GOTA Number</label>
              <input type="text" class="span2" id="gota" name="gota">
            </div>
            <div class="columns medium-3">
              <label>Mobile Number</label>
              <input type="text" class="span2" id="phone" name="phone">
            </div>
            <div class="columns medium-2">
              <label>Phone Extension</label>
              <input type="text" class="span2" id="ext" name="ext">
            </div>
          </div>
          <label>Brief Profile</label>
          <textarea id="profile" name="profile" style="height:115px;"></textarea>
        </div>
      </div>
      <input id="submit" type="submit" class="button expanded" name="submit" value="Add Staff">
  </form>
  </div>
  </div>
    
      </div>
    <hr>

    <div class="row text-center">
          <p>© Copyright - 2016. National Communications Authority. All rights reserved. <a href='http://intranet.nca.org.gh/' target="_blank"><img class="circularbottom" src="NCA logo.jpg" alt="NCA logo.jpg"></a> <a href="intranet.nca.org.gh" target="_blank">Intranet Portal Home</a></p>
      </div> 
    
    </div>

    <script type="text/javascript">
function addformShow()
{  
  $("#formAddDiv").show();
  $("#formEditDiv").hide();
}
</script>

<script type="text/javascript">
function editformShow()
{ 
  $("#formEditDiv").show();
  $("#formAddDiv").hide();
}
</script>

<script type='text/javascript'>
    
      function disable(id) {
        var name= "";
        var linkurl = 'disable.php?deactivate='+id ;
        swal({
          title: 'Deactivate this person'+name+'?',
          type: 'warning',
          showCancelButton: true,
          showConfirmButton: true,
          closeOnConfirm: true,
          closeOnCancel: false
        },
        function(isConfirm) {
          if (isConfirm) {
            // Redirect the user
            window.location.href = linkurl;
            //deleteRecord(id,id);
          } else {
            swal('Cancelled', 'Your employee is still active', 'error');
          }
        });
    }
    </script>

    <script type="text/javascript">
    var currentObject=null;
      function disableEmployee(){
        $('#employee tbody tr').on( 'click', 'deactivate', function () {
              table
                  .row( $(this).parents('tr') )
                  .remove()
                  .draw();
          } );
      }

      //function to delete the ajax form record from the list
      function deleteRecordComplete(xhr,status){
        if(status!="success"){
          //alert("Form Deleted");
          return;
        }
        var parent= document.getElementById(currentObject).parentElement;
        parent.removeChild(document.getElementById(currentObject));

        //alert(xhr.responseText);
      }
      //function to enact the delete record when a specific url and cmd is given
      function deleteRecord(recordId,object){
        var theUrl="disable.php?deactivate="+recordId;
        $.ajax(theUrl,{async:true,complete:disableEmployee});
        currentObject=object;
      }
    </script>

    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>


  </body>
<html>
