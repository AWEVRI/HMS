<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>Pages / Blank - Admin Bootstrap Template</title>
      <meta name="robots" content="noindex, nofollow">
      <meta content="" name="description">
      <meta content="" name="keywords">
      <link href="assets/img/favicon.png" rel="icon">
      <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
      <link href="https://fonts.gstatic.com" rel="preconnect">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"></script>
      <link href="assets/css/bootstrap.min.css" rel="stylesheet">
      <link href="assets/css/bootstrap-icons.css" rel="stylesheet">
      <link href="assets/css/boxicons.min.css" rel="stylesheet">
      <link href="assets/css/quill.snow.css" rel="stylesheet">
      <link href="assets/css/quill.bubble.css" rel="stylesheet">
      <link href="assets/css/remixicon.css" rel="stylesheet">
      <link href="assets/css/simple-datatables.css" rel="stylesheet">
      <link href="assets/css/style.css" rel="stylesheet">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"></script>
   </head>
   <body>
        <?php include "header.php"; ?>
        <?php include "sidebar.php"; ?>
      
      <main id="main" class="main">
        <!-- Add New User Modal Start -->
        <div class="modal fade" tabindex="-1" id="addNewBookModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Make Booking</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="add-hall-form" class="p-2" novalidate>
            <div class="mb-3">
              <input type="text" name="username" class="form-control form-control-lg" placeholder="Enter Username" required>
              <div class="invalid-feedback">Username is required!</div>
            </div>

            <div class="mb-3">
              <input type="text" name="name" class="form-control form-control-lg" placeholder="Enter Name" required>
              <div class="invalid-feedback">Name is required!</div>
            </div>

            <div class="mb-3">
              <input type="tel" name="contact" class="form-control form-control-lg" placeholder="Enter Contact" required>
              <div class="invalid-feedback">Contact is required!</div>
            </div>

            <div class="mb-3">
              <input type="hallname" name="hallname" class="form-control form-control-lg" placeholder="Enter Hallname" required>
              <div class="invalid-feedback">Hallname is required!</div>
            </div>

            <div class="mb-3">
              <input type="number" name="capacity" class="form-control form-control-lg" placeholder="Enter Capacity" required>
              <div class="invalid-feedback">Capacity is required!</div>
            </div>

            <div class="mb-3">
              <input type="date" name="starttime" class="form-control form-control-lg" placeholder="Enter Starttime" required>
              <div class="invalid-feedback">Start time is required!</div>
            </div>

            <div class="mb-3">
              <input type="date" name="endtime" class="form-control form-control-lg" placeholder="Enter Endtime" required>
              <div class="invalid-feedback">End time is required!</div>
            </div>


            <div class="mb-3">
              <input type="submit" value="Add Hall" class="btn btn-primary btn-block btn-lg" id="add-book-btn">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
        <!-- Add New User Modal End -->

  <!-- Edit User Modal Start -->
  <div class="modal fade" tabindex="-1" id="editBookModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Booking</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="edit-book-form" class="p-2" novalidate>
            <input type="hidden" name="id" id="id">
            <div class="mb-3">
              <input type="text" name="username" id="username" class="form-control form-control-lg" placeholder="Enter Username" required>
              <div class="invalid-feedback">Username is required!</div>
            </div>

            <div class="mb-3">
              <input type="text" name="name" id="name" class="form-control form-control-lg" placeholder="Enter Name" required>
              <div class="invalid-feedback">Name is required!</div>
            </div>

            <div class="mb-3">
              <input type="tel" name="contact" id="contact" class="form-control form-control-lg" placeholder="Enter Contact" required>
              <div class="invalid-feedback">Contact is required!</div>
            </div>

            <div class="mb-3">
              <input type="hallname" name="hallname" id="hallname" class="form-control form-control-lg" placeholder="Enter Hallname" required>
              <div class="invalid-feedback">Hallname is required!</div>
            </div>

            <div class="mb-3">
              <input type="number" name="capacity" id="capacity" class="form-control form-control-lg" placeholder="Enter Capacity" required>
              <div class="invalid-feedback">Capacity is required!</div>
            </div>

            <div class="mb-3">
              <input type="date" name="starttime" id="starttime" class="form-control form-control-lg" placeholder="Enter Starttime" required>
              <div class="invalid-feedback">Start time is required!</div>
            </div>

            <div class="mb-3">
              <input type="date" name="endtime" id="endtime" class="form-control form-control-lg" placeholder="Enter Endtime" required>
              <div class="invalid-feedback">End time is required!</div>
            </div>



            <div class="mb-3">
              <input type="submit" value="Update Hall" class="btn btn-success btn-block btn-lg" id="edit-book-btn">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Edit User Modal End -->
         <section class="section">
         <div class="row mt-4">
      <div class="col-lg-12 d-flex justify-content-between align-items-center">
        <div>
          <h4 class="text-primary">All users in the database!</h4>
        </div>
        <div>
          <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addNewBookModal">Make Booking</button>
        </div>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-lg-12">
        <div id="showAlert"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="table-responsive">
          <table class="table table-striped table-bordered text-center">
            <thead>
              <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Name</th>
                <th>Contact</th>
                <th>Hall Name</th>
                <th>Capacity</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
      </div>
    </div>
         </section>
      </main>
      <?php include "footer.php";?>
     <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>  
       <script src="assets/js/apexcharts.min.js"></script>
       <script src="assets/js/bootstrap.bundle.min.js"></script>
       <script src="assets/js/chart.min.js"></script>
       <script src="assets/js/echarts.min.js"></script>
       <script src="assets/js/quill.min.js"></script>
       <script src="assets/js/simple-datatables.js"></script>
       <script src="assets/js/tinymce.min.js"></script>
       <script src="assets/js/validate.js"></script>
       <script src="assets/js/main.js"></script> 
       <script src="assets/js/bookings.js"></script> 
            
  </body>
</html>