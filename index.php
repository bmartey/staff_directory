<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Employee Directory</title>
    <link rel="shortcut icon" type="image/png" href="NCA.png"/>

    <link rel="stylesheet" href="css/foundation.min.css">
    <link rel="stylesheet" href="foundation/fonts/foundation-icons.css"> 
    <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
    <link href="css/font-awesome-1.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="css/dataTables.foundation.min.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.foundation.min.css">
    
    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src='lib/moment.min.js'></script>
    <script src='lib/jquery.min.js'></script>
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

<style type="text/css">
    .circularphoto {
      box-shadow: 0 0 10px rgba(30,144,255, .9);
      -webkit-box-shadow: 0 0 10px rgba(30,144,255, .9);
      -moz-box-shadow: 0 0 10px rgba(30,144,255, .9);
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
                  url :"employeedata.php", // json datasource
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
  </head>
  <body>
    
    <!-- Start Top Bar -->
    <div class="top-bar">
      <div class="top-bar-left">
        <ul class="menu">
          <li class="menu-text">NCA Employee Directory</li>
        </ul>
      </div>
      <div class="top-bar-right">
        <ul class="menu">
          <li><a href="admin.php" class="button">Admin Access</a></li>
        </ul>
      </div>
    </div>
    <!-- End Top Bar -->


    <div class="callout primary small" style="color:white;background-color:#42b2d7;">
      <div class="row column text-center">
        <a href='http://intranet.nca.org.gh/' target="_blank"><img class="circular" src="NCA logo.jpg" alt="NCA logo.jpg"></a>
        <h1>Employee Directory</h1>
        <p class="lead">For speedy and convenient use. For the workforce of the future</p>
      </div>
    </div>
    <div class="row">
      <div class="row" style="width:100%;color:#42b2d7;">
        <table id="employee"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
          <thead>
              <tr>
                  <th>Photo</th>
                  <th>Employee Name</th>
                  <th>Division</th>
                  <th>Location</th>
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
              </tr>
          </tfoot>
        </table>
      </div>
    </div>
    <hr>
      <div class="row text-center">
          <p>© Copyright - 2016. National Communications Authority. All rights reserved. <a href='http://intranet.nca.org.gh/' target="_blank"><img class="circularbottom" src="NCA logo.jpg" alt="NCA logo.jpg"></a> <a href="intranet.nca.org.gh" target="_blank">Intranet Portal Home</a></p>
      </div>  
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>

  </body>
</html>


    