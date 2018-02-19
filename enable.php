<?php
  session_start();
  
  $sessname=$_SESSION['NAME'];

  if(!isset($_SESSION['NAME'])){
    header("Location: admin.php");
    exit();
  }
?>
<?php
if (isset($_REQUEST['activate'])) {
  $activateId=$_REQUEST['activate'];
  include_once("employeesclass.php");
    $activate= new employeesclass();
    $staffinfo = $activate-> enableEmployee($activateId);

    header("Location:adminadd.php");
}
?>