<?php
require_once("../include/initialize.php");
header('Content-Type: application/json'); // Ensure JSON output

global $mydb;

$response = ['status' => 0, 'message' => 'Invalid request'];

// Get the current hour
$currentHour = date('H'); // 24-hour format (00 to 23)

// Function to check if it's morning or afternoon
function isMorning($hour) {
    return $hour >= 6 && $hour < 12; // Morning is between 6 AM and 12 PM
}

function isAfternoon($hour) {
    return $hour >= 12 && $hour < 18; // Afternoon is between 12 PM and 6 PM
}


// Check if qr_code is set
if (isset($_POST['qr_code']) && !empty($_POST['qr_code'])) {
    $qrCodeFilename = $_POST['qr_code'];
    $cur_time = $_POST['cur_time'];
    $cur_date = $_POST['cur_date'];

    try {
        // 1. Find employee by QR code
        $employee = new Employees();
        $existingEmployee = $employee->find_by_qr_code($qrCodeFilename);

        if ($existingEmployee) {

             // Get the full name of the employee
            $employeeName = $existingEmployee->fullname; // Assuming $existingEmployee has a 'fullname' field

            // Employee exists, check for today's attendance
            $attendance = new Attendance();
            
            // // Check if the employee already has attendance for today
            $attendanceRecord = $attendance->find_attendance_by_employee_and_date($existingEmployee->emp_id, $cur_date);

            // Check if there's an attendance record
            if ($attendanceRecord) {

                // If time_in_morning is already set, check for time_out_morning
                if (empty($attendanceRecord->time_out_morning) && (empty($attendanceRecord->time_out_morning) && empty($attendanceRecord->time_in_afternoon))) {
                    // Morning Time-Out update
                    if (isMorning($currentHour)) {
                        // It's morning, so update the time-out morning
                        $mydb->beginTransaction(); // Begin transaction
                        try {
                            // Update time-out morning
                            $attendance->time_out_morning = $cur_time;

                            if (!$attendance->update($attendanceRecord->attendance_id)) {
                                throw new Exception("Failed to update time-out morning.");
                            }

                            $mydb->commitTransaction(); // Commit the transaction
                            DoRecordLogs("User Attendance with attendanceID $attendanceRecord->attendance_id has been updated successfully!", "UPDATE");

                            // Log for morning attendance creation
                            $message = "$employeeName's morning attendance for today ($cur_time) has been created successfully.";
                            DoRecordLogs("$employeeName's morning attendance for today ($cur_time) has been created successfully.", "INSERT");

                            // Send success response
                            $response = [
                                'status' => 1,
                                'message' => $message
                            ];

                        } catch (Exception $e) {
                            $mydb->rollbackTransaction(); // Rollback transaction on failure
                            $response = [
                                'status' => 0,
                                'message' => $e->getMessage()
                            ];
                        }

                    } elseif (isAfternoon($currentHour)) {
                        // It's afternoon, so update the time-in afternoon
                        $mydb->beginTransaction(); // Begin transaction
                        try {
                            // Update time-in afternoon
                            $attendance->time_in_afternoon = $cur_time;

                            if (!$attendance->update($attendanceRecord->attendance_id)) {
                                throw new Exception("Failed to update time-in afternoon.");
                            }

                            $mydb->commitTransaction(); // Commit the transaction
                            DoRecordLogs("User Attendance with attendanceID $attendanceRecord->attendance_id has been updated successfully!", "UPDATE");

                            // Log for afternoon attendance creation
                            $message = "$employeeName's afternoon attendance for today ($cur_time) has been created successfully.";
                            DoRecordLogs("$employeeName's afternoon attendance for today ($cur_time) has been created successfully.", "INSERT");

                            // Send success response
                            $response = [
                                'status' => 1,
                                'message' => $message
                            ];

                        } catch (Exception $e) {
                            $mydb->rollbackTransaction(); // Rollback transaction on failure
                            $response = [
                                'status' => 0,
                                'message' => $e->getMessage()
                            ];
                        }
                    } else {
                        // If it's neither morning nor afternoon
                        $response = [
                            'status' => 0,
                            'message' => 'It is neither morning nor afternoon anymore.'
                        ];
                    }
                }

                // If time_out_afternoon is empty, check for time-out afternoon
                elseif (empty($attendanceRecord->time_out_afternoon)) {
                    // Afternoon Time-Out update
                    if (isAfternoon($currentHour)) {
                        // It's afternoon, so update the time-out afternoon
                        $mydb->beginTransaction(); // Begin transaction
                        try {
                            // Update time-out afternoon
                            $attendance->time_out_afternoon = $cur_time;

                            if (!$attendance->update($attendanceRecord->attendance_id)) {
                                throw new Exception("Failed to update time-out afternoon.");
                            }

                            $mydb->commitTransaction(); // Commit the transaction
                            DoRecordLogs("User Attendance with attendanceID $attendanceRecord->attendance_id has been updated successfully!", "UPDATE");

                            // Log for afternoon attendance creation
                            $message = "$employeeName's afternoon time-out for today ($cur_time) has been updated successfully.";
                            DoRecordLogs("$employeeName's afternoon time-out for today ($cur_time) has been updated successfully.", "INSERT");

                            // Send success response
                            $response = [
                                'status' => 1,
                                'message' => $message
                            ];

                        } catch (Exception $e) {
                            $mydb->rollbackTransaction(); // Rollback transaction on failure
                            $response = [
                                'status' => 0,
                                'message' => $e->getMessage()
                            ];
                        }
                    } else {
                        // If it's not yet afternoon time
                        $response = [
                            'status' => 0,
                            'message' => 'It is not yet afternoon time.'
                        ];
                    }
                } else {
                    // All time slots are already filled, can't update
                    $response = [
                        'status' => 0,
                        'message' => 'Attendance record is already complete for today.'
                    ];
                }

            } else {

                // Set attendance details dynamically based on current time
                if (isMorning($currentHour)) {
                    // If it's morning, insert time_in_morning
                    $attendance->emp_id = $existingEmployee->emp_id;
                    $attendance->attendance_date = $cur_date;
                    $attendance->time_in_morning = $cur_time;
                    $attendance->time_out_morning = null;
                    $attendance->time_in_afternoon = null;
                    $attendance->time_out_afternoon = null;
                } elseif (isAfternoon($currentHour)) {
                    // If it's afternoon, insert time_in_afternoon
                    $attendance->emp_id = $existingEmployee->emp_id;
                    $attendance->attendance_date = $cur_date;
                    $attendance->time_in_morning = null; // Not required for afternoon start
                    $attendance->time_out_morning = null;
                    $attendance->time_in_afternoon = $cur_time;
                    $attendance->time_out_afternoon = null;
                }       

                // Create a new attendance record
                if ($attendance->create()) {

                    // Check if it's morning or afternoon and create the appropriate log and message
                    if (isMorning($currentHour)) {
                        // Log for morning attendance creation
                        $message = "$employeeName's morning attendance for today ($cur_time) has been created successfully.";
                        DoRecordLogs("$employeeName's morning attendance for today ($cur_time) has been created successfully.", "INSERT");

                        // Send success response
                        $response = [
                            'status' => 1,
                            'message' => $message
                        ];
                    } elseif (isAfternoon($currentHour)) {
                        // Log for afternoon attendance creation
                        $message = "$employeeName's afternoon attendance for today ($cur_time) has been created successfully.";
                        DoRecordLogs("$employeeName's afternoon attendance for today ($cur_time) has been created successfully.", "INSERT");

                        // Send success response
                        $response = [
                            'status' => 1,
                            'message' => $message
                        ];
                    }
                } else {
                    // If there was an error in creating the attendance record
                    $errorMessage = 'An error occurred while creating the attendance record.';
                    DoRecordLogs($errorMessage, "INSERT");

                    // Send error response
                    $response = [
                        'status' => 0,
                        'message' => $errorMessage
                    ];
                }
            }

        } else {
            $response = ['status' => 0, 'message' => 'QR code not registered.'];
        }
    } catch (Exception $e) {
        error_log("QR Code Check Error: " . $e->getMessage());
        $response = ['status' => 0, 'message' => 'An error occurred on the server.'];
    }

} elseif (isset($_POST['attendance_list']) && $_POST['attendance_list'] === 'list') { // GET THE DATA FOR LIST OF ATTENDANCE TODAY
    // Fetch attendance list
    try {
        $attendance = new Attendance();
        $rows = $attendance->list_of_attendance();
        $data = [];
        $filtered_rows = $mydb->num_rows();
        $i = 1;

        foreach ($rows as $res) {
            $profile_pic = '<img src="' . WEB_ROOT . 'img/profile_pic/' . $res->profile_pic . '" alt="Profile" class="rounded-circle" width="50" height="50">';

            $sub_array = [
                $profile_pic, 
                $res->fullname,
                $res->time_in_morning,
                $res->time_out_morning,
                $res->time_in_afternoon,
                $res->time_out_afternoon
            ];
            $data[] = $sub_array;
            $i++;
        }

        $response = [
            'status' => 1,
            'message' => '',
            'recordsTotal' => $filtered_rows,
            'data' => $data
        ];
    } catch (Exception $e) {
        error_log("Attendance List Error: " . $e->getMessage());
        $response = ['status' => 0, 'message' => 'Failed to fetch attendance list.'];
    }
} else {
    $response = ['status' => 0, 'message' => 'No valid request parameters provided.'];
}

echo json_encode($response);
?>
