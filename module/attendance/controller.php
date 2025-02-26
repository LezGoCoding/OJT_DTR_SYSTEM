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
    $service_name = htmlspecialchars($_POST['service_name']);
    $service_fee = htmlspecialchars($_POST['service_fee']);
    // $date_created = NOW();

    $service = new Services();

    $mydb->beginTransaction(); // Begin transaction

    try {
        // Create user record
        $service->SERVICE = $service_name;
        $service->SERVICE_FEE = $service_fee;

        if (!$service->create()) {
            throw new Exception("Failed to create service record.");
        }

        $mydb->commitTransaction(); // Commit the transaction

        message("New Service has been created successfully!", "success");
        DoRecordLogs("New Service has been created successfully!", "INSERT");
    } catch (Exception $e) {
        $mydb->rollbackTransaction(); // Rollback transaction on failure
        message($e->getMessage(), "error");
    }

    redirect(WEB_ROOT.'employees/');
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