 <?php 
 require_once("../../include/initialize.php");

if (!isset($_SESSION['ACCOUNT_ID'])) {
    header("Location: module/login.php");
    exit;

} else {
    // Initialize the router
    $router = new Router();
    $router->addRoute('list', 'doList');
    $router->addRoute('get', 'getList');
    $router->addRoute('employee_all_attendance', 'getEmployeeAllAttendance');
    
    $router->handle();
}

function doList(){

    global $mydb;
     $user = new employees();
     $rows = $user->list_of_employees();
     $output = array();
     $data = array();
     $filtered_rows = $mydb->num_rows();
     $i = 1;

    foreach ($rows as $res) {
        $sub_array = array();
        $sub_array[] = $i;
        $sub_array[] = $res->first_name . " " . $res->last_name;
        $sub_array[] = $res->department;
        $sub_array[] = $res->position;

        $status = $res->status;
        $badge_class = "";

        if ($status == 'Active') {
            $badge_class = "bg-primary";
        } elseif ($status == 'Inactive') {
            $badge_class = "bg-danger";
        } elseif ($status == 'Pending') {
            $badge_class = "bg-warning";
        } else {
            $badge_class = "bg-secondary";
        }

        $sub_array[] = '<span class="badge ' . $badge_class . '">' . $status . '</span>';

        $sub_array[] = '
            <div class="text-center">  </div>
                <a href="?details&' . $res->emp_id . '" class="btn btn-primary m-auto btn-sm"><i class="fas fa-user"></i> Details</a>
                <a href="?records&' . $res->emp_id . '" class="btn btn-success m-auto btn-sm"><i class="bi bi-files"></i> Records</a>
            </div>';

        $data[] = $sub_array;
        $i++;
    }
    

    $output = array(
        'data' => $data,
        "recordsTotal" => $filtered_rows,
        "recordsFiltered" => $filtered_rows
    );
    echo json_encode($output);
}

function getEmployeeAllAttendance(){

    global $mydb;
    $empId = $_POST['empId']; // Get empId from POST
    $attendance = new attendance();
    // Fetch attendance for the given empId
    $rows = $attendance->list_of_attendance_by_empId($empId);
    $data = [];
    $filtered_rows = $mydb->num_rows();
    $i = 1;
     
    foreach ($rows as $res) {
        $sub_array = [
            $res->attendance_date,
            $res->time_in_morning,
            $res->time_out_morning,
            $res->time_in_afternoon,
            $res->time_out_afternoon
        ];
        $data[] = $sub_array;
        $i++;
    }

    $output = array(
        'data' => $data, 
        "recordsTotal" => $filtered_rows);
    echo json_encode($output);
}

function getList(){

    $user = new services();
    $res = $user->single_service($_POST['uid']);

    $output = array();
    $output["serviceid"] = $res->SERVICE_ID;
    $output["service"] = $res->SERVICE;
    $output["servicefee"] = $res->SERVICE_FEE;
    $output["datecreated"] = $res->DATE_CREATED;

    echo json_encode($output);
}

?>