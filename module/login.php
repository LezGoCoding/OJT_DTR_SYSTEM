<?php
require_once("../include/initialize.php");
global $mydb;

check_message();

if (isset($_SESSION['ACCOUNT_ID'])) {
	header("Location: ../index.php");
	exit();
} else { ?>

<?php
$success_message = "";
$error_message = "";

$query = "SELECT * FROM loginattemp WHERE IPADDRESS = :ipaddress";
$mydb->setQuery($query, [
    ':ipaddress' => $_SERVER['REMOTE_ADDR'],
]);

$single_res = $mydb->loadSingleResult();

 $displayWarning = 'style="display:none;"'; // Default to hidden
      if ($single_res && isset($single_res->ATTEMPCOUNT)) {
        if ($single_res->ATTEMPCOUNT >= 2) {
            $displayWarning = '';
     }
}

if (isset($_POST['btnLogin'])) {
   $email = htmlspecialchars(trim($_POST['username']));
   $upass = htmlspecialchars(trim($_POST['userpass']));
   $h_upass = $upass;

   // Check if either the email or password fields are empty
   if ($email == '' or $upass == '') {
      message("Invalid Username and Password!", "error");
      redirect("login.php");
   } else {
      $employee = new Employees();

      // Authenticate the user
      $res = $employee::AuthenticateEmployee($email, $h_upass);

      if ($res == true) {
            // Session variables
            $_SESSION['last_activity'] = time();
			$_SESSION['ACCOUNT_ID']       = $_SESSION['ACCOUNT_ID'];
			$_SESSION['ACCOUNT_NAME']     = $_SESSION['ACCOUNT_NAME'] ;
			$_SESSION['ACCOUNT_USERNAME'] = $_SESSION['ACCOUNT_USERNAME'];
			$_SESSION['EMPID']     = $_SESSION['EMPID'];
			$_SESSION['ip']          =    $_SERVER['REMOTE_ADDR'];
			$_SESSION['userAgent']   = $_SERVER['HTTP_USER_AGENT'];

			$query = "UPDATE `loginattemp` SET ATTEMPCOUNT = 0 WHERE IPADDRESS = :ipaddress";
            $istrue = $mydb->InsertThis($query, [
              ':ipaddress' => $_SERVER['REMOTE_ADDR'],
            ]);

            DoRecordLogs('Login to the system.', 'LOGIN');
            $success_message = "Login Successfull!";
            redirect(WEB_ROOT.'index.php');

      } else {

         if (!isset($_SESSION['accesscount'])) {
            $_SESSION['accesscount'] = 0;
         }
         $_SESSION['accesscount']++;
           $ipAddress = $_SERVER['REMOTE_ADDR'];
          $query = "SELECT * FROM loginattemp WHERE IPADDRESS = :ipaddress";
          $mydb->setQuery($query, [
              ':ipaddress' => $ipAddress,
          ]);
          $rowcheck = $mydb->num_rows();

          if ($rowcheck > 0) {
              $updateQuery = "UPDATE `loginattemp` SET `ATTEMPCOUNT` = `ATTEMPCOUNT` + 1 WHERE IPADDRESS = :ipaddress";
              $mydb->InsertThis($updateQuery, [
                  ':ipaddress' => $ipAddress,
              ]);
          } else {
              $insertQuery = "INSERT INTO `loginattemp`(`IPADDRESS`,`ATTEMPCOUNT`) VALUES (:ipaddress, 1)";
              $mydb->InsertThis($insertQuery, [
                  ':ipaddress' => $ipAddress,
              ]);
          }

         $remaining = 2 - $single_res->ATTEMPCOUNT;
         $error_message = 'Account does not exist! You have only ' . $remaining . ' attempt(s) remaining.';
          
      }
   }
}
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<meta name="description" content="Responsive Bootstrap4 Dashboard Template">
		<meta name="author" content="ParkerThemes">
		<title>OJT DTR - Login</title>

		<!-- Bootstrap css -->
		<link rel="stylesheet" href="<?php echo WEB_ROOT ?>css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo WEB_ROOT ?>vendor/font-awesome/css/all.css">

		<!-- NICE ADMIN ASSETS -->
		<!-- Favicons -->
		<link href="<?php echo WEB_ROOT ?>assets/img/favicon.png" rel="icon">
		<link href="<?php echo WEB_ROOT ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

		<!-- Google Fonts -->
		<link href="https://fonts.gstatic.com" rel="preconnect">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

		<!-- Vendor CSS Files -->
		<link href="<?php echo WEB_ROOT ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo WEB_ROOT ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
		<link href="<?php echo WEB_ROOT ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
		<link href="<?php echo WEB_ROOT ?>assets/vendor/quill/quill.snow.css" rel="stylesheet">
		<link href="<?php echo WEB_ROOT ?>assets/vendor/quill/quill.bubble.css" rel="stylesheet">
		<link href="<?php echo WEB_ROOT ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
		<link href="<?php echo WEB_ROOT ?>assets/vendor/simple-datatables/style.css" rel="stylesheet">

		<!-- Template Main CSS File -->
		<link href="<?php echo WEB_ROOT ?>assets/css/style.css" rel="stylesheet">

		<!-- DISPLAY CSS -->
		<style type="text/css">

			.scanner-body {
				text-align: center;
			}
			.scanner-con, .qr-detected-container {
				width: 100%;
				margin: 10px;
				background-color: white;
				padding: 20px;
				border-radius: 8px;
				box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
			}

			.scanner-con h5, .qr-detected-container h5 {
				margin-bottom: 20px;
				color: #333;
			}

			#interactive {
				width: 100%;
				max-width: 600px;
				height: auto;
				border-radius: 8px;
				border: 2px solid #ccc;
			}

			.scanner-btn {
				margin-top: 20px;
				background-color: #008ae6;
				color: white;
				font-weight: bold;
				padding: 10px 20px;
				border-radius: 5px;
				cursor: pointer;
				border: none;
			}

			.scanner-btn:hover {
				background-color: #007bb5;
			}

			.qr-detected-container input {
				width: 80%;
				padding: 10px;
				font-size: 16px;
				border: 2px solid #ccc;
				border-radius: 4px;
				margin-top: 10px;
				background-color: #f9f9f9;
			}

			#qr-validation-result {
				margin-top: 20px;
				font-size: 18px;
				font-weight: bold;
			}

			.valid-result {
				color: green;
			}

			.invalid-result {
				color: red;
			}

			/* Style for login buttons */
			.login-buttons {
				position: absolute;
				top: 10px;
				right: 20px;
				display: flex;
				gap: 10px;
			}

			.login-buttons a {
				background-color: #008ae6;
				color: white;
				padding: 8px 16px;
				border-radius: 5px;
				text-decoration: none;
				font-weight: bold;
				transition: background-color 0.3s;
			}

			.login-buttons a:hover {
				background-color: #007bb5;
			}

			#login-screen {
				display: none;
			}

			#login-screen.show-login {
				display: block;
			}

			#scanner-screen {
				display: block;
			}

			#scanner-screen.hide-scanner {
				display: none;
			}

			#goToLoginScreen {
				margin-top: 20px;
				padding: 10px 20px;
				background-color: #007bff;
				color: white;
				border: none;
				border-radius: 5px;
				cursor: pointer;
				text-decoration: none;
			}

			#scanner-screen {
				display: flex; 
				justify-content: center;
				align-items: center; 
				height: 100vh; 
				width: 100vw;
			}

			.dataTables_filter {
				float: right !important;
				display: flex;
				justify-content: flex-end;
			}

			.dataTables_paginate {
				float: right !important;
				text-align: right;
			}
		</style>

	</head>
	<body>
		<div id="container">
			<div id="scanner-screen">
				<!-- Admin Login Links -->
				<div class="login-buttons">
					<a href="#" id="goToLoginScreen"><i class="fas fa-user"></i> Admin Login</a>
				</div>

				<div class="container">
					<div class="row">
						<div class="col-lg-4 scanner-body">
							<!-- QR Code Scanner -->
							<div class="scanner-con">
								<h5>Scan your OJT QR Code here</h5>
								<video id="interactive" class="viewport" width="300rem" height="300rem"></video>

								<!-- QR Code Detection -->
								<div id="qr-validation-result"></div>
								<div id="current-time"></div>
							</div>
						</div>

						<div class="col-lg-8">
							<div class="scanner-con">
								<div class="filter float-right">
									<a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
									<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
										<li class="dropdown-header text-start">
											<h6>Filter</h6>
										</li>

										<li><a class="dropdown-item" href="#">Today</a></li>
										<li><a class="dropdown-item" href="#">This Month</a></li>
										<li><a class="dropdown-item" href="#">This Year</a></li>
									</ul>
								</div>

								<h5 class="card-title scanner-body">OJT ATTENDANCE <span>| Today</span></h5>
								<div class="card-body" style="overflow-y: auto; max-height: 350px;">

								<table id="tblattendance" class="table table-bordered table-sm">
									<thead>
										<tr>
											<th scope="col" class="text-center"><i class="fas fa-user"></i></th>
											<th scope="col">Employees Fullname</th>
											<th scope="col">Time In Morning</th>
											<th scope="col">Time Out Morning</th>
											<th scope="col">Time In Afternoon</th>
											<th scope="col">Time Out Afternoon</th>
										</tr>
									</thead>
									<tbody>

									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="login-screen">

			<div class="login-buttons">
				<a href="#" id="goToAttendanceScannerScreen"><i class="fas fa-book"></i> Employee Attendance</a>
			</div>

			<div class="container">
				<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

								<div class="d-flex justify-content-center py-4">
									<a href="#" class="logo d-flex align-items-center w-auto">
										<img src="<?php echo WEB_ROOT ?>assets/img/logo.png" alt="">
										<span class="d-none d-lg-block">DTR System</span>
									</a>
								</div><!-- End Logo -->

								<div class="card mb-3">
									<div class="card-body">
										<div class="pt-4 pb-2">
											<h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
											<p class="text-center small">Enter your username & password to login</p>
										</div>

										<form class="row g-3 needs-validation" novalidate method="post" action="#">
											<div class="col-12">
												<label for="yourUsername" class="form-label">Username</label>
												<div class="input-group has-validation">
													<input type="text" class="form-control" name="username" placeholder="" required>
													<div class="invalid-feedback">Please enter your username.</div>
												</div>
											</div>

											<div class="col-12">
												<label for="yourPassword" class="form-label">Password</label>
												<input type="password" class="form-control" name="userpass" placeholder="" />
												<div class="invalid-feedback">Please enter your password!</div>
											</div>

											<div class="form-group" style="text-align: center;">
												<p <?php echo $displayWarning; ?> style="color:red; display: inline; margin: 0;">
													<i class="fa fa-ban" style="font-size:20px;color:red;"></i>
													You are temporarily blocked <span id="countdown" style="display: inline;">60</span> sec(s). Don't refresh the page!
												</p>

												<?php if ($displayWarning == 'style="display:none;"' && !empty($error_message)): ?>
												<p style="color:red; display: inline; margin: 0;" class="message error"><?php echo $error_message; ?></p>
												<?php endif; ?>
											</div>

											<input type="hidden" name="REMOTE_ADDR" id="REMOTE_ADDR" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>" />

											<div class="col-12">
												<button type="submit" class="btn btn-primary w-100" name="btnLogin">Login</button>
											</div>
										</form>

									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</body>
