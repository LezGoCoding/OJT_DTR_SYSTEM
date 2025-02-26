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
 $services = new services();
 $rows = $services->list_of_services();
 $output = array();
 $data = array();
 $filtered_rows = $mydb->num_rows();
 $i = 1;
 foreach ($rows as $res) {

    $sub_array   = array();
    $sub_array[] = $i;
    $sub_array[] = $res->SERVICE_ID;
    $sub_array[] = $res->SERVICE;
    $sub_array[] = $res->SERVICE_FEE;
    $sub_array[] = $res->DATE_CREATED;

    $sub_array[] = '
        <a href="?view&'.$res->SERVICE_ID.'" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> View</a>
        <button class="btn btn-sm btn-info" id="EditButton" data-id="'.$res->SERVICE_ID.'"> <i class="fas fa-edit"></i> Edit</button>
        <button class="btn btn-sm btn-danger" id="RemButton" data-id="'.$res->SERVICE_ID.'"> <i class="fas fa-trash"></i> Remove</button>';
    
    $data[] = $sub_array;
    $i = $i + 1;
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