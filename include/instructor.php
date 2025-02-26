<?php
/**
* Description:	This is a class for member.
* Author:		Joken Villanueva
* Date Created:	Nov. 2, 2013
* Revised By:		
*/
require_once(LIB_PATH.DS.'database.php');
class Instructor{
	
	protected static $tbl_name = "instructor";
	function db_fields(){
		global $mydb;
		return $mydb->getFieldsOnOneTable(self::$tbl_name);
	}
	function list_instructor(){
		global $mydb;
		$mydb->setQuery("SELECT * FROM ".self::$tbl_name);
		$cur = $mydb->loadResultList();
		return $cur;
	
	}
	function single_instructor($id=0){
			global $mydb;
			$mydb->setQuery("SELECT * FROM ".self::$tbl_name." Where EMPID = :id LIMIT 1", [':id' => $id]);
			$cur = $mydb->loadSingleResult();
			return $cur;
	}
	function single_user($id=0){
			global $mydb;
			$mydb->setQuery("SELECT * FROM ".self::$tbl_name." Where INST_ID = '{$id}' LIMIT 1");
			$cur = $mydb->loadSingleResult();
			return $cur;
	}
	function find_all_user($name=""){
			global $mydb;
			$mydb->setQuery("SELECT * 
							FROM  ".self::$tbl_name." 
							WHERE  `INST_FULLNAME` ='{$name}'");
			$row_count = $mydb->num_rows();
			return $row_count;
	}


	 static function AuthenticateUser($username="", $password=""){
		global $mydb;

		$sql = "SELECT * FROM `instructor` WHERE `EMPID` = :username and `ACCOUNT_PASSWORD` = :password LIMIT 1";
		$params = [
			':username' => $username,
			':password' => $password
		];
		$mydb->setQuery($sql, $params);
		$row_count = $mydb->num_rows();//get the number of count
		 if ($row_count == 1){
		 $found_user = $mydb->loadSingleResult();
		    $_SESSION['ASSET_ACCOUNT_ID'] 	 	= $found_user->INST_ID;
            $_SESSION['ASSET_ACCOUNT_NAME'] 		= $found_user->INST_FULLNAME;
            $_SESSION['ASSET_ACCOUNT_USERNAME']	= $found_user->EMPID;
 
            $_SESSION['ASSET_EMPID'] 				= $found_user->EMPID;
            $_SESSION['ASSET_ACCOUNT_TYPE']    	= $found_user->DESIGNATION;
            $_SESSION['ASSET_COMPANYID'] 			= $found_user->COMPANYID;
            $_SESSION['ASSET_CAMPUSID']    		= $found_user->CAMPUSID;
        	return true;
			}else{
				return false;
			}	
				
	} 	
	
	/*---Instantiation of Object dynamically---*/
	static function instantiate($record) {
		$object = new self;

		foreach ($record as $attribute => $value) {
	        // Directly set the attribute if it exists
			if (array_key_exists($attribute, $object->attributes())) {
				$object->$attribute = $value;
			}
		}
		return $object;
	}

	/*--Cleaning the raw data before submitting to Database--*/
	protected function attributes() {
		$attributes = array();
		foreach ($this->db_fields() as $field) {
			if (property_exists($this, $field)) {
				$attributes[$field] = $this->$field;
			}
		}
		return $attributes;
	}

	protected function sanitized_attributes() {
		$attributes = $this->attributes();
		$sanitized = [];

    	// Sanitize each attribute's value
		foreach ($attributes as $key => $value) {
        // General sanitization; can be customized for each field type if necessary
			$sanitized[$key] = htmlspecialchars($value);
		}

		return $sanitized;
	}

	/*--Create,Update and Delete methods--*/
	public function save() {
		try {
	        // Determine whether to create a new record or update an existing one
			if (isset($this->id) && !empty($this->id)) {
	            // If an ID is set, perform an update
				return $this->update($this->id);
			} else {
	            // If no ID is set, perform a create operation
				return $this->create();
			}
		} catch (Exception $e) {
	        // Handle any exceptions that may occur
			error_log("Error saving record: " . $e->getMessage());
			echo "An error occurred while saving the record. Please try again later.";
			return false;
		}
	}


	public function create() {
		global $mydb;

		try {
	        $attributes = $this->sanitized_attributes(); // Consider using sanitized_attributes() if needed

	        // Build the SQL with placeholders
	        $placeholders = array_map(function($key) {
	        	return ":{$key}";
	        }, array_keys($attributes));

	        $sql = "INSERT INTO " . self::$tbl_name . " (" . join(", ", array_keys($attributes)) . ") VALUES (" . join(", ", $placeholders) . ")";

	        // Bind parameters dynamically
	        $params = [];
	        foreach ($attributes as $key => $value) {
	        	$params[":{$key}"] = $value; 
	        }
	        $mydb->InsertThis($sql, $params);

	        return true;
	    } catch (PDOException $e) {
	        // Handle the exception
	    	error_log("Error inserting record: " . $e->getMessage());
	    	echo "An error occurred while creating the record. Please try again later.";
	    	return false;
	    }
	}

	public function update($id = 0) {
		global $mydb;

		try {
	        $attributes = $this->sanitized_attributes(); 

	        $attribute_pairs = [];
	        foreach ($attributes as $key => $value) {
	        	$attribute_pairs[] = "{$key} = :{$key}";
	        }
	        
	        $sql = "UPDATE " . self::$tbl_name . " SET " . join(", ", $attribute_pairs) . " WHERE `INST_ID` = :id";

	        // Bind parameters dynamically
	        $params = [':id' => $id];
	        foreach ($attributes as $key => $value) {
	        	$params[":{$key}"] = $value;  
	        }
	        $mydb->InsertThis($sql, $params);

	        return true;
	    } catch (PDOException $e) {
	        // Handle the exception
	    	error_log("Error updating record: " . $e->getMessage());
	    	echo "An error occurred while updating the record. Please try again later.";
	    	return false;
	    }
	}

	public function delete($id = 0) {
		global $mydb;

		try {
	        // Construct the SQL query with a placeholder
			$sql = "DELETE FROM " . self::$tbl_name . " WHERE `INST_ID` = :id LIMIT 1";

	        // Bind the parameter
	        $params = [':id' => $id];
	        // Execute the query
			$mydb->InsertThis($sql);
			
			return true;
		} catch (PDOException $e) {
	        // Handle the exception
			error_log("Error deleting record: " . $e->getMessage());
			echo "An error occurred while deleting the record. Please try again later.";
			return false;
		}
	}
		
}
?>