</html>

<?php
}
?>

<!-- Required jQuery first, then Bootstrap Bundle JS -->
<script src="<?php echo WEB_ROOT ?>js/jquery.min.js"></script>
<script src="<?php echo WEB_ROOT ?>js/bootstrap.bundle.min.js"></script>
<script src="<?php echo WEB_ROOT ?>js/moment.js"></script>
<!-- Slimscroll JS -->
<script src="<?php echo WEB_ROOT ?>vendor/slimscroll/slimscroll.min.js"></script>
<script src="<?php echo WEB_ROOT ?>vendor/slimscroll/custom-scrollbar.js"></script>
<!-- Daterange -->
<script src="<?php echo WEB_ROOT ?>vendor/daterange/daterange.js"></script>
<script src="<?php echo WEB_ROOT ?>vendor/daterange/custom-daterange.js"></script>
<!-- Data Tables -->
<script src="<?php echo WEB_ROOT ?>vendor/datatables/dataTables.min.js"></script>
<script src="<?php echo WEB_ROOT ?>vendor/datatables/dataTables.bootstrap.min.js"></script>
<!-- Custom Data tables -->
<script src="<?php echo WEB_ROOT ?>vendor/datatables/custom/custom-datatables.js"></script>
<script src="<?php echo WEB_ROOT ?>vendor/datatables/custom/fixedHeader.js"></script>

