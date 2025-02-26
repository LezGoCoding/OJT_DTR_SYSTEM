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
        // Initialize DataTable for attendance
        var t = $('#attendanceTbl').DataTable({
            "ordering": false,
            "lengthChange": false,
            "paging": true,
            "bInfo": true,
            "processing": true,
            "serverSide": false,
            "order": [],
            "ajax": {
                url: "<?php echo WEB_ROOT; ?>attendance/ajax.php",
                type: "POST",
                data: { route: 'list' }
            },
            "scrollCollapse": true,
            "columnDefs": [
                { "searchable": true, "orderable": false, "targets": "_all" },
                { "className": "text-center", "targets": [0, 2, 3, 4, 5] }
            ],
            "columns": [
                { "width": "10%" }, // Column 0
                { "width": "26%" }, // Column 1
                { "width": "16%" }, // Column 2
                { "width": "16%" }, // Column 3
                { "width": "16%" }, // Column 4
                { "width": "16%" }  // Column 5
            ],
            "initComplete": function(settings, json) {
                if (json.data.length === 0) {
                    $('#attendanceTbl tbody').html(`
                        <tr>
                            <td colspan="6" class="text-center">No attendance records for today.</td>
                        </tr>
                    `);
                }
            }
        });
    });

</script>