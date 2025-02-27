<div class="pagetitle">
  <h1>Employee Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item active">All Information</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">

        <!-- Recent Sales -->
        <div class="col-12">
          <div class="card">

            <div class="filter">
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

            <div class="card-body">
              <h5 class="card-title">Attendance Records <span>| Year</span></h5>

              <table id="myAllAttendanceRecordTbl" class="table table-bordered table-sm">
                <thead>
                  <tr>
                    <th scope="col">#</th>
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
        </div><!-- End Recent Sales -->

      </div>
    </div><!-- End Left side columns -->

  </div>
</section>