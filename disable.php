<?php
  session_start();
  
  $sessname=$_SESSION['NAME'];

  if(!isset($_SESSION['NAME'])){
    header("Location: admin.php");
    exit();
  }
?>
<?php
if (isset($_REQUEST['deactivate'])) {
  $deactivateId=$_REQUEST['deactivate'];
  include_once("employeesclass.php");
    $deactivate= new employeesclass();
    $staffinfo = $deactivate-> disableEmployee($deactivateId);

    header("Location:adminadd.php");
}
?>