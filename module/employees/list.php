<?php check_message(); ?>
<div class="pagetitle">
  <h1>Employees</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item active">List of Employees</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row ">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body pt-4">
                    <button type="button" class="btn btn-primary m-auto float-right" data-bs-toggle="modal" data-bs-target="#newEmployeeModal">
                        <i class="fas fa-user-plus"></i> New Employee
                    </button>
                    <button type="button" class="btn btn-primary m-auto">
                        <i class="fas fa-print"></i> Print
                    </button>
                    <button type="button" class="btn btn-success m-auto">
                        <i class="fas fa-upload"></i> Import
                    </button>
                    <button type="button" class="btn btn-secondary m-auto">
                        <i class="fas fa-download"></i> Export all Employees
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">

        <!-- Recent Sales -->
        <div class="col-12">
          <div class="card recent-sales overflow-auto">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Registered Employees <span>| This Month</span></h5>

             <table id="tblemployees" class="table table-bordered table-sm">
                  <thead>
                      <tr>
                          <th scope="col">#</th>
                          <th scope="col">Employee Name</th>
                          <th scope="col" class="text-center">Department</th>
                          <th scope="col" class="text-center">Position</th>
                          <th scope="col" class="text-center">Status</th>
                          <th scope="col" class="text-center">Actions</th>
                      </tr>
                  </thead>
                  <tbody>

                  </tbody>
              </table>

            </div>

          </div>
        </div><!-- End Recent Sales -->

      </div>
    </div><!-- End Left side columns -->


  </div>
</section>


<div class="modal fade" id="newEmployeeModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Add New Employee</h5>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="<?php echo WEB_ROOT; ?>employees/controller.php" method="POST" enctype="multipart/form-data">
                  <input type="hidden" class="form-control" name="route" value="add">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstName" name="firstName" required>
                            </div>
                            <div class="mb-3">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastName" name="lastName" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" id="address" name="address" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="contactNumber" class="form-label">Contact Number</label>
                                <input type="text" class="form-control" id="contactNumber" name="contactNumber" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="dateOfBirth" class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth" required>
                            </div>
                            <div class="mb-3">
                                <label for="department" class="form-label">Department</label>
                                <input type="text" class="form-control" id="department" name="department" required>
                            </div>
                            <div class="mb-3">
                                <label for="position" class="form-label">Position</label>
                                <input type="text" class="form-control" id="position" name="position" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                    <option value="Pending">Pending</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>

                            <!-- Profile Picture Upload -->
                            <div class="mb-3">
                                <label for="profilePic" class="form-label">Profile Picture</label>
                                <input type="file" class="form-control" id="profilePic" name="profilePic" accept=".jpg, .jpeg, .png" required>
                                <div class="mt-2">
                                    <img id="profilePicPreview" src="" alt="Profile Preview" class="img-thumbnail" style="display: none; width: 150px; height: 150px;">
                                </div>
                            </div>

                        </div>
                    </div>

                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary success">Save Details</button>
                    </div>

                </form>
            </div>
           
        </div>
    </div>
</div>