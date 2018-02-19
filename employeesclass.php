<?php 

	include_once("adb.php");
	/**
	*booking class
	*/
	class employeesclass extends adb{
		function employeesclass(){
		}
		/**
		*Adds a new employee
		*@param int duration how long you want the room to be booked
		*@return boolean returns true if successful or false 
		*/
		function addEmployee($staffid,$name,$location,$designation,$division,$unit,$extension,$email,$mobilephone,$photo,$gotanumber,$profile){
			$strQuery="insert into employees set STAFF_ID='$staffid', NAME='$name',LOCATION='$location', DESIGNATION='$designation', DIVISION= '$division', DEPARTMENT='$unit', EXTENSION = '$extension',
			OFFICE_EMAIL = '$email', MOBILE_PHONE='$mobilephone', PHOTO_ADDRESS='$photo', GOTANUMBER='$gotanumber', PROFILE='$profile'";
			return $this->query($strQuery);				
		}

		/**
		*Adds a new employee
		*@param int duration how long you want the room to be booked
		*@return boolean returns true if successful or false 
		*/
		function editEmployee($id,$staffid,$name,$location,$designation,$division,$unit,$extension,$email,$mobilephone,$photo,$gotanumber,$profile){
			$strQuery="update employees set STAFF_ID='$staffid', NAME='$name',LOCATION='$location', DESIGNATION='$designation', DIVISION= '$division', DEPARTMENT='$unit', EXTENSION = '$extension',
			OFFICE_EMAIL = '$email', MOBILE_PHONE='$mobilephone', PHOTO_ADDRESS='$photo', GOTANUMBER='$gotanumber', PROFILE='$profile' WHERE ID ='$id'";
			return $this->query($strQuery);				
		}

		/**
		*Disables an employee
		*@param string employee id of the room booked
		*@return boolean returns true if successful or false 
		*/
		function disableEmployee($Id){
			$strQuery="update employees set STATUS = 'INACTIVE' where ID = '$Id'";
			return $this->query($strQuery);				
		}

		/**
		*Enables an employee
		*@param string employee id of the room booked
		*@return boolean returns true if successful or false 
		*/
		function enableEmployee($Id){
			$strQuery="update employees set STATUS = 'ACTIVE' where ID = '$Id'";
			return $this->query($strQuery);				
		}

		/**
		*gets list of employees based on the filter
		*@param string mixed condition to filter. If  false, then filter will not be applied
		*@return boolean true if successful, else false
		*/
		function getEmployees($filter=false){
			$strQuery="select * from employees WHERE STATUS='ACTIVE'";
			if($filter!=false){
				$strQuery=$strQuery . " AND STAFF_ID = '$filter'";
			}
			return $this->query($strQuery);
		}

		/**
		*gets list of past employees based on the filter
		*@param string mixed condition to filter. If  false, then filter will not be applied
		*@return boolean true if successful, else false
		*/
		function getInactiveEmployees($filter=false){
			$strQuery="select * from employees WHERE STATUS='INACTIVE'";
			if($filter!=false){
				$strQuery=$strQuery . " AND STAFF_ID = '$filter'";
			}
			return $this->query($strQuery);
		}

		/**
		*gets an employee based on the database ID
		*@param string mixed condition to filter. 
		*@return boolean true if successful, else false
		*/
		function getEmployeeById($filter){
			$strQuery="select * from employees where ID = '$filter'";
			return $this->query($strQuery);
		}

		/**
		*gets an employee based on the location
		*@param string mixed condition to filter. 
		*@return boolean true if successful, else false
		*/
		function getEmployeeByOffice($filter){
			$strQuery="select * from employees where LOCATION = '$filter' AND STATUS='ACTIVE'";
			return $this->query($strQuery);
		}

		/**
		*gets list of office locations 
		*@return boolean true if successful, else false
		*/
		function getOffices(){
			$strQuery="select * from offices";
			return $this->query($strQuery);
		}

		/**
		*gets list of ranks 
		*@return boolean true if successful, else false
		*/
		function getRank(){
			$strQuery="select * from rank";
			return $this->query($strQuery);
		}

		/**
		*gets list of divisions 
		*@return boolean true if successful, else false
		*/
		function getDivision(){
			$strQuery="select * from division";
			return $this->query($strQuery);
		}

	}
?>