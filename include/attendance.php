<?php
	/**
	* Description:	This is a class for member.
	* Author:		Joken Villanueva
	* Date Created:	Nov. 2, 2013
	* Revised By:		
	*/
	require_once(LIB_PATH.DS.'database.php');

	class Attendance{
		
		protected static $tbl_name = "attendance";

		function db_fields(){
			global $mydb;
			return $mydb->getFieldsOnOneTable(self::$tbl_name);
		}

		function list_of_attendance() {
		    global $mydb;
		    $mydb->setQuery("
		        SELECT 
		            a.attendance_id, 
		            a.attendance_date, 
		            a.time_in_morning, 
		            a.time_out_morning, 
		            a.time_in_afternoon, 
		            a.time_out_afternoon, 
		            e.emp_id, 
		            e.profile_pic,
		            CONCAT(e.first_name, ' ', e.last_name) AS fullname
		        FROM ".self::$tbl_name." a
		        JOIN employees e ON a.emp_id = e.emp_id
		        WHERE a.attendance_date = CURDATE() 
		    ");
		    
		    $cur = $mydb->loadResultList();
		    return $cur;
		}

		function list_of_attendance_by_empId($empId = 0) {
		    global $mydb;
		    $mydb->setQuery("
		        SELECT  
		            a.attendance_date, 
		            a.time_in_morning, 
		            a.time_out_morning, 
		            a.time_in_afternoon, 
		            a.time_out_afternoon
		        FROM ".self::$tbl_name." a
		        JOIN employees e ON a.emp_id = e.emp_id
		        WHERE e.emp_id = :empId
		    ", [':empId' => $empId]);
		    
		    $cur = $mydb->loadResultList();
		    return $cur;
		}


		function single_attendance($id=0){
			global $mydb;
			$mydb->setQuery("SELECT * FROM ".self::$tbl_name." Where emp_id = :id LIMIT 1", [':id' => $id]);
			$cur = $mydb->loadSingleResult();
			return $cur;
		}
		
		function find_all_attendance($name=""){
			global $mydb;
			$mydb->setQuery("SELECT * 
				FROM  ".self::$tbl_name." 
				WHERE  `INST_FULLNAME` ='{$name}'");
			$row_count = $mydb->num_rows();
			return $row_count;
		}

		// Function to find attendance by employee ID and today's date
		function find_attendance_by_employee_and_date($emp_id, $attendance_date) {
		    global $mydb;
		   
		    // Query to find attendance by employee ID and date
		    $sql = "SELECT * FROM " . self::$tbl_name . " WHERE emp_id = :emp_id AND attendance_date = :attendance_date LIMIT 1";

		    // Bind parameters for the query
		    $params = [
		        ':emp_id' => $emp_id,
		        ':attendance_date' => $attendance_date
		    ];

		    // Execute the query and return the result
		    $mydb->setQuery($sql, $params);
		    $attendanceRecord = $mydb->loadSingleResult();

		    return $attendanceRecord;
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
		        $attributes = $this->sanitized_attributes();

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
		        error_log("Error inserting record: " . $e->getMessage());
		        echo "An error occurred while creating the record. Please try again later.";
		        return false;
		    } catch (Exception $e) { // Catch other exceptions (like directory creation issues)
		        error_log("Error creating QR Code or directory: " . $e->getMessage());
		        echo "An error occurred while creating the QR Code. Please try again later.";
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

				$sql = "UPDATE " . self::$tbl_name . " SET " . join(", ", $attribute_pairs) . " WHERE `attendance_id` = :id";

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
				$sql = "DELETE FROM " . self::$tbl_name . " WHERE `SERVICE_ID` = :id LIMIT 1";

		        // Bind the parameter
				$params = [':id' => $id];
		        // Execute the query
				$mydb->InsertThis($sql, $params);
				
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