<!-- Include RowReorder JS -->
<script type="text/javascript" src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<!-- Main JS -->
<script src="<?php echo WEB_ROOT ?>js/main.js"></script>
<!-- Steps wizard JS -->
<script src="<?php echo WEB_ROOT ?>vendor/wizard/jquery.steps.min.js"></script>
<script src="<?php echo WEB_ROOT ?>vendor/wizard/jquery.steps.custom.js"></script>
<script type="text/javascript" src="<?php echo WEB_ROOT ?>vendor/font-awesome/js/all.js"></script>
<script type="text/javascript" src="<?php echo WEB_ROOT ?>vendor/toastr/toastr.min.js"></script>


<!-- NICE ADMIN SCRIPTS -->
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="<?php echo WEB_ROOT; ?>assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="<?php echo WEB_ROOT; ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo WEB_ROOT; ?>assets/vendor/chart.js/chart.umd.js"></script>
<script src="<?php echo WEB_ROOT; ?>assets/vendor/echarts/echarts.min.js"></script>
<script src="<?php echo WEB_ROOT; ?>assets/vendor/quill/quill.js"></script>
<script src="<?php echo WEB_ROOT; ?>assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="<?php echo WEB_ROOT; ?>assets/vendor/tinymce/tinymce.min.js"></script>
<script src="<?php echo WEB_ROOT; ?>assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="<?php echo WEB_ROOT; ?>assets/js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- Scanner Scripts -->
<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<script>
    let scanner;

    // Start QR Scanner
    function startScanner() {
        scanner = new Instascan.Scanner({ video: document.getElementById('interactive') });

        scanner.addListener('scan', function (content) {
            console.log("Scanned QR Code:", content);

            let now = new Date();
			let formattedDate = now.toISOString().split('T')[0];  // '2025-02-26'

            // Send the scanned QR code to the server for validation
			$.ajax({
			    url: '<?php echo WEB_ROOT; ?>module/login_function.php',
			    method: 'POST',
			    data: { 
			        qr_code: content,
			        cur_date: formattedDate,
			        cur_time: now.toLocaleTimeString()
			    },
			    dataType: 'json',
			    success: function(response) {
			        console.log("Raw Response:", response);

			        // Check if the server responded with a success status
			        if (response.status == 1) {
			            // Display success SweetAlert message with timer and animation
			            Swal.fire({
			                icon: 'success',
			                title: 'Success!',
			                text: response.message, // Assuming 'message' is part of the response
			                showConfirmButton: false, // Hide the confirm button
			                timer: 2500, // 3 seconds delay before closing the alert
			                timerProgressBar: true, // Show the progress bar
			                willClose: () => {
			                    // Optional: Custom behavior after the alert is closed (e.g., reload table)
			                    $('#tblattendance').DataTable().ajax.reload();
			                }
			            });

			        } else {
			            // Display error SweetAlert message with timer and animation
			            Swal.fire({
			                icon: 'error',
			                title: 'Error!',
			                text: response.message, // Assuming 'message' is part of the response
			                showConfirmButton: false, // Hide the confirm button
			                timer: 3000, // 3 seconds delay before closing the alert
			                timerProgressBar: true // Show the progress bar
			            });
			        }
			    },
			    error: function(xhr, status, error) {
			        console.error('AJAX Error:', xhr, status, error);

			        // Display error SweetAlert message for AJAX error with timer and animation
			        Swal.fire({
			            icon: 'error',
			            title: 'Oops...',
			            text: `Error scanning QR code: ${error} (${status})`,
			            showConfirmButton: false, // Hide the confirm button
			            timer: 3000, // 3 seconds delay before closing the alert
			            timerProgressBar: true // Show the progress bar
			        });
			    }
			});


        });

        // Get available cameras and start the scanner
        Instascan.Camera.getCameras()
            .then(function (cameras) {
                if (cameras.length > 0) {
                    scanner.start(cameras[0]);
                } else {
                    console.error('No cameras found.');
                    alert('No cameras found.');
                }
            })
            .catch(function (err) {
                console.error('Camera access error:', err);
                alert('Camera access error: ' + err);
            });
    }

    // Automatically start the scanner on page load
    document.addEventListener('DOMContentLoaded', startScanner);
