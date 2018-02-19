<?php 

	include_once("adb.php");
	/**
	*login class
	*/
	class login extends adb{
		function login(){
		}
		/**
		*logon info 
		*@return boolean returns true if successful or false 
		*/
		function adminlogin($name,$password){
			$strQuery="select * from admin WHERE NAME = '$name' && PASSWORD = MD5('$password')";
			$result = $this->query($strQuery);	
			if ($result){
				//echo $result;
				return $this->fetch();
			}else{
				//echo $result;
				return $result;
			}			
		}

	}
?>