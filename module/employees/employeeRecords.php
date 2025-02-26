<?php 
  $employee = new employees();
  $row = $employee->single_employees($_GET['empId']);
?>

<?php check_message(); ?>
<div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo WEB_ROOT ?>employees">Employees</a></li>
          <li class="breadcrumb-item active">Employee Records</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
       <div class="col-xl-4">
        <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                <img src="<?php echo WEB_ROOT; ?>img/profile_pic/<?php echo $row->profile_pic ?>" 
                     alt="<?php echo $row->profile_pic ?>" class="rounded-circle">
                <h2><?php echo $row->first_name . ' ' . $row->last_name; ?></h2>
                <h3><?php echo $row->position; ?></h3>
                <div class="social-links mt-2">
                    <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>

            <!-- Fix: Wrap the details inside another card-body for consistent styling -->
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 col-md-4 label font-weight-bold border p-2">Department</div>
                    <div class="col-lg-8 col-md-8 border p-2"><?php echo $row->department; ?></div>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-4 label font-weight-bold border p-2">Position</div>
                    <div class="col-lg-8 col-md-8 border p-2"><?php echo $row->position; ?></div>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-4 label font-weight-bold border p-2">Email</div>
                    <div class="col-lg-8 col-md-8 border p-2"><?php echo $row->email; ?></div>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-4 label font-weight-bold border p-2">Address</div>
                    <div class="col-lg-8 col-md-8 border p-2"><?php echo $row->address; ?></div>
                </div>
            </div> <!-- End card-body -->
        </div>
    </div>
        <div class="col-lg-8">
            <div class="card  profile-card pt-4 d-flex flex-column align-items-center">
              <div class="card-body">
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

                <h5 class="card-title scanner-body">ALL OJT ATTENDANCE <span>| Year</span></h5>
                <div class="card-body" style="overflow-y: auto; max-height: 350px;">

                <table id="employeeAllAttendanceTbl" class="table table-bordered table-sm">
                  <thead>
                    <tr>
                      <th scope="col">Attendance Date</th>
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
    </section>