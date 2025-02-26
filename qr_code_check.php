<?php

//    Make sure SITE_ROOT is defined correctly in your config.php.  It should be the full server path to your project root.
require_once(SITE_ROOT . "/include/initialize.php"); // Corrected path.  Make sure /include/initialize.php is the correct path from your project root.

try {
    $qrCodeFilename = $_POST['qr_code'];

    $employee = new Employees();
    $existingQR = $employee->find_by_qr_code($qrCodeFilename);

    if ($existingQR) {
        $response = ['status' => 1, 'message' => 'QR code exists.'];
    } else {
        $response = ['status' => 0, 'message' => 'QR code does not exist.'];
    }

    header('Content-Type: application/json');
    echo json_encode($response);

} catch (Exception $e) {
    error_log("QR Code Check Error: " . $e->getMessage());
    $response = ['status' => 0, 'message' => 'An error occurred on the server.'];
    header('Content-Type: application/json');
    echo json_encode($response);
}

?>