</script>

<script>
    $(document).ready(function() {
	    // Initialize DataTable for attendance
	    var t = $('#tblattendance').DataTable({
	        "ordering": false,
	        "lengthChange": false,
	        "paging": true,
	        "bInfo": true,
	        "processing": true,
	        "serverSide": false,
	        "order": [],
	        "ajax": {
	            url: "<?php echo WEB_ROOT; ?>module/login_function.php",
	            type: "POST",
	            data: { attendance_list: 'list' }
	        },
	        "scrollCollapse": true,
	        "columnDefs": [
	            { "searchable": true, "orderable": false, "targets": "_all" },
	            { "className": "text-center", "targets": [0, 2, 3, 4, 5] }
	        ],
	        "columns": [
	            { "width": "12%" }, // Column 0
	            { "width": "24%" }, // Column 1
	            { "width": "16%" }, // Column 2
	            { "width": "16%" }, // Column 3
	            { "width": "16%" }, // Column 4
	            { "width": "16%" }  // Column 5
	        ],
	        "initComplete": function(settings, json) {
	            if (json.data.length === 0) {
	                $('#tblattendance tbody').html(`
	                    <tr>
	                        <td colspan="6" class="text-center">No attendance records for today.</td>
	                    </tr>
	                `);
	            }
	        }
	    });
	});
