<?php 
    require_once("../../include/initialize.php");

    if (!isset($_SESSION['ACCOUNT_ID'])) {
        header("Location: module/login.php");
        exit;
    } else {
        // Initialize the router
        $router = new Router();
        $router->addRoute('add', 'doAdd');
        $router->addRoute('edit', 'doEdit');
        $router->addRoute('del', 'doRemove');
        $router->handle();
    }

    function doAdd() {
        global $mydb;

        // Sanitize inputs
        $firstName = htmlspecialchars($_POST['firstName']);
        $lastName = htmlspecialchars($_POST['lastName']);
        $address = htmlspecialchars($_POST['address']);
        $contactNumber = htmlspecialchars($_POST['contactNumber']);
        $email = htmlspecialchars($_POST['email']);
        $dateOfBirth = htmlspecialchars($_POST['dateOfBirth']);
        $department = htmlspecialchars($_POST['department']);
        $position = htmlspecialchars($_POST['position']);
        $status = htmlspecialchars($_POST['status']);
        $username = htmlspecialchars($_POST['username']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

        // Handle Profile Picture Upload
        $profilePicName = "";
        if (isset($_FILES['profilePic']) && $_FILES['profilePic']['error'] === UPLOAD_ERR_OK) {

            $uploadDir = __DIR__ . "/../../img/profile_pic/"; // Ensure this folder exists

            $fileTmpPath = $_FILES['profilePic']['tmp_name'];
            $fileName = basename($_FILES['profilePic']['name']); // Keep original filename
            $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            // Ensure only allowed image types
            $allowedExtensions = ['jpg', 'jpeg', 'png'];
            if (in_array($fileExtension, $allowedExtensions)) {
                $destinationPath = $uploadDir . $fileName; // Save with the original filename

                // Check if a file with the same name exists
                // if (file_exists($destinationPath)) {
                //     message("A file with this name already exists. Please rename your file.", "error");
                //     redirect(WEB_ROOT . 'employees/');
                //     return;
                // }

                if (move_uploaded_file($fileTmpPath, $destinationPath)) {
                    $profilePicName = $fileName; // Save filename in the database
                } else {
                    message("Error uploading profile picture.", "error");
                    redirect(WEB_ROOT . 'employees/');
                    return;
                }
                
            } else {
                message("Invalid file type. Only JPG, JPEG, and PNG are allowed.", "error");
                redirect(WEB_ROOT . 'employees/');
                return;
            }
        }


        $employee = new Employees();

        $mydb->beginTransaction();

        try {
            $employee->first_name = $firstName;
            $employee->last_name = $lastName;
            $employee->address = $address;
            $employee->contact_number = $contactNumber;
            $employee->email = $email;
            $employee->date_of_birth = $dateOfBirth;
            $employee->department = $department;
            $employee->position = $position;
            $employee->status = $status;
            $employee->username = $username;
            $employee->password = $password;
            $employee->profile_pic = $profilePicName;
            
            if (!$employee->create()) {
                throw new Exception("Failed to create employee record.");
            }

            $mydb->commitTransaction();

            message("New Employee has been created successfully!", "success");
            DoRecordLogs("New Employee has been created successfully!", "INSERT");

        } catch (Exception $e) {
            $mydb->rollbackTransaction();
            message($e->getMessage(), "error");
        }

        redirect(WEB_ROOT . 'employees/');
    }


    function doEdit() {
        global $mydb;
        // Sanitize inputs
        $serviceId = htmlspecialchars($_POST['serviceId']);
        $serviceName = htmlspecialchars($_POST['serviceName']);
        $serviceFee = htmlspecialchars($_POST['serviceFee']);
        $dateCreated = htmlspecialchars($_POST['dateCreated']);

        $service = new Services();

        $mydb->beginTransaction(); // Begin transaction

        try {
            // Update user record
            $service->SERVICE = $serviceName;
            $service->SERVICE_FEE = $serviceFee;

            if (!$service->update($serviceId)) {
                throw new Exception("Failed to update user record.");
            }

            $mydb->commitTransaction(); // Commit the transaction

            DoRecordLogs("User with ID $serviceId has been updated successfully!", "UPDATE");
            message("User has been updated successfully!", "success");

        } catch (Exception $e) {
            $mydb->rollbackTransaction(); // Rollback transaction on failure
            message($e->getMessage(), "error");
        }

        redirect(WEB_ROOT.'employees/');
    }

    function doRemove() {
        global $mydb;
        $uid = (int) $_POST['uid'];

        $service = new Services();

        $mydb->beginTransaction(); // Begin transaction

        try {
            if (!$service->delete($uid)) {
                throw new Exception("Failed to remove service record.");
            }

            $mydb->commitTransaction(); // Commit the transaction

            DoRecordLogs("Service has been removed successfully!", "DELETE");
            message("Service has been removed successfully!", "success");
            echo json_encode(['status' => 1, 'message' => 'Service has been removed successfully!']);
            
        } catch (Exception $e) {
            $mydb->rollbackTransaction(); // Rollback transaction on failure
            message($e->getMessage(), "error");
            echo json_encode(['status' => 0, 'message' => $e->getMessage()]);
        }
    }
?>