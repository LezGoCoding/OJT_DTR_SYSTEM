<?php
require_once("../../include/initialize.php");

if (!isset($_SESSION['ACCOUNT_ID'])) {
    header("Location: ".WEB_ROOT.'login.php');
} else {

    $routes = [
        'list' => 'list.php',
        'view' => 'view.php'
    ];
    $ParamConfig = [
       'view' => ['id']
     // 'list, view' => ['id', 'no']
   ];
   $routeHandler = new RouteHandler($routes, 'list', $ParamConfig);
   $content = $routeHandler->handleRouteAndContent();
   $routeHandler->addToGet();
   require_once("../../theme/template.php");
}

?>

<script>
  $(document).ready(function() {
    var t = $('#tblservices').DataTable({
        "searching": true,
        "ordering": false,
        "lengthChange": false,
        "paging": false,
        "bInfo": true,
        "processing": true,
        "serverSide": false,
        "order": [],
        "ajax": {
            url: "<?php echo WEB_ROOT; ?>services/ajax.php",
            type: "POST",
            data: {route: 'list'}
        },
        "scrollY": "600px",
        "scrollCollapse": true,
        "columnDefs": [{
            "searchable": true,
            "orderable": false,
            "className": "text-center",
            "targets": "_all"
        }]
    });
});

</script>