</script>

<script>
    // Update Current Date & Time
    function updateTime() {
        const now = new Date();
        const dateOptions = { year: 'numeric', month: 'long', day: 'numeric' };
        const timeOptions = { hour: 'numeric', minute: 'numeric', second: 'numeric', hour12: true };

        document.getElementById("current-time").textContent =
            `${now.toLocaleDateString(undefined, dateOptions)} - ${now.toLocaleTimeString(undefined, timeOptions)}`;
    }

    // Update time every second
    setInterval(updateTime, 1000);
    updateTime();

    // Toggle between scanner and login screen
    document.getElementById('goToLoginScreen').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('scanner-screen').classList.add('hide-scanner');
        document.getElementById('login-screen').classList.add('show-login');
        document.getElementById('container').style.justifyContent = 'center';
    });

    // Toggle between scanner and login screen
    document.getElementById('goToAttendanceScannerScreen').addEventListener('click', function(event) {
        event.preventDefault();
        window.history.back(); // Go back to the previous page
    });

    // Reset to scanner screen when clicking outside
    document.body.addEventListener('click', function(event) {
        if (event.target === document.body) {
            document.getElementById('scanner-screen').classList.remove('hide-scanner');
            document.getElementById('login-screen').classList.remove('show-login');
            document.getElementById('container').style.justifyContent = 'center';
        }
    });
</script>
