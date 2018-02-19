<?php
/* Database connection start */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "directory";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

//print_r($conn);

/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 => 'PHOTO_ADDRESS',
	1 => 'NAME',
	2 =>'DIVISION', 
	3 => 'LOCATION'
);

// getting total number records without any search
$sql = "SELECT ID,  NAME, STAFF_ID, LOCATION, DIVISION, PHOTO_ADDRESS ";
$sql.=" FROM employees WHERE STATUS = 'ACTIVE'";
$query=mysqli_query($conn, $sql) or die("employeedata.php: get bookings");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.

$sql = "SELECT ID, NAME, STAFF_ID, LOCATION, DIVISION, PHOTO_ADDRESS";
$sql.=" FROM employees WHERE STATUS = 'ACTIVE'";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( NAME LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR DIVISION LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR LOCATION LIKE '".$requestData['search']['value']."%' )";
}
$query=mysqli_query($conn, $sql) or die("employeedata.php: get bookings");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains column index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($conn, $sql) or die("employeedata.php: get bookings");

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = "<img class='circularphoto effect' src='{$row['PHOTO_ADDRESS']}' height='40' width='40' />";
	$nestedData[] = $row["NAME"];
	$nestedData[] = $row["DIVISION"];
	$nestedData[] = $row["LOCATION"];
	$nestedData[] = "<a href='view.php?id={$row['ID']}' class='button round' name='select' value={$row['ID']} onclick='seeinfo({$row['ID']})' type='submit' id='select' >View Information</a>";
	$data[] = $nestedData;
}

$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>
