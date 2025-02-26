<?php
require_once("../../include/initialize.php");

if (!isset($_SESSION['ACCOUNT_ID'])) {
    header("Location: ".WEB_ROOT.'login.php');
} else {

    $routes = [
        'list' => 'list.php',
        'details' => 'employeeDetails.php', 
        'records' => 'employeeRecords.php', 
    ];
    $ParamConfig = [
       'details' => ['empId'],
       'records' => ['empId']
   ];
   $routeHandler = new RouteHandler($routes, 'list', $ParamConfig);
   $content = $routeHandler->handleRouteAndContent();
   $routeHandler->addToGet();
   require_once("../../theme/template.php");
}

?>

<script>
    $(document).ready(function() {
        var t = $('#tblemployees').DataTable({
            "searching": true,
            "ordering": false,
            "lengthChange": false,
            "paging": true,
            "bInfo": true,
            "processing": true,
            "serverSide": false,
            "order": [],
            "ajax": {
                url: "<?php echo WEB_ROOT; ?>employees/ajax.php",
                type: "POST",
                data: {route: 'list'}
            },
            // "scrollY": "600px",
            "scrollCollapse": true,
            "columnDefs": [
                { "searchable": true, "orderable": false, "targets": "_all" },
                { "className": "text-center", "targets": [0, 2, 3, 4, 5] } // Center columns 0, 2, 3, and 4.  Column 1 (the second column) will NOT be centered.
            ]
        });

        let empId = "<?php echo $_GET['empId'] ?? ''; ?>"; // Get empId from POST

        // Initialize DataTable for attendance
        var t = $('#employeeAllAttendanceTbl').DataTable({
            "ordering": false,
            "lengthChange": false,
            "paging": true,
            "bInfo": true,
            "processing": true,
            "serverSide": false,
            "order": [],
            "ajax": {
                url: "<?php echo WEB_ROOT; ?>employees/ajax.php",
                type: "POST",
                data: { route: 'employee_all_attendance', empId: empId}
            },
            "scrollCollapse": true,
            "columnDefs": [
                { "searchable": true, "orderable": false, "targets": "_all" },
                { "className": "text-center", "targets": [0, 2, 3, 4] }
            ],
            "columns": [
                { "width": "26%" }, // Column 1
                { "width": "16%" }, // Column 2
                { "width": "16%" }, // Column 3
                { "width": "16%" }, // Column 4
                { "width": "16%" }  // Column 5
            ],
            "initComplete": function(settings, json) {
                if (json.data.length === 0) {

                    console.log(json.data)
                    $('#employeeAllAttendanceTbl tbody').html(`
                        <tr>
                            <td colspan="6" class="text-center">No attendance records for this employee.</td>
                        </tr>
                    `);
                }
            }
        });
    });

</script>