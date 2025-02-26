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
    $router->handle();
}

function doList(){

    global $mydb;
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